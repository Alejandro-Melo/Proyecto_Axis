<?php

session_start();

$id=$_GET['id'];
$id_producto = $_GET['id_producto'];

print("$id" . "$id_producto");
        if($_SESSION['User']['Compra']['Producto'][$id] === $id_producto){
            unset($_SESSION['User']['Compra']['Producto'][$id]);
            sort($_SESSION['User']['Compra']['Producto']);
            unset($_SESSION['User']['Compra']['Cantidad_Producto'][$id]);
            sort($_SESSION['User']['Compra']['Cantidad_Producto']);
        }
        
           
        
          
        


        
        header("Location: Review.php");

?>