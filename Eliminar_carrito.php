<?php

session_start();

$id=$_GET['id'];
$id_producto = $_GET['id_producto'];

print("$id" . "$id_producto");
        if($_SESSION['User']['Compra']['Producto'][$id] === $id_producto){
            array_splice($_SESSION['User']['Compra']['Cantidad_Producto'], $id, $id);
        }
        if($_SESSION['User']['Compra']['Producto'][$id] === $id_producto){
            unset($_SESSION['User']['Compra']['Producto'][$id]);
        
        }
        
        if($_SESSION['User']['Compra']['Cantidad_Producto'][$id] === $id_producto){
            array_splice($_SESSION['User']['Compra']['Cantidad_Producto'], $id, $id);
        }
        if($_SESSION['User']['Compra']['Cantidad_Producto'][$id] === $id_producto){
            unset($_SESSION['User']['Compra']['Cantidad_Producto'][$id]);
        


        }
        header("Location: Review.php");

?>