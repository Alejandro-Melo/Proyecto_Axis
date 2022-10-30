<?php

function Alta_Producto($Nombre, $Precio, $Descripcion, $Proveedor, $Cant_stock, $file, $conexion){

$sql = "INSERT INTO `producto` (`ID_Producto`, `Cantidad_Stock`, `Nombre`, `Descripcion`, `Ventas`, `Precio`, `Rut`, `IMG`) 
VALUES (NULL, '$Cant_stock', '$Nombre', '$Descripcion', 0, $Precio, $Proveedor, '$file');";

mysqli_query($conexion, $sql);



$conexion->close();

}
?>