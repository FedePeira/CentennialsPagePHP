<?php
    // echo "Llegaste hasta aca";
    include_once '../Models/UsuarioDistrito.php';
    include_once '../Models/Historial.php';
    include_once '../Util/Config/config.php';
    $usuario_distrito = new UsuarioDistrito();
    $historial = new Historial();
    session_start();

    if($_POST['funcion'] == 'crear_direccion'){
        $id_usuario = $_SESSION['id'];
        $id_distrito = $_POST['id_distrito'];
        $direccion = $_POST['direccion'];
        $referencia = $_POST['referencia'];
        $usuario_distrito->crear_direccion($id_usuario, $id_distrito, $direccion, $referencia);
        // Descripcion del historial
        $descripcion = 'Ha creado una nueva direccion: '.$direccion;
        // Para que se muestre en el historial, en este caso, cuando se CREA una direccion nueva
        // 2: Referencia al tipo_de_historial, 2 = Crear
        // 1: Referencia al modulo, 1 = Mi perfil
        $historial->crear_historial($descripcion, 2, 1, $id_usuario);
        echo 'success';
    }   

    if($_POST['funcion'] == 'llenar_direcciones'){
        $id_usuario = $_SESSION['id'];
        $usuario_distrito->llenar_direcciones($id_usuario);
        $json = array();
        foreach ($usuario_distrito->objetos as $objeto){
            $json[]=array(
                'id'=>openssl_encrypt($objeto->id,CODE,KEY),
                'direccion'=>$objeto->direccion,
                'referencia'=>$objeto->referencia,
                'departamento'=>$objeto->departamento,
                'provincia'=>$objeto->provincia,
                'distrito'=>$objeto->distrito,
            );
        }
        $jsonstring= json_encode($json);
        echo $jsonstring;
    }   

    if($_POST['funcion'] == 'eliminar_direccion'){
        $id_direccion = openssl_decrypt($_POST['id'], CODE, KEY);
        if(is_numeric($id_direccion)){
            // Para que se muestre en el historial, en este caso, cuando se BORRA una direccion 
            $usuario_distrito->recuperar_direccion($id_direccion);
            $direccion_borrada = $usuario_distrito->objetos[0]->direccion.', Distrito: '.$usuario_distrito->objetos[0]->distrito.', Provincia: '.$usuario_distrito->objetos[0]->provincia.', Departamento: '.$usuario_distrito->objetos[0]->departamento;            // var_dump($usuario_distrito);
            // $usuario_distrito->eliminar_direccion($id_direccion);
            $usuario_distrito->eliminar_direccion($id_direccion);
            $descripcion = 'Ha eliminado la direccion: '.$direccion_borrada;
            $historial->crear_historial($descripcion, 3, 1, $_SESSION['id']);
            echo 'success';
        } else {
            echo 'error';
        }
        
    }   
?>