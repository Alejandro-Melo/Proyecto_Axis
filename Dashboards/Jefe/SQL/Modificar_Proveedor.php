<?php

function Modificar_Proveedor($ID_Proveedor, $Direccion, $Nombre, $conexion){

$sql = "UPDATE proveedor SET Direccion = '$Direccion', Nombre = '$Nombre'
WHERE ID_Proveedor = $ID_Proveedor;";
$query= mysqli_query($conexion, $sql);

$conexion->close();

}
?>