<?php session_start();

  if(sizeof($_SESSION) != 0){  
  if($_SESSION['User']['Tipo_Usuario'] === 'Jefe'){
    header('Location: Dashboards/dashboard_jefe.php');
  } else if($_SESSION['User']['Tipo_Usuario'] === 'Comprador'){
    header('Location: Dashboards/dashboard_comprador.php');
  } else if($_SESSION['User']['Tipo_Usuario'] === 'Vendedor'){
    header('Location: Dashboards/dashboard_vendedor.php');
  } 
}


?>
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
  <?php 
    if(count($_SESSION) == 0){ ?>
      <div class="d-flex align-items-center">
        <a type="button" href="Login.php" class="btn btn-primary px-3 me-2">
          Login
        </a>
        <a type="button" href="Register.php" class="btn btn-primary bg-white text-black me-3">
          ¡Registrate!
        </a>
        
      </div>
    <?php } else{
      ?>
      <div class="d-flex align-items-center">
        <a type="button" href="Review.php" class="btn px-3 bg-white me-2"><i class="fas fa-shopping-cart"></i></i>
        </a>
        <a type="button" href="Logout.php" class="btn btn-primary bg-white text-black me-3">
        <i class="fas fa-sign-out-alt"></i>
        </a>
        
      </div>
    <?php
    }
    ?>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
</header>
<!-- Navbar -->

<div
    class="p-5 text-center bg-image shadow-1-strong"
    style="
      background-image: url('assets/trabajadores.jpg');
      height: 500px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Natalia Viera Seguridad Corporal</h1>
          <h4 class="mb-3">La mejor marca de Seguridad</h4>
          <a class="btn btn-outline-light btn-lg" href="#Contenedor" role="button"
          >¡Compra!</a
          >
        </div>
      </div>
    </div>
  </div>
  <main class="mt-5">
      <div class="container p-2" id="Contenedor">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarTogglerDemo03"
              aria-controls="navbarTogglerDemo03"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <form class="d-flex input-group w-auto" method="get" action="index.php"> 
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
              <li class="nav-item dropdown">
                  <select name="Categorias" id="Categorias" class="form-control">
                  <option value="Categorias">Categorias</option>
                  <?php 
                  
                  include("conexion.php");
                  $query = "SELECT * FROM `categoria`";

                  $categoria = mysqli_query($conexion, $query);

                  $options = "";

                  while($row = mysqli_fetch_array($categoria))
                  {
                      $options .= "<option value='$row[0]'>$row[1]</option>";
                  }

                  ?>
                  <?php echo $options;?>
                  </select>
                </li>
              </ul>
              
                <input
                  type="search"
                  class="form-control"
                  placeholder="Busque..."
                  aria-label="Search"
                  name="Busqueda"
                />
                <button
                  class="btn btn-primary"
                  type="submit"
                  data-mdb-ripple-color="dark"
                  name="Busqueda_Submit"
                >
                <i class="fas fa-search"></i>
                </button>
              </form>
              
            </div>
            
          </div>
        </nav>
        
        <section class="text-center mb-4">
          <div class="row">
                              <?php

                              if(isset($_GET['Busqueda_Submit'])){
                                
                                $busqueda = $_GET['Busqueda'];
                                
                                $categoria = $_GET['Categorias'];
                                if($categoria == 'Categorias'){
                                $sql="SELECT * FROM `producto` WHERE Nombre like '%$busqueda%'";
                                } else{
                                  $sql="SELECT * FROM `producto` INNER JOIN `categoria_producto` ON `producto`.ID_Producto = `categoria_producto`.ID_Producto WHERE Nombre like '%$busqueda%' AND ID_Categoria like '%$categoria%'";
                                }

                                $query=mysqli_query($conexion,$sql);

                                while($row=mysqli_fetch_array($query)){

                                 ?>  
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
            
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <?php if($row['Descuento'] > 0){ ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <?php } ?>
            <img src="<?php echo $row['IMG']?>" style=width="300" height="300" class="img"/>
            <a href='Producto.php?id=<?php echo $row['ID_Producto']?>'>
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
            </div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['Nombre']?></h4>
            <?php if($row['Descuento'] > 0){ ?>
                            <span class="text-muted text-decoration-line-through">$<?php echo $row['Precio']?></span>
                            $<?php echo $row['Precio'] - $row['Precio']*$row['Descuento']/100;; } else{ ?>
                            $<?php echo $row['Precio'];}?>
            <div class="d-flex justify-content-center">
          
            <form action="Aniadir_carrito.php?id=<?php echo $row['ID_Producto']?>" class="form-group justify-content-center" method="post">
            
            <?php if($row['Cantidad_Stock'] > 0){ ?>
            <div class="row">
            <div class="col">
            <br>
            <input class="form-control text-center left me-3" id="inputQuantity" type="num" name="Cantidad_Producto" value="1" style="max-width: 3rem" />
            <br>
            </div>
            <div class="col-8">
            <br>
            <button type="submit" class="btn btn-outline-primary flex-shrink-0">
            <i class="bi-cart-fill me-1"></i>
            ¡Añadir al Carrito!
            </button>
            </div>
            </div>
            <?php } else {?>
              <br>
              <button type="submit" class="btn btn-outline-danger flex-shrink-0" disabled>
            <i class="bi-cart-fill me-1"></i>
            Sin stock
            </button>
            <?php } ?>
            </form>
            </div>
            </div>
            </div>
            </div>
            <?php } } else{

  $sql="SELECT * FROM `producto`";
  
  $query=mysqli_query($conexion,$sql);


  while($row=mysqli_fetch_array($query)){

   ?>  
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
            
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <?php if($row['Descuento'] > 0){ ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <?php } ?>
            <img src="<?php echo $row['IMG']?>" style=width="300" height="300" class="img"/>
            <a href='Producto.php?id=<?php echo $row['ID_Producto']?>'>
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
            </div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['Nombre']?></h4>
            <?php if($row['Descuento'] > 0){ ?>
                            <span class="text-muted text-decoration-line-through">$<?php echo $row['Precio']?></span>
                            $<?php echo $row['Precio'] - $row['Precio']*$row['Descuento']/100;; } else{ ?>
                            $<?php echo $row['Precio'];}?>
            <div class="d-flex justify-content-center">
          
            <form action="Aniadir_carrito.php?id=<?php echo $row['ID_Producto']?>" class="form-group justify-content-center" method="post">
            
            <?php if($row['Cantidad_Stock'] > 0){ ?>
            <div class="row">
            <div class="col">
            <input class="form-control text-center left me-3" id="inputQuantity" type="num" name="Cantidad_Producto" value="1" style="max-width: 3rem" />
            <br>
            </div>
            <div class="col-8">
            <button type="submit" class="btn btn-outline-primary flex-shrink-0">
            <i class="bi-cart-fill me-1"></i>
            ¡Añadir al Carrito!
            </button>
            </div>
            </div>
            <?php } else {?>
              <br>
              <button type="submit" class="btn btn-outline-danger flex-shrink-0" disabled>
            <i class="bi-cart-fill me-1"></i>
            Sin stock
            </button>
            <?php } ?>
            </form>
            </div>
            </div>
            </div>
            </div>

         <?php  } } ?>
          </div>
          
        </section>
        
      </div>
    </main>
    
    <footer class="mt-5">
      <footer class="bg-primary text-center text-white">
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright:
          <a class="text-white" href="https://NataliaVieraSeguridadCorporal.com/">Axis</a>
        </div>
        <!-- Copyright -->
      </footer>
    </footer>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>