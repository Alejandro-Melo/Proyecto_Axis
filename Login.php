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
      <td align="right">Contraseña</td>
      <td><input name="Contrasenia" type="Password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
  <a href="Register.php">¿Todavía no te has registrado? Registrate aquí</a>
</form>

<?php session_start();
               
        include("conexion.php");

        if(isset($_POST['Submit'])){
                
                if( isset($_POST['Email']) || isset($_POST['Contrasenia'])){
                $Email = $_SESSION['User']['Email'] = $_POST['Email'];
                $Contrasenia = $_SESSION['User']['Contrasenia'] = hash('sha256', $_POST['Contrasenia']);

                $type = User_type($Email, $Contrasenia, $conexion);

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
                    
                    case 'Cliente':
                        if(Is_Active($Email, $Contrasenia, $conexion)){
                          header("Location: Usuario.html");
                        }else{
                          header("Location: Login.php");
                          echo "<script>alert('Su usuario no ha sido confirmado')</script>";
                        }
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
                function User_type ($Email, $Contrasenia, $conexion) {
                  
                  $sql = "SELECT * FROM usuario WHERE Email = '$Email' AND Contrasenia = '$Contrasenia'";
                  $query = mysqli_query($conexion, $sql);
                  
                  $row = mysqli_fetch_array($query);
                  if($row !== NULL){
                  return $row['Tipo_usuario'];
                  } else{
                    return NULL;
                  }
                
                  }
                  
                function Is_Active ($Email, $Contrasenia, $conexion){
                  
                  $sql = "SELECT * FROM usuario WHERE Email = '$Email' AND Contrasenia = '$Contrasenia'";
                  $query = mysqli_query($conexion, $sql);
                  $row = mysqli_fetch_array($query);
                  
                  if($row['Activo'] == true){
                  return true;
                  } else {
                    return false;
                  }
                }
                
                  
                
?>

</body>
</html>