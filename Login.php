

<!DOCTYPE html>
<?php include("conexion.php");
session_start(); 
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Natalia Viera Seguridad Coroporal</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link
      rel="stylesheet"
      href="css/register.css"
    />
    <!-- CSS -->

    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <!-- Navbar -->
<header>
<nav class="navbar navbar-expand-lg navbar-primary bg-primary" style="background-color: rgba(0, 0, 0, 0.2);" >
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2 bg-primary" href="index.php">
      <img
        src="assets/Natalia Viera.png"
        height="48"
        alt="Natalia Viera"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Natalia Viera Seguridad</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <a href="" class="text-white px-3 me-2">Contacto</a>
        <a type="button" href="Login.php" class="btn btn-primary px-3 me-2">
          Login
        </a>
        <a type="button" href="Register.php" class="btn btn-primary bg-white text-black me-3">
          ¡Registrate!
        </a>
        
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
</header>
<!-- Navbar -->

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Inicia Sesión</h2>

              <form method="post">

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="Email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Tu Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="Contrasenia" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Contraseña</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-link btn-block btn-lg gradient-custom-4 text-white" name="Submit">¡Registrar!</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">¿No tenés una cuenta? <a href="Register.php"
                    class="fw-bold text-body"><u>Registrate aquí</u></a></p>

                    <?php
        
        

        if(isset($_POST['Submit'])){
                $_SESSION['User']['LoggedIn'] = false;
                if( isset($_POST['Email']) || isset($_POST['Contrasenia'])){
                $_SESSION['User']['Email'] = $_POST['Email'];

                
                $_SESSION['User']['Contrasenia'] = hash('sha256', $_POST['Contrasenia']);
                
                $type = User_type($_SESSION['User']['Email'], $_SESSION['User']['Contrasenia'], $conexion);

                $_SESSION['User']['Tipo_Usuario'] = $type;
                  
                $_SESSION['User']['ID'] = ID($_SESSION['User']['Email'], $_SESSION['User']['Contrasenia'], $conexion);


                } else{
                  echo "<h1>Ha ingresado algunos de los datos incorrectamante, o no existen.</h1>";
                  session_unset();
                }
                
                if(NULL !== $type){
                
                  switch ($type) {
                    case 'Jefe':
                        ?>
                        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Dashboards/dashboard_jefe.php">
                        <?php
                        $_SESSION['User']['LoggedIn'] = true;
                        break;
                    case 'Vendedor':
                          ?>
                          <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Dashboards/dashboard_vendedor.php">
                          <?php
                          $_SESSION['User']['LoggedIn'] = true;
                          break;
                    case 'Comprador':
                          ?>
                          <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Dashboards/dashboard_comprador.php">
                          <?php
                          $_SESSION['User']['LoggedIn'] = true;
                          break; 
                    
                    case 'Cliente':
                        if(Is_Active($_SESSION['User']['Email'], $_SESSION['User']['Contrasenia'], $conexion)){
                            ?>
                            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
                            <?php
                            $_SESSION['User']['LoggedIn'] = true;

                        }else{
                            ?>
                            <script> alert("Su cuenta no está confirmada") </script>
                            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php">
                            <?php
                            session_unset();
                        }
                        break;
                        
                    default:
                        session_unset();
                        echo "<h3>Ha ingresado algunos de los datos incorrectamante, o no existen.</h3>";
                        break;
                  }
                } else{
                    session_unset();
                    ?>
                    <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php">
                    <?php
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

                function ID ($Email, $Contrasenia, $conexion) {
                  
                  $sql = "SELECT * FROM usuario WHERE Email = '$Email' AND Contrasenia = '$Contrasenia'";
                  $query = mysqli_query($conexion, $sql);
                  
                  $row = mysqli_fetch_array($query);
                  if($row !== NULL){
                  return $row['ID_U'];
                  } else{
                    return NULL;
                  }
                
                  }
                
                  
                
?>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>




</body>
</html>