<?php
    include_once '../Util/Config/config.php';
    include_once '../Models/Marca.php';
    include_once '../Models/SolicitudMarca.php';
    include_once '../Models/Historial.php';
    include_once '../Models/Usuario.php';

    $marca = new Marca();
    $solicitud_marca = new SolicitudMarca();
    $historial = new Historial();
    $usuario = new Usuario();
    session_start();

    
    if($_POST['funcion'] == 'crear_solicitud_marca'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre_sol'];
        $desc = $_POST['desc_sol'];
        $img = $_FILES['imagen_sol']['name'];
        $marca->buscar($nombre);
        if(empty($marca->objetos)) {
            $solicitud_marca->buscar($nombre);
            if(empty($solicitud_marca->objetos)) {
                /*Creacion de solicitud marca*/ 
                $nombre_imagen = uniqid().'-'.$img;
                $ruta = '../Util/Img/marca/'. $nombre_imagen;
                move_uploaded_file($_FILES['imagen_sol']['tmp_name'], $ruta);
                $solicitud_marca->crear($nombre, $desc, $nombre_imagen, $id_usuario);
                $descripcion='Ha creado una solicitud marca, '.$nombre;
                $historial->crear_historial($descripcion, 2, 7, $id_usuario);
                $mensaje = 'success';
                $json = array(
                    'mensaje'=>$mensaje
                );
                $jsonstring = json_encode($json);
                echo $jsonstring;
            } else {
                echo 'error_marca';
            }
        } else {
            echo 'error_marca';
        }
    } 
    
    if($_POST['funcion'] == 'read_tus_solicitudes'){
        $id_usuario = $_SESSION['id'];
        $solicitud_marca->read_tus_solicitudes($id_usuario);
        $json=array();
        foreach($solicitud_marca->objetos as $objeto){
            if(!empty($objeto->aprobado_por)) { 
                $usuario->obtener_datos($objeto->aprobado_por);
                $aprobado_por=$usuario->objetos[0]->nombres.' '.$usuario->objetos[0]->apellidos;
            } else {
                $aprobado_por = '';
            }
            $json[]=array(
                'id'=>openssl_encrypt($objeto->id, CODE, KEY),
                'nombre'=>$objeto->nombre,
                'descripcion'=>$objeto->descripcion,
                'imagen'=>$objeto->imagen,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'estado'=>$objeto->estado,
                'estado_envio'=>$objeto->estado_solicitud,
                'estado_aprobado'=>$objeto->aprobado_por,
                'observacion'=>$objeto->observacion,
                'tipo_usuario'=>$_SESSION['tipo_usuario'],
            );
        }
        $jsonstring= json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'read_solicitudes_por_aprobar'){
        $id_usuario = $_SESSION['id'];
        $solicitud_marca->solicitudes_por_aprobar();
        $json=array();
        foreach($solicitud_marca->objetos as $objeto){
            $json[]=array(
                'id'=>openssl_encrypt($objeto->id, CODE, KEY),
                'nombre'=>$objeto->nombre,
                'descripcion'=>$objeto->descripcion,
                'imagen'=>$objeto->imagen,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'solicitante'=>$objeto->nombres.' '.$objeto->apellidos,
                'tipo_usuario'=>$_SESSION['tipo_usuario'],
            );
        }
        $jsonstring= json_encode($json);
        echo $jsonstring;
    }

    if($_POST['funcion'] == 'editar_solicitud'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre_mod_sol'];
        $desc = $_POST['desc_mod_sol'];
        $img = $_FILES['imagen_mod_sol']['name'];
        $formateado = str_replace(" ", "+",  $_POST['id_marca_mod_sol']);
        $id_solicitud = openssl_decrypt($formateado, CODE, KEY);
        $mensaje = '';
        $nombre_imagen = '';
        $datos_cambiados = 'ha hecho los siguiente cambios: ';
        if(is_numeric($id_solicitud)) {
            $solicitud_marca->obtener_solicitud($id_solicitud);
            if($nombre!=$solicitud_marca->objetos[0]->nombre || $img!='' || $desc!=$solicitud_marca->objetos[0]->descripcion) {
                // $mensaje = 'cambio';
                if($nombre!=$solicitud_marca->objetos[0]->nombre) {
                    $datos_cambiados.='cambio su nombre de '.$solicitud_marca->objetos[0]->nombre.' a '.$nombre.', ';
                }
                if($desc!=$solicitud_marca->objetos[0]->descripcion) {
                    $datos_cambiados.='cambio su descripcion de '.$solicitud_marca->objetos[0]->descripcion.' a '.$desc.', ';
                }
                if($img!='') {
                    $datos_cambiados.='Su imagen fue cambiada.';
                    $nombre_imagen = uniqid().' - '.$img;
                    $ruta = '../Util/Img/marca/'.$nombre_imagen;
                    move_uploaded_file($_FILES['imagen_mod_sol']['tmp_name'], $ruta);
                    $avatar_actual=$solicitud_marca->objetos[0]->imagen;
                    if($avatar_actual!='marca_default.png') {
                        unlink('../Util/Img/marca/'.$avatar_actual);
                    }   
                }
                $solicitud_marca->editar($id_solicitud, $nombre, $desc, $nombre_imagen);
                $descripcion='Ha editado una solicitud marca, '.$datos_cambiados;
                $historial->crear_historial($descripcion, 1, 7, $id_usuario);
                $mensaje = 'success';
            } else {
                $mensaje = 'danger';
            }
            $json = array(
                'mensaje'=>$mensaje,
                'nombre_sol'=>$nombre,
                'desc_sol'=>$desc,
                'img_sol'=>$nombre_imagen
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    } 

    if($_POST['funcion'] == 'eliminar_solicitud'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $formateado = str_replace(" ", "+",$_POST['id']);
        $id_solicitud = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_solicitud)){
            $solicitud->eliminar_solicitud($id_solicitud);
            $descripcion='Ha eliminado una solicitud marca, '.$nombre;
            $historial->crear_historial($descripcion, 3, 7, $id_usuario);
            $mensaje = 'success';
            $json = array(
                'mensaje'=>$mensaje
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }   

    if($_POST['funcion'] == 'enviar_solicitud'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $formateado = str_replace(" ", "+",$_POST['id']);
        $id_solicitud = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_solicitud)){
            $solicitud_marca->enviar_solicitud($id_solicitud);
            /* Envio de Mensajes  */
            
            /*
            $descripcion='Ha eliminado una solicitud marca, '.$nombre;
            $historial->crear_historial($descripcion, 3, 7, $id_usuario);
            */
            $mensaje = 'success';
            $json = array(
                'mensaje'=>$mensaje
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }

    if($_POST['funcion'] == 'aprobar_solicitud'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $formateado = str_replace(" ", "+",$_POST['id']);
        $id_solicitud = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_solicitud)){
            $marca->buscar($nombre);
            if(empty($marca->objetos)) {
                // se aprueba la solicitud
                $solicitud_marca->aprobar_solicitud($id_solicitud, $id_usuario);
                // se crea la marca
                $solicitud_marca->obtener_solicitud($id_solicitud);
                $desc=$solicitud_marca->objetos[0]->descripcion;
                $imagen=$solicitud_marca->objetos[0]->imagen;
                $marca->crear($nombre, $desc, $imagen);
                $descripcion='Ha aprobado una solicitud marca, '.$nombre;
                $historial->crear_historial($descripcion, 1, 7, $id_usuario);
                $mensaje = 'success';
            } else {
                // la marca ya existe y no se puede crear
                // rechazar la solicitud marca
                $observacion = "No se aprobo la solicitud ya que existe una marca con el mismo nombre: ".$nombre;
                $solicitud_marca->rechazar_solicitud($id_solicitud, $id_usuario, $observacion);
                $descripcion = 'Ha rechazado una solicitud marca, '.$nombre;
                $historial->crear_historial($descripcion, 1, 7, $id_usuario);
                $mensaje = 'danger';

            }
            $json = array(
                'mensaje'=>$mensaje
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }  

    if($_POST['funcion'] == 'rechazar_solicitud'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre_rechazar_sol'];
        $formateado = str_replace(" ", "+",$_POST['id_marca_rechazar_sol']);
        $id_solicitud = openssl_decrypt($formateado, CODE, KEY);
        $observaciones = $_POST['observaciones'];
        if(is_numeric($id_solicitud)){
            $solicitud_marca->rechazar_solicitud($id_solicitud, $id_usuario, $observaciones);
            $descripcion='Ha rechazado una solicitud marca, '.$nombre;
            $historial->crear_historial($descripcion, 1, 7, $id_usuario);
            $mensaje = 'success';
            $json = array(
                'mensaje'=>$mensaje
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }   
?>