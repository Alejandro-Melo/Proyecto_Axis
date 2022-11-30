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
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Producto</h1>
            <form class="row g-3 m-1" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" id="inputEmail4">
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="Precio" id="inputEmail4">
                    </div>

                    <div class="form-group col-lg-4 col-sm-12">
                        <label for="exampleFormControlTextarea1">Descripción</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Descripcion"></textarea>
                    </div>
                  </div>
                  
                    <div class="row">
                      <div class="col-md-2 m-1">
                          <label for="inputtext4" class="form-label">Productos</label>
                          <input type="number" class="form-control" name="Producto" id="Producto">
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
                        <label for="Productos" class="form-label">Productos</label>
                        <select class="form-control" name="Productos[]" id="Productos" multiple>
                        </select>
                    </div>  
                    </div>
                    </div>
                  </div>
                  <div class="col-auto m-1">
                    <br>
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary">
                  </div>

                  <?php
        include('../SQL/Alta_Paquete.php');

      if(isset($_POST['submit'])){
        if(isset($_POST['Nombre']) && isset($_POST['Precio']) && isset($_POST['Descripcion']) && isset($_POST['Proveedor']) && isset($_POST['Cant_stock']) && isset($_POST['Categoria'])){
            
            $Nombre = $_POST['Nombre'];
            
            if($_POST['Precio'] > 0){
                $Precio = $_POST['Precio'];
            } else{
              echo "El valor ingresado para Precio es invalido.";
            }

            $Descripcion = $_POST['Descripcion'];

            $Productos = $_POST['Productos'];
           

            Alta_Paquete($Nombre, $Precio, $Descripcion, $conexion);

            $last_id = mysqli_insert_id($conexion);

            foreach ($Productos as $Producto => $Prod) {
                Asignar_Paquete($Prod, $last_id, $conexion);
            }
        

            
          }
          }  

         
        

    ?>  
                </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </main>
<script src="../../../js/jquery-3.5.1.js"></script>
<script type="text/javascript">
    
    var Productos = [];
      $("#Agregar").click(function(){
        let Producto = $("#Producto").val();
      $.ajax({
        method: "POST",
        data: {Productos: Producto},
        success: function(){
          $('#Productos').append($('<option>', {value:Producto, text:Producto}));
          var num = $('#Productos option').length;
          $('#Productos').prop('selectedIndex', num-1)
          $('#Productos option').prop('selected', true);
        }
      });
    });
      $("#Eliminar").click(function(){
        Producto = $("#Productos").val();
        console.log(Producto);
      $.ajax({
        method: "POST",
        data: {Productos: Producto},
        success: function(){
          $("#Productos").find('option:selected').remove()
          var num = $('#Productos option').length;
          $('#Productos').prop('selectedIndex', num-1)
          }
        });
      });
    
      
    </script>
        
        </script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../js/script.js"></script>
  </body>
</html>