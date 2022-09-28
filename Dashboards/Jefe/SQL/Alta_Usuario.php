<?php

function Alta_SQL($tipo_usuario, $contra, $email, $conexion){

$sql = "SELECT * FROM Usuario WHERE Email = '$email'";

$result = mysqli_query($conexion, $sql);

$row = mysqli_num_rows($result);

if($row == 0){

    $sql = "INSERT INTO `usuario` (`ID_U`, `Tipo_usuario`, `Contrasenia`, `Date_creation`, `Email`, `Activo`) 
    VALUES (NULL, '$tipo_usuario', '$contra', current_timestamp(), '$email', '1');";

    mysqli_query($conexion, $sql);
    
} else{
    echo "<h1>El usuario ya existe.</h1>";
}

$conexion->close();

}
?>