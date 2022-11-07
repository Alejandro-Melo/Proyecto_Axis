<?php
session_start();
$id = $_GET['id'];

if(is_array($_SESSION['User']['Compra']) == false){
$_SESSION['User']['Compra'] = array();
}
if(is_array($_SESSION['User']['Compra']['Producto']) == false){
    $_SESSION['User']['Compra']['Producto'] = array();
    }
if(is_array($_SESSION['User']['Compra']['Cantidad_Producto']) == false){
    $_SESSION['User']['Compra']['Cantidad_Producto'] = array();
    }

if(count($_SESSION) != 0){

    if(!in_array($id, $_SESSION['User']['Compra']['Producto'])){
        array_push($_SESSION['User']['Compra']['Producto'], $id);
        array_push($_SESSION['User']['Compra']['Cantidad_Producto'], $_POST['Cantidad_Producto']);
        header("Location: index.php");
    } else{
        header("Location: index.php");
    }
    
} else{
    header("Location: Login.php");
}


?>