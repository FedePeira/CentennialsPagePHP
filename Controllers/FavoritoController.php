<?php
    // echo "Llegaste hasta aca";
    include_once '../Models/ProductoTienda.php';
    include_once '../Util/Config/config.php';
    include_once '../Models/Favorito.php';

    $producto_tienda = new ProductoTienda();
    $favorito = new Favorito();

    session_start();

    if($_POST['funcion'] == 'cambiar_estado_favorito'){
        $id_favorito_encrypted = $_POST['id_favorito'];
        $formateado = str_replace(" ", "+", $id_favorito_encrypted);
        $id_favorito = openssl_decrypt($formateado, CODE, KEY);
        $formateado = str_replace(" ", "+", $_SESSION['product-verification']);
        $id_producto_tienda = openssl_decrypt($formateado, CODE, KEY);
        $estado_favorito = $_POST['estado_favorito'];
        $id_usuario = $_SESSION['id'];
        $mensaje = '';
        if($id_favorito_encrypted != '') {
            if(is_numeric($id_favorito)) {
                if(is_numeric($id_producto_tienda)) {
                    $producto_tienda->llenar_productos($id_producto_tienda);
                    $titulo = $producto_tienda->objetos[0]->producto;
                    $url = 'Views/descripcion.php?name='.$titulo.'&&id='.$formateado;
                    if($estado_favorito == 'A') {
                        // Remover de favoritos actualizar el estado de A a I
                        $favorito->update_remove($id_favorito);
                        $mensaje = 'remove';
                    } else {
                        $favorito->update_add($id_usuario,$id_producto_tienda, $id_favorito, $url);
                        $mensaje = 'add';
                    }
                } else {
                    // Error al eliminar
                    $mensaje = 'error al eliminar';
                }
            } else {
                // Error al eliminar
                $mensaje = 'error al eliminar';
            }
        }
        else {  
            // $mensaje = 'error al eliminar';
            // Creamos nuevo registro
            // verificar que el usuario no borre el id_favorito para hacer que se cree un nuevo registro
            // volver a consultar con el id_usuario y el id_producto tienda para verificar si es que existe un registro
            if(is_numeric($id_producto_tienda)) {
                $favorito->read_favorito_usuario_protienda($id_usuario, $id_producto_tienda);
                $id_favorito = '';
                $estado_favorito = '';
                if(count($favorito->objetos)> 0){
                    $id_favorito =  $favorito->objetos[0]->id;
                    $estado_favorito = $favorito->objetos[0]->estado;
                }
                $producto_tienda->llenar_productos($id_producto_tienda);
                $titulo = $producto_tienda->objetos[0]->producto;
                $url = 'Views/descripcion.php?name='.$titulo.'&&id='.$formateado;
                if($estado_favorito == 'A') {
                    // Remover de favoritos actualizar el estado de A a I
                    $estado_favorito->update_remove($id_favorito);
                    $mensaje = 'remove';
                } else {
                    $favorito->update_add($id_usuario,$id_producto_tienda, $id_favorito, $url);
                    $mensaje = 'add';
                }
            } else {
                // Error al eliminar
                $mensaje = 'error al eliminar';
            }
        }
        // echo $id_favorito_encrypted;
        // echo $id_favorito;
        $json = array(
            'mensaje' => $mensaje
        );
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }   