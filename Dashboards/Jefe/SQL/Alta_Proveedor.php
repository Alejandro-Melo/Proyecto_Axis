<?php

function Alta_Proveedor($Direccion, $Nombre, $conexion){

$sql = "INSERT INTO `proveedor` (`ID_Proveedor`, `Direccion`, `Nombre`) 
VALUES (NULL, '$Direccion', '$Nombre');";

mysqli_query($conexion, $sql);

$conexion->close();

}
?>