<?php

include("../../../conexion.php");

$ID_U=$_GET['id'];

$sql="DELETE FROM Usuario WHERE ID_U='$ID_U'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar_Usuario.php");
    }
?>