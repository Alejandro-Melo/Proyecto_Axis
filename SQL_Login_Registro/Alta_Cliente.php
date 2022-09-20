<?php

function Alta_Cliente($contra, $email, $conexion){

$sql = "INSERT INTO `usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`, `Activo`) 
VALUES (NULL, 'Cliente', '$contra', current_timestamp(), '$email', 'false');";

mysqli_query($conexion, $sql);

$conexion->close();

}
?>