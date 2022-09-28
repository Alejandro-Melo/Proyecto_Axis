<?php

function Alta_Cliente($contra, $email, $conexion){

$sql = "SELECT * FROM Usuario WHERE Email = '$email'";

$result = mysqli_query($conexion, $sql);

$row = mysqli_num_rows($result);

if($row == 0){

$sql2 = "INSERT INTO `Usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`, `Activo`) 
VALUES (NULL, 'Cliente', '$contra', current_timestamp(), '$email', 'false');";

mysqli_query($conexion, $sql2);

} else{
    echo "<h1>Su correo ya existe.</h1>";
}

$conexion->close();

}
?>