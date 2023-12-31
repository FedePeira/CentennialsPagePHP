<?php
    // echo "Llegaste hasta aca";
    include_once '../Util/Config/config.php';
    include_once '../Models/Destino.php';
    include_once '../Models/Historial.php';

    $historial = new Historial();
    $destino = new Destino();
    $destino_2 = new Destino();

    session_start();
    
    if($_POST['funcion'] == 'agregar_favorito'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $destino->agregar_favorito($id_mensaje);
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $destino->agregar_favorito_emisor($id_mensaje);
                // echo 'mensaje enviado';
            }
            // $destino->agregar_favorito($id_mensaje);
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    } 
    
    if($_POST['funcion'] == 'remover_favorito'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $destino->remover_favorito($id_mensaje);
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $destino->remover_favorito_emisor($id_mensaje);
                // echo 'mensaje enviado';
            }
            // $destino->remover_favorito($id_mensaje);
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    } 

    if($_POST['funcion'] == 'abrir_mensaje'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_SESSION['message-verification']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        $formateado = str_replace(" ","+", $_SESSION['message-option']);
        $option = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($option)) {
            if(is_numeric($id_mensaje)) {
                if($option == '1' || $option == '2' || $option == '3' || $option == '4') {
                    $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
                    if(!empty($destino->objetos)){
                        // Mensaje recibido 
                        $favorito=$destino->objetos[0]->favorito;
                        $destino_2->mensaje_leido($id_mensaje);
                        // echo 'mensaje recibido';
                    } else {
                        // Mensaje enviado
                        $destino->verificar_usuario_mensaje_emisor($id_usuario, $id_mensaje);
                        if(!empty($destino->objetos)) {
                            // el mensaje si es enviado por nosotros
                            $favorito=$destino->objetos[0]->favorito_emisor;
                            $destino_2->mensaje_leido_emisor($id_mensaje);
                        }
                        // echo 'mensaje enviado';
                    }                    
                    if(!empty($destino->objetos)) {
                        $destino->abrir_mensaje($id_mensaje, $id_usuario);
                        if(!empty($destino->objetos)){
                            if($_SESSION['nombre']==$destino->objetos[0]->nombres.' '.$destino->objetos[0]->apellidos) {
                                // enviado
                                $E_D = 'Para: '.$destino->objetos[0]->destino;
                                $estado_E_D = '1';
                            } else {
                                // recibido
                                $E_D = 'De: '.$destino->objetos[0]->nombres.' '.$destino->objetos[0]->apellidos;
                                $estado_E_D = '0';
                            }
                            $json = array(
                                'id'=>openssl_encrypt($destino->objetos[0]->id,CODE, KEY),
                                'asunto'=>$destino->objetos[0]->asunto,
                                'contenido'=>$destino->objetos[0]->contenido,
                                'abierto'=>$destino->objetos[0]->abierto,
                                'favorito'=>$favorito,
                                'estado'=>$destino->objetos[0]->estado,
                                'fecha_creacion'=>$destino->objetos[0]->fecha_creacion,
                                'fecha_edicion'=>$destino->objetos[0]->fecha_edicion,
                                'E_D'=>$E_D,
                                'option'=>$option,
                                'estado_E_D'=>$estado_E_D
                            );
                            $jsonstring = json_encode($json);
                            echo $jsonstring;
                        } else {    
                            echo 'danger';
                        }
                    } else {
                        echo 'danger';
                    }
                } else {
                     echo 'danger';
                }
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } 

    // Eliminar Mensajes
    if($_POST['funcion'] == 'eliminar_mensaje'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        $formateado = str_replace(" ","+", $_SESSION['message-option']);
        $option = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $destino->eliminar_mensaje($id_mensaje);
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $destino->eliminar_mensaje_emisor($id_mensaje);
                // echo 'mensaje enviado';
            }
            $descripcion = 'Ha eliminado un mensaje';
            $historial->crear_historial($descripcion, 3, 8, $id_usuario);
            $json = array(
                'mensaje'=>'success',
                'option'=>$option
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }

    if($_POST['funcion'] == 'eliminar_mensajes'){
        $id_usuario = $_SESSION['id'];
        $eliminados = json_decode($_POST['eliminados']);
        $bandera = '1';
        foreach($eliminados as $objeto) {
            $formateado = str_replace(" ","+", $objeto);
            $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
            if(is_numeric($id_mensaje)) {
                $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
                if(!empty($destino->objetos)){
                    // Mensaje recibido 
                    $destino->eliminar_mensaje($id_mensaje);
                    // echo 'mensaje recibido';
                } else {
                    // Mensaje enviado
                    $destino->eliminar_mensaje_emisor($id_mensaje);
                    // echo 'mensaje enviado';
                }
                // $destino->eliminar_mensaje($id_mensaje);
                $descripcion = 'Ha eliminado un mensaje';
                $historial->crear_historial($descripcion, 3, 8, $id_usuario);
            } else {
                $bandera = '0';
            }
        }
        if($bandera == '1') {
            // Correcto
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            // Vulnero el sistema
            echo 'error';
        }
    }   

    if($_POST['funcion'] == 'eliminar_mensajes_definitivamente'){
        $id_usuario = $_SESSION['id'];
        $eliminados = json_decode($_POST['eliminados']);
        $bandera = '1';
        foreach($eliminados as $objeto) {
            $formateado = str_replace(" ","+", $objeto);
            $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
            if(is_numeric($id_mensaje)) {
                $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
                if(!empty($destino->objetos)){
                    // Mensaje recibido 
                    $destino->eliminar_mensaje_definitivamente($id_mensaje);
                    // echo 'mensaje recibido';
                } else {
                    // Mensaje enviado
                    $destino->eliminar_mensaje_definitivamente_emisor($id_mensaje);
                    // echo 'mensaje enviado';
                }
                $destino->eliminar_mensaje_definitivamente($id_mensaje);
                $descripcion = 'Ha eliminado un mensaje definitivamente';
                $historial->crear_historial($descripcion, 3, 8, $id_usuario);
            } else {
                $bandera = '0';
            }
        }
        if($bandera == '1') {
            // Correcto
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            // Vulnero el sistema
            echo 'error';
        }
    }   

    if($_POST['funcion'] == 'eliminar_mensaje_definitivamente'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        $bandera = '1';
        if(is_numeric($id_mensaje)) {
            $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $destino->eliminar_mensaje_definitivamente($id_mensaje);
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $destino->eliminar_mensaje_definitivamente_emisor($id_mensaje);
                // echo 'mensaje enviado';
            }
            $descripcion = 'Ha eliminado un mensaje definitivamente';
            $historial->crear_historial($descripcion, 3, 8, $id_usuario);
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }   

    // Read Mensajes
    if($_POST['funcion'] == 'read_mensajes_recibidos'){
        $id_usuario = $_SESSION['id'];
        $destino->read_mensajes_recibidos($id_usuario);
        $json = array();
        foreach($destino->objetos as $objeto){
            $json[] = array(
                'id'=>openssl_encrypt($objeto->id,CODE, KEY),
                'asunto'=>$objeto->asunto,
                'contenido'=>$objeto->contenido,
                'abierto'=>$objeto->abierto,
                'favorito'=>$objeto->favorito,
                'estado'=>$objeto->estado,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'fecha_edicion'=>$objeto->fecha_edicion,
                'emisor'=>$objeto->nombres.' '.$objeto->apellidos,
                'r'=>openssl_encrypt(1, CODE, KEY)
            );
        }
        $jsonstring =  json_encode($json);
        echo $jsonstring;
    }   

    if($_POST['funcion'] == 'read_mensajes_favoritos'){
        $id_usuario = $_SESSION['id'];
        $destino->read_mensajes_favoritos($id_usuario);
        $json = array();
        foreach($destino->objetos as $objeto){
            $destino->verificar_usuario_mensaje($id_usuario, $objeto->id);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $favorito = $objeto->favorito;
                $abierto = $objeto->abierto;
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $favorito = $objeto->favorito_emisor;
                $abierto = $objeto->abierto_emisor;
                // echo 'mensaje enviado';
            }
            if($_SESSION['nombre']==$objeto->nombres.' '.$objeto->apellidos) {
                // enviado
                $E_D = 'Para: '.$objeto->destino;
            } else {
                // recibido
                $E_D = 'De: '.$objeto->nombres.' '.$objeto->apellidos;
            }
            $json[] = array(
                'id'=>openssl_encrypt($objeto->id,CODE, KEY),
                'asunto'=>$objeto->asunto,
                'contenido'=>$objeto->contenido,
                'abierto'=>$objeto->abierto,
                'favorito'=>$objeto->favorito,
                'estado'=>$objeto->estado,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'fecha_edicion'=>$objeto->fecha_edicion,
                'E_D'=>$E_D,
                'f'=>openssl_encrypt(3, CODE, KEY)
            );
        }
        $jsonstring =  json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'read_mensajes_papelera'){
        $id_usuario = $_SESSION['id'];
        $destino->read_mensajes_papelera($id_usuario);
        $json = array();
        foreach($destino->objetos as $objeto){
            $destino->verificar_usuario_mensaje($id_usuario, $objeto->id);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $favorito = $objeto->favorito;
                $abierto = $objeto->abierto;
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $favorito = $objeto->favorito_emisor;
                $abierto = $objeto->abierto_emisor;
                // echo 'mensaje enviado';
            }
            if($_SESSION['nombre']==$objeto->nombres.' '.$objeto->apellidos) {
                // enviado
                $E_D = 'Para: '.$objeto->destino;
            } else {
                // recibido
                $E_D = 'De: '.$objeto->nombres.' '.$objeto->apellidos;
            }
            $json[] = array(
                'id'=>openssl_encrypt($objeto->id,CODE, KEY),
                'asunto'=>$objeto->asunto,
                'contenido'=>$objeto->contenido,
                'abierto'=>$objeto->abierto,
                'favorito'=>$objeto->favorito,
                'estado'=>$objeto->estado,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'fecha_edicion'=>$objeto->fecha_edicion,
                'emisor'=>$objeto->nombres.' '.$objeto->apellidos,
                'E_D'=>$E_D,
                'p'=>openssl_encrypt(4, CODE, KEY)
            );
        }
        $jsonstring =  json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'read_mensajes_enviados'){
        $id_usuario = $_SESSION['id'];
        $destino->read_mensajes_enviados($id_usuario);
        $json = array();
        foreach($destino->objetos as $objeto){
            $json[] = array(
                'id'=>openssl_encrypt($objeto->id,CODE, KEY),
                'asunto'=>$objeto->asunto,
                'contenido'=>$objeto->contenido,
                'abierto'=>$objeto->abierto,
                'favorito'=>$objeto->favorito,
                'estado'=>$objeto->estado,
                'fecha_creacion'=>$objeto->fecha_creacion,
                'fecha_edicion'=>$objeto->fecha_edicion,
                'emisor'=>$objeto->nombres.' '.$objeto->apellidos,
                'destino'=>$objeto->destino,
                'e'=>openssl_encrypt(2, CODE, KEY)
            );
        }
        $jsonstring =  json_encode($json);
        echo $jsonstring;
    } 

    if($_POST['funcion'] == 'restaurar_mensajes'){
        $id_usuario = $_SESSION['id'];
        $eliminados = json_decode($_POST['eliminados']);
        $bandera = '1';
        foreach($eliminados as $objeto) {
            $formateado = str_replace(" ","+", $objeto);
            $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
            if(is_numeric($id_mensaje)) {
                $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
                if(!empty($destino->objetos)){
                    // Mensaje recibido 
                    $destino->restaurar_mensaje($id_mensaje);
                    // echo 'mensaje recibido';
                } else {
                    // Mensaje enviado
                    $destino->restaurar_mensaje_emisor($id_mensaje);
                    // echo 'mensaje enviado';
                }
                // $destino->eliminar_mensaje($id_mensaje);
                $descripcion = 'Ha restaurado un mensaje';
                $historial->crear_historial($descripcion, 3, 8, $id_usuario);
            } else {
                $bandera = '0';
            }
        }
        if($bandera == '1') {
            // Correcto
            $json = array(
                'mensaje'=>'success',
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            // Vulnero el sistema
            echo 'error';
        }
    }   

    if($_POST['funcion'] == 'traer_informacion_mensaje'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->traer_informacion_mensaje($id_mensaje);
            $json = array(
                'id_usuario'=>openssl_encrypt($destino->objetos[0]->id_usuario,CODE, KEY),
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }  

    if($_POST['funcion'] == 'obtener_contenido_mensaje'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->obtener_contenido_mensaje($id_mensaje);
            $json = array(
                'contenido'=>$destino->objetos[0]->contenido,
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    }  

    if($_POST['funcion'] == 'restaurar_mensaje'){
        $id_usuario = $_SESSION['id'];
        $formateado = str_replace(" ","+", $_POST['id']);
        $id_mensaje = openssl_decrypt($formateado, CODE, KEY);
        if(is_numeric($id_mensaje)) {
            $destino->verificar_usuario_mensaje($id_usuario, $id_mensaje);
            if(!empty($destino->objetos)){
                // Mensaje recibido 
                $destino->restaurar_mensaje($id_mensaje);
                // echo 'mensaje recibido';
            } else {
                // Mensaje enviado
                $destino->restaurar_mensaje_emisor($id_mensaje);
                // echo 'mensaje enviado';
            }
            // $destino->eliminar_mensaje($id_mensaje);
            $descripcion = 'Ha restaurado un mensaje';
            $historial->crear_historial($descripcion, 1, 8, $id_usuario);
            $json = array(
                'mensaje'=>'success'
            );
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            echo 'error';
        }
    } 

    if($_POST['funcion'] == 'obtener_contadores'){
        $id_usuario = $_SESSION['id'];
        $destino->obtener_contadores_mensajes($id_usuario);
        $json=array(
            'contador_mensaje'=>$destino->objetos[0]->contador_mensaje
        );
        $jsonstring=json_encode($json);
        echo $jsonstring;
    } 