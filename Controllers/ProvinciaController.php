<?php
    // echo "Llegaste hasta aca";
    include_once '../Models/Provincia.php';
    include_once '../Util/Config/config.php';

    $provincia = new Provincia();
    session_start();

    if($_POST['funcion'] == 'llenar_provincia'){
        $formateado = str_replace(" ", "+", $_POST['id_departamento']);
        $id_departamento = openssl_decrypt($formateado, CODE, KEY);
        $json = array();
        if($_POST['id_departamento']!=''){
            if(is_numeric($id_departamento)) {
                $provincia->llenar_provincia($id_departamento);
                foreach ($provincia->objetos as $objeto){
                    $json[]=array(
                        'id'=>openssl_encrypt($objeto->id, CODE, KEY),
                        'nombre'=>$objeto->nombre
                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
            } else {
                echo 'error';
            }
        } else {
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
    }    
?>