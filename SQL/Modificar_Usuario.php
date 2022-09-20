<?php

function Modificar_Usuario($ID_U, $tipo_usuario, $email, $contra, $conexion){

$sql = "UPDATE usuario SET Tipo_usuario = '$tipo_usuario', Email = '$email', Contrasenia = '$contra'
WHERE ID_U = $ID_U;";
$query= mysqli_query($conexion, $sql);

$conexion->close();

}
?>