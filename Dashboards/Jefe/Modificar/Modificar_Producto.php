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
    <?php include("../Componente/Sidebar.php");
          include("../../../conexion.php");
          include("../SQL/Alta_Producto.php");

    ?>

    <?php 
     $ID_Producto = $_GET['id'];
     
     $sql = "SELECT * from producto where ID_Producto = '$ID_Producto'";
     $query = mysqli_query($conexion, $sql);
     while($row=mysqli_fetch_array($query)){
    ?>
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Producto</h1>
            <form class="row g-3 m-1" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" value="<?php echo $row['Nombre']?>" id="inputEmail4">
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="Precio" value="<?php echo $row['Precio']?>" id="inputEmail4">
                    </div>
                    <div class="col-md-3">
                        <label for="inputcontra4" class="form-label">Proveedor</label>
                        <select class="form-select" name="Proveedor" id="Proveedor">
                        
                        <?php 
                           
                                $query = "SELECT * FROM `proveedor`";

                                $proveedores = mysqli_query($conexion, $query);

                                $options = "";

                                while($row = mysqli_fetch_array($proveedores))
                                {
                                    $options .= "<option value='$row[0]'>$row[2]</option>";
                                }

                                ?>
                            <?php echo $options;?>
                        </select>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                        <label for="exampleFormControlTextarea1">Descripción</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $row['Descripcion']?>" name="Descripcion"></textarea>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <label for="inputEmail4" class="form-label">Unidades Inciales</label>
                        <input type="number" class="form-control" name="Cant_stock" value="<?php echo $row['Cantidad_Stock']?>" id="inputEmail4">
                    </div>
                    <div class="col-md-3">
                        <br>
                        <label class="form-label" for="customFile">Ingrese imagenes del producto</label>
                        <input type="file" class="form-control" name="files[]" id="files" multiple/>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="form-label">Categoria</label>
                      <select name="Categoria" id="Categoria" class="form-control"> 
                        <?php $query = "SELECT * FROM `categoria`";

                          $categoria = mysqli_query($conexion, $query);

                          $options = "";

                          while($row = mysqli_fetch_array($categoria))
                          {
                              $options .= "<option value='$row[0]'>$row[1]</option>";
                          }

                          ?>
                          <?php echo $options;?>
                      </select>
                    </div>
                    <div class="col-md-3" id="Talle">
                      
                    </div>
                    
                  </div>
                  <div class="col-auto m-1">
                    <br>
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary">
                  </div>

                  <?php
     

      if(isset($_POST['submit'])){
        if(isset($_POST['Nombre']) && isset($_POST['Precio']) && isset($_POST['Descripcion']) && isset($_POST['Proveedor']) && isset($_POST['Cant_stock']) && isset($_POST['Categoria'])){
            
            $Nombre = $_POST['Nombre'];
            
            if($_POST['Precio'] > 0){
                $Precio = $_POST['Precio'];
            } else{
              echo "El valor ingresado para Precio es invalido.";
            }

            $Descripcion = $_POST['Descripcion'];

            if($_POST['Cant_stock'] > 0){
                $Cant_stock = $_POST['Cant_stock'];
            } else{
              echo "El valor para Cantidad de Stock ingresado es invalido.";
            }
            
            $categoria = $_POST['Categoria'];

            $Proveedor = $_POST['Proveedor'];

            // Configure upload directory and allowed file types
            $upload_dir = 'uploads';
            $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
            
            // Define maxsize for files i.e 2MB
            $maxsize = 100 * 1024 * 1024;
        
            // Checks if user sent an empty form
            if(!empty(array_filter($_FILES['files']['name']))) {
        
                // Loop through each file in files[] array
                foreach ($_FILES['files']['tmp_name'] as $key => $value) {
                    
                    $file_tmpname = $_FILES['files']['tmp_name'][$key];
                    $file_name = $_FILES['files']['name'][$key];
                    $file_size = $_FILES['files']['size'][$key];
                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        
                    // Set upload file path
                    $filepath = $upload_dir."/".$file_name;
        
                    // Check file type is allowed or not
                    if(in_array(strtolower($file_ext), $allowed_types)) {
        
                        // Verify file size - 10MB max
                        if ($file_size < $maxsize){        
                            
                        // If file with name already exist then append time in
                        // front of name of the file to avoid overwriting of file
                        if(file_exists("../../../".$filepath)) {
                            $filepath = $upload_dir."/".time().$file_name;
                            
                            if( move_uploaded_file($file_tmpname, "../../../".$filepath)) {
                                echo "{$file_name} successfully uploaded <br />";
                            }
                            else {                    
                                echo "Error subiendo {$file_name} <br />";
                            }
                        }
                        else {
                        
                            if(move_uploaded_file($file_tmpname, "../../../".$filepath)){
                                echo "{$file_name} successfully uploaded <br />";
                            }
                            else {                    
                                echo "Error subiendo {$file_name} <br />";
                            }
                        }
                    } else {
                      echo "Excedió el máximo";
                    }
                  } else {
                        
                        // If file extension not valid
                        echo "Error uploading {$file_name} ";
                        echo "({$file_ext} file type is not allowed)<br / >";
                    }
                    echo $filepath;
                    Alta_Producto($Nombre, $Precio, $Descripcion, $Proveedor, $Cant_stock, $categoria, $filepath, $conexion);
                }

            
          }
          }  
            else {
            echo "<h1>No ha ingresado uno de los datos</h1>";
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
<script>
    $("#Categoria").change(()=>{
          if($("#Categoria").val() === "Zapatos"){
              $("#Talle").html("<label class='form-label' for='Talle'>Talle</label> <select name='select' class='form-control' multiple><option value='39'>39</option><option value='40'selected>40</option><option value='41'>41</option><option value='42'>42</option><option value='43'>43</option><option value='44'>44</option><option value='45'>45</option></select>");
          } else if($("#Categoria").val() === "Ropa"){
            $("#Talle").html("<label class='form-label' for='Talle'>Talle</label> <select name='select' class='form-control' multiple><option value='S'>S</option><option value='M'selected>M</option><option value='L'>L</option><option value='XL'>XL</option><option value='XXL'>XXL</option></select>");
          } else{
            $("#Talle").html("");
          }
          
        })
    </script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../../../js/jquery.dataTables.min.js"></script>
    <script src="../../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../js/script.js"></script>
  </body>
</html>
