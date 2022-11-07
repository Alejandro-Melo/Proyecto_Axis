<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../../../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <link rel="stylesheet" href="../../../css/styleGeneral.css">
    <title>Dashboard Jefe</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <?php include("../Componente/Sidebar.php")?>
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Usuarios</h1>
            <form class="row g-3 m-1" method="post">
                <div class="row">
                    <div class="col-md-3 m-1">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail4">
                    </div>
                    <div class="col-md-3 m-1">
                        <label for="inputcontra4" class="form-label">Tipo de Usuario</label>
                        <select class="form-select" name="select" id="">
                          
                            <option value="2">Comprador</option>
                            <option value="3">Vendedor</option>
                            <option value="1">Jefe</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 m-1">
                        <label for="inputAddress" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contra" id="inputAddress">
                    </div>
                  </div>
                  <div class="col-auto m-2">
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary">
                  </div>
                  <?php
      include_once("../../../conexion.php");
      include("../SQL/Alta_Usuario.php");
      if(isset($_POST['submit'])){
        if(isset($_POST['email']) && isset($_POST['select']) && isset($_POST['contra'])){
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "No es un email válido";
            } 
            
            $tipo_usuario = "";
            
            switch($_POST['select']){
                case 1: $tipo_usuario = "Jefe";
                break;
                case 2: $tipo_usuario = "Comprador";
                break;
                case 3: $tipo_usuario = "Vendedor";
                break;
            }

            $uppercase = preg_match('@[A-Z]@', $_POST['contra']);
            $lowercase = preg_match('@[a-z]@', $_POST['contra']);
            $number    = preg_match('@[0-9]@', $_POST['contra']);
            
              if(!$uppercase || !$lowercase || !$number || strlen($_POST['contra']) < 8) {
              echo '<h6 class="m-1"> La contraseña no es lo suficientemente fuerte </h6>';
              } else{
                $contra = hash('sha256', $_POST['contra']);
                Alta_SQL($tipo_usuario, $contra, $email, $conexion);
              }
          } else{
            echo "<h1>No ha ingresado uno de los datos</h1>";
          }
        }
    ?>
                </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery-3.5.1.js"></script>
    <script src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../js/script.js"></script>
  </body>
</html>
