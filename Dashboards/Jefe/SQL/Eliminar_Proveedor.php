<?php

include("../../../conexion.php");

$Rut=$_GET['id'];

$sql="DELETE FROM proveedor WHERE Rut='$Rut'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Proveedor.php");
    }
?>