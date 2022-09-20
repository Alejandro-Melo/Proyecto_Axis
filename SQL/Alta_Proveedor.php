<?php
function Alta_Proveedor($Direccion, $Nombre, $Rut, $conexion){

$sql = "INSERT INTO `proveedor` (`Rut`, `Direccion`, `Nombre`) 
VALUES ('$Rut', '$Direccion', '$Nombre');";

mysqli_query($conexion, $sql);

}
?>

<?php
function Asignar_Telefonos($Rut, $Telefonos, $conexion){
    $sql = "INSERT INTO `proveedor_telefonos` (`Rut`, `telefono`) 
VALUES ('$Rut', '$Telefonos');";

mysqli_query($conexion, $sql);

$conexion->close();
}
?>