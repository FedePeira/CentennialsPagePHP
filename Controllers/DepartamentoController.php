<?php
    // echo "Llegaste hasta aca";
    include_once '../Models/Departamento.php';
    include_once '../Util/Config/config.php';

    $departamento = new Departamento();
    session_start();

    if($_POST['funcion'] == 'llenar_departamentos'){
        $departamento->llenar_departamentos();
        foreach ($departamento->objetos as $objeto){
            $json[]=array(
                'id'=>openssl_encrypt($objeto->id, CODE, KEY),
                'nombre'=>$objeto->nombre
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }   


?>