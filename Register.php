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
      <td align="right">Confirmar Contraseña</td>
      <td><input name="C_Contrasenia" type="Password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Registrarse" class="Button3"></td>
    </tr>
  </table>
</form>

<?php session_start();
               
        include("conexion.php");
        include("SQL/Alta_Cliente.php");

        if(isset($_POST['Submit'])){
            if(isset($_POST['Email']) && isset($_POST['Contrasenia']) && isset($_POST['C_Contrasenia'])){
              if($_POST['Contrasenia'] == $_POST['C_Contrasenia']){
                  
                    $email = $_POST["Email"];
                    
                      $uppercase = preg_match('@[A-Z]@', $_POST['Contrasenia']);
                      $lowercase = preg_match('@[a-z]@', $_POST['Contrasenia']);
                      $number    = preg_match('@[0-9]@', $_POST['Contrasenia']);
                  
                    if(!$uppercase || !$lowercase || !$number || strlen($_POST['Contrasenia']) < 8) {
                    echo '<h6 class="m-1"> La contraseña no es lo suficientemente fuerte </h6>';

                    } else{
                      $contra = hash('sha256', $_POST['Contrasenia']);
                      Alta_Cliente($contra, $email, $conexion);
                    }

                  } else{
                    echo "<h1>Las contraseñas no son iguales</h1>";
                  }

                } else{
                  echo "<h1>Alguno de los datos no son correctos";
                }
        }
?>

</body>
</html>