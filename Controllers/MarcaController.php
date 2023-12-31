<?php
    include_once '../Util/Config/config.php';
    include_once '../Models/Marca.php';
    include_once '../Models/Historial.php';

    $marca = new Marca();
    $historial = new Historial();
    session_start();

    if($_POST['funcion'] == 'read_all_marcas'){
        $marca->read_all_marcas();
        $json=array();
        foreach($marca->objetos as $objeto){
            $json[]=array(
                'id'=>openssl_encrypt($objeto->id, CODE, KEY),
                // 'id'=>$objeto->id,
                'nombre'=>$objeto->nombre,
                'descripcion'=>$objeto->descripcion,
                'imagen'=>$objeto->imagen,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'estado'=>$objeto->estado,
                'tipo_usuario'=>$_SESSION['tipo_usuario'],
            );
        }
        $jsonstring= json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'crear_marca'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $desc = $_POST['desc'];
        $img = $_FILES['imagen']['name'];
        $nombre_imagen = uniqid().'-'.$img;
        $ruta = '../Util/Img/marca/'. $nombre_imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $marca->crear($nombre, $desc, $nombre_imagen);
        $descripcion='Ha creado una marca, '.$nombre;
        $historial->crear_historial($descripcion, 2, 7, $id_usuario);
        $mensaje = 'success';
        $json = array(
            'mensaje'=>$mensaje
        );
        $jsonstring = json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'editar_marca'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre_mod'];
        $desc = $_POST['desc_mod'];
        $img = $_FILES['imagen_mod']['name'];
        $formateado = str_replace(" ", "+",  $_POST['id_marca_mod']);
        $id_marca = openssl_decrypt($formateado, CODE, KEY);
        // $id_marca = $formateado;
        $mensaje = '';
        $nombre_imagen = '';
        $datos_cambiados = 'ha hecho los siguiente cambios: ';
        if(is_numeric($id_marca)) {
            $marca->obtener_marca($id_marca);
            if($nombre!=$marca->objetos[0]->nombre || $img!='' || $desc!=$marca->objetos[0]->descripcion) {
                // $mensaje = 'cambio';
                if($nombre!=$marca->objetos[0]->nombre) {
                    $datos_cambiados.='cambio su nombre de '.$marca->objetos[0]->nombre.' a '.$nombre.', ';
                }
                if($desc!=$marca->objetos[0]->descripcion) {
                    $datos_cambiados.='cambio su descripcion de '.$marca->objetos[0]->descripcion.' a '.$desc.', ';
                }
                if($img!='') {
                    $datos_cambiados.='Su imagen fue cambiada.';
                    $nombre_imagen = uniqid().'-'.$img;
                    $ruta = '../Util/Img/marca/'.$nombre_imagen;
                    /*
                    $extension = pathinfo($img, PATHINFO_EXTENSION);
                    $nombre_imagen = $nombre_imagen.'.'.$extension;
                    */
                    move_uploaded_file($_FILES['imagen_mod']['tmp_name'], $ruta);
                    $avatar_actual=$marca->objetos[0]->imagen;
                    if($avatar_actual!='marca_default.png') {
                        unlink('../Util/Img/marca/'.$avatar_actual);
                    } 
                    /*
                    if ($avatar_actual != 'marca_default.png' && file_exists('../Util/Img/marca/' . $avatar_actual)) {
                        unlink('../Util/Img/marca/' . $avatar_actual);
                    }  
                    */
                }
                $marca->editar($id_marca, $nombre, $desc, $nombre_imagen);
                $descripcion='Ha editado una marca, '.$datos_cambiados;
                $historial->crear_historial($descripcion, 1, 7, $id_usuario);
                $mensaje = 'success';
            } else {
                $mensaje = 'danger';
            }
            $json = array(
                'mensaje'=>$mensaje,
                'nombre_marca'=>$nombre,
                'desc_marca'=>$desc,
                'img'=>$nombre_imagen
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    } 

    if ($_POST['funcion'] == 'eliminar_marca') {
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $formateado = str_replace(" ", "+", $_POST['id']);
        $id_marca = openssl_decrypt($formateado, CODE, KEY);
        if (is_numeric($id_marca)) {
            $marca->eliminar_marca($id_marca);
            $descripcion = 'Ha eliminado una marca, ' . $nombre;
            $historial->crear_historial($descripcion, 3, 7, $id_usuario);
            $mensaje = 'success';
        } else {
            $mensaje = 'error';
        }
        $json = array(
            'mensaje' => $mensaje
        );
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    /*
    if($_POST['funcion'] == 'eliminar_marca'){
        $id_usuario = $_SESSION['id'];
        $nombre = $_POST['nombre'];
        $formateado = str_replace(" ", "+",$_POST['id']);
        // $id_marca = openssl_decrypt($formateado, CODE, KEY);
        $id_marca = $formateado;
        if(is_numeric($id_marca)){
            $marca->eliminar_marca($id_marca);
            $descripcion='Ha eliminado una marca, '.$nombre;
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
    */

?>