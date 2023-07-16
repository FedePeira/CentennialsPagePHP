<?php
include_once '../Models/Distrito.php';
include_once '../Util/Config/config.php';

$distrito = new Distrito();
session_start();

if($_POST['funcion'] == 'llenar_distritos'){
    $formateado = str_replace(" ", "+", $_POST['id_provincia']);
    $id_provincia = openssl_decrypt($formateado, CODE, KEY);
    $distrito->llenar_distritos($id_provincia);
    $json=array();
    if($_POST['id_provincia']!=''){
        if(is_numeric($id_provincia)) {
            $distrito->llenar_distritos($id_provincia);
            foreach ($distrito->objetos as $objeto){
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
