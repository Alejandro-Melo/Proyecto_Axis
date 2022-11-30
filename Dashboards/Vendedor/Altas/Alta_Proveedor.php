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
    <script src="../../../js/jquery-3.5.1.js"></script>
    
    <title>Dashboard Jefe</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <?php include("../../Componente/Sidebar.php")?>
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Proveedor</h1>
            <form class="row g-3 m-1" method="post">
                <div class="row">
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="Direccion" id="inputtext4">
                    </div>
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" id="inputtext4">
                    </div>
                    <div class="col-md-3 m-1">
                          <label for="inputtext4" class="form-label">Rut</label>
                          <input type="number" class="form-control" name="Rut" id="Rut">
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
                      <div class="col-md-2">
                        <br>
                        <input type="button" class="form-control" value="Eliminar" name="Eliminar_T" id="Eliminar">
                      </div>
                      <div class="col-md-3 m-1">
                        <label for="telefonos" class="form-label">Telefonos</label>
                        <select class="form-control" name="Tel_Sel[]" id="Tel_Sel" multiple>
                        <input type="hidden" id="result" name="Telefonos_Insert"/>
                        </select>
                    </div>
                </div>  
                
                  <div class="col-auto m-2">
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary">
                  </div>
                </div>
                          <?php
              include_once("../../../conexion.php");
              include("../SQL/Alta_Proveedor.php");
              
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
    <script type="text/javascript">
    
    var Telefonos = [];
      $("#Agregar").click(function(){
        let Telefono = $("#Telefono").val();
      $.ajax({
        method: "POST",
        data: {Telefonos: Telefono},
        success: function(){
          $('#Tel_Sel').append($('<option>', {value:Telefono, text:Telefono}));
          var num = $('#Tel_Sel option').length;
          $('#Tel_Sel').prop('selectedIndex', num-1)
          $('#Tel_Sel option').prop('selected', true);
        }
      });
    });
      $("#Eliminar").click(function(){
        Telefono = $("#Tel_Sel").val();
        console.log(Telefono);
      $.ajax({
        method: "POST",
        data: {Telefonos: Telefono},
        success: function(){
          $("#Tel_Sel").find('option:selected').remove()
          var num = $('#Tel_Sel option').length;
          $('#Tel_Sel').prop('selectedIndex', num-1)
          }
        });
      });
    
      
    </script>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../js/script.js"></script>
  </body>
</html>
