<?php

function Alta_Paquete($Nombre, $Precio, $Descripcion, $conexion){

$sql = "INSERT INTO `paquete` (`ID_Paquete`, `Descripcion`, `Nombre`, `Precio`) 
VALUES (NULL, '$Descripcion', '$Nombre', '$Precio');";

mysqli_query($conexion, $sql);

}

function Asignar_Paquetes($ID_Paquete, $ID_Productos, $conexion){
    $sql = "INSERT INTO `producto_paquete` (`ID_Producto`, `ID_Paquete`) 
    VALUES ('$ID_Productos', '$ID_Paquete');";

mysqli_query($conexion, $sql);

$conexion->close();
}


?>