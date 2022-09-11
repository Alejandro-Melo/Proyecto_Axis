<?php

include("../../../conexion.php");

$ID_Proveedor=$_GET['id'];

$sql="DELETE FROM proveedor WHERE ID_Proveedor='$ID_Proveedor'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Proveedor.php");
    }
?>