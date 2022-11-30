<?php
session_start();
include('conexion.php');
$id = $_GET['id'];
$id_producto = $_GET['id_producto'];

$sql = "SELECT * FROM producto Where ID_Producto = $id";
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query);
print_r($_SESSION['User']['Compra']);
if(sizeof($_SESSION) != 0){
    if(!in_array($id, $_SESSION['User']['Compra']['Producto']) && $row['Cantidad_Stock'] >= $_POST['Cantidad_Producto']){
        array_push($_SESSION['User']['Compra']['Producto'], $id);
        array_push($_SESSION['User']['Compra']['Cantidad_Producto'], $_POST['Cantidad_Producto']);
        header("Location: index.php");
    } else{
        header("Location: index.php");
    }
    
  
    
}else{
    header("Location: Login.php");
}

?>