<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Email</td>
      <td><input name="Email" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
</form>

<?php session_start();
               
        include("conexion.php");

        if(isset($_POST['Submit'])){
                
                if( isset($_POST['Email']) || isset($_POST['Password'])){
                $_SESSION['User']['Email'] = $_POST['Email'];
                $_SESSION['User']['Password'] = $_POST['Password'];

                $type = User_type($_SESSION['User']['Email'], $_SESSION['User']['Password'], $conexion);

                } else{
                  echo "<h1>Ha ingresado algunos de los datos incorrectamante, o no existen.</h1>";
                }
                
                if(NULL !== $type){
                
                  switch ($type) {
                    case 'Jefe':
                        header("Location: Dashboards/dashboard_jefe.html");
                        break;
                    case 'Vendedor':
                        header("Location: Dashboards/dashboard_vendedor.html");
                        break;
                    case 'Comprador':
                        header("Location: Dashboards/dashboard_comprador.html");
                        break;  
                    
                    case 'Usuario':
                        header("Location: Usuario.html");
                        break;
                        
                    default:
                        echo "<h1>Ha ingresado algunos de los datos incorrectamante, o no existen.</h1>";
                        break;
                  }
                } else{
                    session_unset();
                    header( "refresh:5;Login.php" );
                    echo '<h3>Ha ingresado algunos de los datos incorrectamante, o no existen.</h3>';
                  }

            }
                function User_type ($Email, $Password, $conexion) {
                  
                  $sql = "SELECT * FROM usuario WHERE Email = '$Email' AND Contrasenia = '$Password'";
                  $query = mysqli_query($conexion, $sql);
                  
                  $row = mysqli_fetch_array($query);
                  if($row !== NULL){
                  return $row['Tipo_usuario'];
                  } else{
                    return NULL;
                  }
                
                  }
                



?>

</body>
</html>