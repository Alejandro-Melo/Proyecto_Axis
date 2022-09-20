<?php

function Alta_SQL($tipo_usuario, $contra, $email, $conexion){

$sql = "INSERT INTO `usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`, `Activo`) 
VALUES (NULL, '$tipo_usuario', '$contra', current_timestamp(), '$email', 'true');";

mysqli_query($conexion, $sql);

$conexion->close();

}
?>