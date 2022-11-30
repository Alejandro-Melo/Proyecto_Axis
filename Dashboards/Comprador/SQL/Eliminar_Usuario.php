<?php

include("../../../conexion.php");

$ID_U=$_GET['id'];

$sql="UPDATE Usuario SET Activo = false WHERE ID_U='$ID_U'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Usuario.php");
    }
?>