<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chequeo de data</title>
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
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
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
               
        if(isset($_POST['Submit'])){
                
                $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
   
                $type = User_type($Username, $Password);
                echo $type;
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
                        header("Location: usuario.html");
                        break;
                        
                    default:
                        header("Location: index.php");
                        echo $type;
                        break;
                }
                
            }
                function User_type ($Username, $Password) {

                    $database = fopen("usuarios.txt", "r");
                    $contents = fread($database, filesize("usuarios.txt"));
                    $users = explode(" ", $contents);
                    for ($i=0; $i < count($users) ; $i++) { 
                        $user = explode(":", $users[$i]);
                        if($user[0] == $Username && $user[1]==$Password){
                            return $user[2];
                        }
                    }
                    return "No existe";
                    fclose($database);
                }



?>

</body>
</html>