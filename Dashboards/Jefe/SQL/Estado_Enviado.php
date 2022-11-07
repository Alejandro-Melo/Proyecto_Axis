<?php

include("../../../conexion.php");

$ID_Pedido=$_GET['id'];

$sql="UPDATE Pedido SET Estado = 'Finalizado' WHERE ID_Pedido='$ID_Pedido'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: ../Mostrar/Mostrar_Pedido.php");
    }
?>