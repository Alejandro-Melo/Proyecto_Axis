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
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Verificar Clientes</h1>
            <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-light table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo de Usuario</th>
                                        <th>Email</th>
                                        <th>Hora de Creación</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            include("../../../conexion.php");
                                        
                                            $sql="SELECT * FROM Usuario WHERE Activo = 0 AND Tipo_usuario = 'Cliente'";
                                            $query=mysqli_query($conexion,$sql);

                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['ID_U']?></th>
                                                <th><?php  echo $row['Tipo_usuario']?></th>
                                                <th><?php  echo $row['Email']?></th>
                                                <th><?php  echo $row['Date_creation']?></th> 
                                                <th><a href="../SQL/Habilitar_Cliente.php?id=<?php echo $row['ID_U']?>" class="btn btn-dark">Aceptar</a></th>
                                                <th><a href="../SQL/Eliminar_Usuario.php?id=<?php echo $row['ID_U']?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
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
