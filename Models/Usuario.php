<?php
    include_once 'Conexion.php';
    class Usuario {
        var $objetos;
        public function __construct(){
            $db = new Conexion();
            $this->acceso = $db->pdo;
        }
        /*
        function loguearse($user, $pass){
            $sql="SELECT * FROM usuario
                    WHERE user=:user and pass=:pass";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user, ':pass'=>$pass));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
        */
        function verificar_usuario($user){
            $sql="SELECT * FROM usuario
                WHERE user=:user";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
        function registrar_usuario($username, $pass, $nombres, $apellidos, $dni, $email, $telefono){
            $sql = "INSERT INTO usuario(user, pass, nombres, apellidos, dni, email, telefono, id_tipo) VALUES(:user, :pass, :nombres, :apellidos, :dni, :email, :telefono, :id_tipo)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$username, ':pass'=>$pass, ':nombres'=>$nombres, ':apellidos'=>$apellidos, ':dni'=>$dni, ':email'=>$email, ':telefono'=>$telefono, ':id_tipo'=>'2'));
        }
        function obtener_datos($user){
            $sql = "SELECT * FROM usuario
                    JOIN tipo_usuario ON usuario.id_tipo = tipo_usuario.id
                    WHERE usuario.id=:user";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
        function  editar_datos($id_usuario,$nombres,$apellidos,$dni,$email,$telefono, $nombre){
            if($nombre != '') {
                $sql = "UPDATE usuario SET nombres=:nombres, 
                                        apellidos=:apellidos, 
                                        dni=:dni, 
                                        email=:email, 
                                        telefono=:telefono, 
                                        avatar=:avatar
                            WHERE id=:id_usuario";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_usuario'=>$id_usuario,
                    ':nombres'=>$nombres,
                    ':apellidos'=>$apellidos,
                    ':dni'=>$dni,
                    ':email'=>$email,
                    ':telefono'=>$telefono,
                    ':avatar'=>$nombre,
                );
                $query->execute($variables);
            } else {
                $sql = "UPDATE usuario SET nombres=:nombres, 
                                    apellidos=:apellidos, 
                                    dni=:dni, 
                                    email=:email, 
                                    telefono=:telefono 
                    WHERE id=:id_usuario";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_usuario'=>$id_usuario,
                    ':nombres'=>$nombres,
                    ':apellidos'=>$apellidos,
                    ':dni'=>$dni,
                    ':email'=>$email,
                    ':telefono'=>$telefono,
                );
                $query->execute($variables);
            }
        }

        /*
        // Aca obtengo datos de la base de datos para chequear la old contra
        function comprobar_pass($id_usuario, $pass_old){
            $sql="SELECT * FROM usuario
                WHERE id=:id_usuario AND pass=:pass_old";
            $query = $this->acceso->prepare($sql);
            // Compruebo que el id y la pass sean iguales a las recuperadas por la base de datos
            $query->execute(array(':id_usuario'=>$id_usuario, ':pass_old'=>$pass_old));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
        */

        // En esta funcion se cambia la contraseña por la nueva, la pass obtenida de la base de datos "pass=:pass_new" va a equivalar a la nueva 
        // pass que se iguala aca "':pass_new'=>$pass_new" y se UPDATE porque actualiza la contra vieja por la nueva
        function cambiar_contra($id_usuario, $pass_new){
                $sql = "UPDATE usuario SET pass=:pass_new 
                            WHERE id=:id_usuario";
                $query = $this->acceso->prepare($sql);
                $variables = array(
                    ':id_usuario'=>$id_usuario,
                    ':pass_new'=>$pass_new
                );
                $query->execute($variables);
        }

        function buscar_administradores_root(){
            $sql="SELECT * FROM usuario
                WHERE id_tipo=:var1
                OR id_tipo=:var2";
            $query = $this->acceso->prepare($sql);
            $variables = array(
                ':var1'=>2,
                ':var2'=>1
            );
            $query->execute($variables);
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }
    
/*
    JOIN tipo_usuario ON id_tipo=tipo_usuario.id
    WHERE user=:user and pass=:pass
*/
/*
  function loguearse($user, $pass){
            $sql="SELECT * FROM usuario
                    JOIN tipo_usuario ON id_tipo = tipo_usuario.id
                    WHERE user=:user and pass=:pass";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user, ':pass'=>$pass));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
*/