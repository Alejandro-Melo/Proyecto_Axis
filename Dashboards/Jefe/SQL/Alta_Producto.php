<?php

function Alta_Producto($Nombre, $Precio, $Descripcion, $Proveedor, $Cant_stock, $file, $descuento, $conexion){



$sql = "INSERT INTO `producto` (`ID_Producto`, `Cantidad_Stock`, `Nombre`, `Descripcion`, `Ventas`, `Precio`, `Descuento`, `Rut`, `IMG`) 
VALUES (NULL, '$Cant_stock', '$Nombre', '$Descripcion', 0, $Precio, $descuento, $Proveedor, '$file');";

mysqli_query($conexion, $sql);

$conexion->close();
}


?>