<?php

function Modificar_Producto($ID_Producto, $Nombre, $Precio, $Descripcion, $Proveedor, $Cant_stock, $filepath, $Descuento, $conexion){

$sql = "UPDATE `producto` SET `Cantidad_Stock` = $Cant_stock, `Nombre` = '$Nombre', `Descripcion` = '$Descripcion', `Precio` = $Precio, `Rut` = $Proveedor , `Descuento` = $Descuento, `IMG` = '$filepath' 
WHERE `ID_Producto` = $ID_Producto";

mysqli_query($conexion, $sql);

$query= mysqli_query($conexion, $sql);

$conexion->close();

}
?>