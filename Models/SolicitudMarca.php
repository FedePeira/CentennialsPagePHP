<?php
    include_once 'Conexion.php';
    class SolicitudMarca {
        var $objetos;
        public function __construct(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }
        
        function buscar($nombre){
            $sql = "SELECT *
                    FROM solicitud_marca sm
                    WHERE sm.nombre=:nombre AND estado = 'A'";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':nombre'=>$nombre
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function crear($nombre, $desc, $nombre_imagen, $id_usuario){
            $sql = "INSERT INTO solicitud_marca(nombre, descripcion, imagen, id_usuario)
                    VALUES(:nombre,:descripcion, :imagen, :id_usuario)";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':nombre'=>$nombre,
                ':descripcion'=>$desc,
                ':imagen'=>$nombre_imagen,
                ':id_usuario'=>$id_usuario
            );
            $query->execute($variables);
        }

        function editar($id_solicitud, $nombre, $desc, $img){
            if($img != ''){
                $sql = "UPDATE solicitud_marca SET nombre=:nombre, descripcion=:descripcion, imagen=:img, estado_solicitud=:estado_solicitud
                        WHERE id=:id_solicitud";
                $query = $this->acceso->prepare($sql);
                $variables=array(
                    ':nombre'=>$nombre,
                    ':descripcion'=>$desc,
                    ':img'=>$img,
                    ':id_solicitud'=>$id_solicitud,
                    ':estado_solicitud'=>'0'
                );
                $query->execute($variables);
            } else {
                $sql = "UPDATE solicitud_marca SET nombre=:nombre, descripcion=:descripcion, estado_solicitud=:estado_solicitud
                        WHERE id=:id_solicitud";
                $query = $this->acceso->prepare($sql);
                $variables=array(
                    ':nombre'=>$nombre,
                    ':descripcion'=>$desc,
                    ':id_solicitud'=>$id_solicitud,
                    ':estado_solicitud'=>'0'
                );
                $query->execute($variables);
            }
        }

        function read_tus_solicitudes($id_usuario){
            $sql = "SELECT *
                    FROM solicitud_marca sm
                    WHERE sm.id_usuario = :id_usuario AND estado = 'A' ORDER BY fecha_creacion DESC";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_usuario'=>$id_usuario
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function eliminar_solicitud($id_solicitud){
            $sql = "UPDATE solicitud_marca SET estado=:estado
                    WHERE id=:id_solicitud";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud,
                ':estado'=>'I'
            );
            $query->execute($variables);
        }

        function enviar_solicitud($id_solicitud){
            $sql = "UPDATE solicitud_marca SET estado_solicitud=:estado_solicitud
                    WHERE id=:id_solicitud";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud,
                ':estado_solicitud'=>'1'
            );
            $query->execute($variables);
        }

        function obtener_marca($id_solicitud){
            $sql = "SELECT *
                    FROM solicitud_marca sm
                    WHERE sm.id=:id_solicitud AND estado = 'A'";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function solicitudes_por_aprobar(){
            $sql = "SELECT sm.id as id,
                            sm.nombre as nombre,
                            sm.descripcion as descripcion,
                            sm.imagen as imagen,
                            sm.fecha_creacion as fecha_creacion,
                            u.nombres as nombres,
                            u.apellidos as apellidos
                    FROM solicitud_marca sm
                    JOIN usuario u ON sm.id_usuario = u.id
                    WHERE sm.estado = 'A' AND sm.estado_solicitud=:estado_solicitud ORDER BY sm.fecha_creacion DESC";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':estado_solicitud'=>'1'
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function obtener_solicitud($id_solicitud){
            $sql = "SELECT *
                    FROM solicitud_marca sm
                    WHERE sm.id=:id_solicitud AND estado = 'A'";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function aprobar_solicitud($id_solicitud, $id_usuario){
            $sql = "UPDATE solicitud_marca SET estado_solicitud=:estado_solicitud, aprobado_por=:aprobado_por
                    WHERE id=:id_solicitud";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud,
                ':estado_solicitud'=>'2',
                ':aprobado_por'=>$id_usuario
            );
            $query->execute($variables);
        }

        function rechazar_solicitud($id_solicitud, $id_usuario, $observacion){
            $sql = "UPDATE solicitud_marca SET estado_solicitud=:estado_solicitud, aprobado_por=:aprobado_por, observacion=:observacion
                    WHERE id=:id_solicitud";
            $query = $this->acceso->prepare($sql);
            $variables=array(
                ':id_solicitud'=>$id_solicitud,
                ':estado_solicitud'=>'3',
                ':aprobado_por'=>$id_usuario,
                ':observacion'=>$observacion
            );
            $query->execute($variables);
        }
    }