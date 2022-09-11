<?php

function Alta_SQL($tipo_usuario, $contra, $email, $conexion){

$sql = "INSERT INTO `usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`) 
VALUES (NULL, '$tipo_usuario', '$contra', current_timestamp(), '$email');";

mysqli_query($conexion, $sql);

echo "<script> alert('Se ha ingresado con exito el usuario') </script>";

$conexion->close();

}
?>