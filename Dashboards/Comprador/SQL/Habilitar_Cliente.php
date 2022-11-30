<?php

include("../../../conexion.php");

$ID_U=$_GET['id'];

$sql = "UPDATE usuario SET Activo = '1'
WHERE ID_U = $ID_U";
$query= mysqli_query($conexion, $sql);

if($query){
    Header("Location: ../Mostrar/Aceptar_Usuario.php");
}

$conexion->close();
?>