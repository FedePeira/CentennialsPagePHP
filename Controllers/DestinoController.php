<?php
    // echo "Llegaste hasta aca";
    include_once '../Util/Config/config.php';
    include_once '../Models/Destino.php';
    include_once '../Models/Historial.php';

    $historial = new Historial();
    $destino = new Destino();

    session_start();

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
            );
        }
        $jsonstring =  json_encode($json);
        echo $jsonstring;
    }   