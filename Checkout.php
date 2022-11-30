<?php

session_start();

include('conexion.php');

header("Location: index.php");

$PrimerNombre = $_POST['Primer_Nombre'];
$SegundoNombre = $_POST['Segundo_Nombre'];
$PrimerApellido = $_POST['Primer_Apellido'];
$SegundoApellido = $_POST['Segundo_Apellido'];
$Tel_Contacto = $_POST['Tel'];
$Direccion = $_POST['Direccion'];
$Nom_Tarjeta = $_POST['Nom_Tarjeta'];
$Num_Tarjeta = $_POST['Num_Tarjeta'];
$Expire = $_POST['Expire'];
$CVV = $_POST['CVV'];
$Total = $_GET['total'];
$ID = $_SESSION['User']['ID'];
$Cantidad = $_SESSION['User']['Compra']['Cantidad_Producto'];

$sql_pedido = "INSERT INTO `pedido` Values(NULL, 'pago_pendiente', CURRENT_TIMESTAMP(), $Total, $ID); ";

$query_pedido = mysqli_query($conexion, $sql_pedido);

$Pedido_ID = mysqli_insert_id($conexion);

$sql_info = "INSERT INTO `pedido_info` Values(NULL, '$PrimerNombre', '$SegundoNombre', '$PrimerApellido', '$SegundoApellido', '$Tel_Contacto', '$Direccion', '$Nom_Tarjeta', '$Num_Tarjeta', '$Expire', '$CVV')";

$query_info = mysqli_query($conexion, $sql_info);

$PedidoInfo_ID = mysqli_insert_id($conexion);


$sql_rel_PedidoInfo = "INSERT INTO `pedido_pedidoinfo` Values($Pedido_ID, $PedidoInfo_ID);";

$query_pedido_info = mysqli_query($conexion, $sql_rel_PedidoInfo);

if(count($_SESSION['User']['Compra']['Producto']) != 0) {
foreach ($_SESSION['User']['Compra']['Producto'] as $Producto => $Prod) {

    $i = 0;

    $sql = "INSERT INTO `pedido_producto` Values ($Pedido_ID, $Prod, $Cantidad[$i]);";

    $query=mysqli_query($conexion, $sql);
    
    $sq2 = "UPDATE producto SET Ventas = Ventas + $Cantidad[$i], Cantidad_Stock = Cantidad_Stock - $Cantidad[$i], Ult_Compra = CURRENT_TIMESTAMP() Where ID_Producto = '$Prod'";

    $query2=mysqli_query($conexion, $sq2);

    $sql3 = "UPDATE usuario SET Cant_compras = Cant_compras + 1 Where ID_U = $ID";

    $query3=mysqli_query($conexion, $sql3);

    $i++;
}

}

$_SESSION['User']['Compra']['Producto'] = [];
$_SESSION['User']['Compra']['Cantidad_Producto'] = [];
/*
if(count($_SESSION['User']['Compra']['Paquete']) != 0){
    foreach ($_SESSION['User']['Compra']['Paquete'] as $Paquete => $Paq) {
    
        $i = 0;
    
        $sql = "INSERT INTO `pedido_paquete` Values ($last_id, $Prod, $Cantidad[$i]);";
    
        $query=mysqli_query($conexion, $sql);
        
        $i++;
    }
    }
*/
?>

