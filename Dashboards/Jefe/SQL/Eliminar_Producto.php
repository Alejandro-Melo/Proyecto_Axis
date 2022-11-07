<?php

include("../../../conexion.php");

$ID_Producto=$_GET['id'];

$sql="DELETE FROM `producto` WHERE 'ID_Producto'=$ID_Producto";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Producto.php");
    }
?>