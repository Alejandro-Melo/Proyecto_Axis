<?php session_start();?>
<!DOCTYPE html>
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
              <h2 class="text-uppercase text-center mb-5">¡Crea tu cuenta!</h2>

              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="Email" class="form-control form-control-lg" required/>
                  <label class="form-label" for="form3Example3cg">Tu Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="Contrasenia" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example4cg">Contraseña</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="C_Contrasenia" class="form-control form-control-lg" required />
                  <label class="form-label" for="form3Example4cdg">Repita Contraseña</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-link btn-block btn-lg gradient-custom-4 text-white" name="Submit">¡Registrar!</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">¿Tenés una cuenta? <a href="Login.php"
                    class="fw-bold text-body"><u>Logeate aquí</u></a></p>

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
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>


<?php 
               
        include("conexion.php");
        include("SQL_Login_Registro/Alta_Cliente.php");

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
                  echo "<h1>Alguno de los datos no son correctos<h1>";
                }
        }
?>
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>