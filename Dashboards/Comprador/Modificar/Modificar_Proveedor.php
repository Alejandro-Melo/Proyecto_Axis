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
    <?php include("../../Componente/Sidebar.php");?>
    <?php 
              include_once("../../../conexion.php");
              include("../Modificar/Modificar_Proveedor.php");
              $id = $_GET['id'];
    ?>
    
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Proveedor</h1>
            <?php
    
    $sql = "SELECT * from proveedor where RUT = '$id'";
    $query = mysqli_query($conexion, $sql);
    while($row=mysqli_fetch_array($query)){
    
    
    ?>
            <form class="row g-3 m-1" method="post">
                <div class="row">
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="Direccion" value="<?php echo $row['Direccion'];?>" id="inputtext4">
                    </div>
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" value="<?php echo $row['Nombre'];?>" id="inputtext4">
                    </div>
                    <div class="col-md-2 m-1">
                          <label for="inputtext4" class="form-label">Rut</label>
                          <input type="number" class="form-control" name="Rut" value="<?php echo $row['Rut'];?>"id="Rut">
                      </div>
                </div>
                <div class="row">
                      <div class="col-md-2 m-1">
                          <label for="inputtext4" class="form-label">Telefonos</label>
                          <input type="number" class="form-control" name="Telefono" id="Telefono">
                      </div>
                    <div class="col-md-2">
                        <br>
                        <input type="button" class="form-control" value="Agregar" name="Agregar_T" id="Agregar">
                      </div>
                      <div class="col-md-1">
                        <br>
                        <input type="button" class="form-control" value="Eliminar" name="Eliminar_T" id="Eliminar">
                      </div>
                      <div class="col-md-3 m-1">
                        <label for="telefonos" class="form-label">Telefonos</label>
                        <select class="form-control" name="Tel_Sel[]" id="Tel_Sel" multiple>

                        </select>
                    </div>
                </div>  
                  <div class="col-auto m-2">
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary">
                  </div>
                </div>
                          <?php
    }
              
              if(isset($_POST['submit'])){
                if(isset($_POST['Direccion']) && isset($_POST['Nombre']) && isset($_POST['Rut'])){
                  $Direccion = $_POST['Direccion'];
                  $Nombre = $_POST['Nombre'];
                  $Rut = $_POST['Rut'];
                  $Telefonos = $_POST['Tel_Sel'];
                  $Tel = implode("-", $Telefonos);
                  Alta_Proveedor($Direccion, $Nombre, $Rut, $conexion);
                  Asignar_Telefonos($Rut, $Tel, $conexion);
                } else{
                  echo "<script> alert('No ha ingresado uno de los datos') </script>";
                }
              }
                
                
                ?>
                </div>
            </form>
          </div>
        </div>
      </div>
    </main>
                  <?php
      include_once("../../../conexion.php");
      include("../../../SQL/Modificar_Proveedor.php");
      if(isset($_POST['submit'])){
        if(isset($_POST['Direccion']) && isset($_POST['Nombre'])){
          $Direccion = $_POST['Direccion'];
          $Nombre = $_POST['Nombre'];
          $ID_Proveedor=$_GET['id'];
          Modificar_Proveedor($ID_Proveedor, $Direccion, $Nombre, $conexion);
        }else{
          echo "<h1>No ha ingresado uno de los datos</h1>";
        }
      }
      ?>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery-3.5.1.js"></script>
    <script src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../js/script.js"></script>
  </body>
</html>
