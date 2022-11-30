<?php

include("../../../conexion.php");

$Rut=$_GET['id'];

$sql="DELETE FROM proveedor WHERE Rut='$Rut'";
$sql2="DELETE FROM `proveedor_telefonos` WHERE Rut='$Rut'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Proveedor.php");
    }
?>