<?php session_start();

  if(count($_SESSION) != 0){  
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
      background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
      height: 500px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Natalia Viera Seguridad Corporal</h1>
          <h4 class="mb-3">La mejor marca de Seguridad</h4>
          <a class="btn btn-outline-light btn-lg" href="#!" role="button"
          >¡Compra!</a
          >
        </div>
      </div>
    </div>
  </div>
  <main class="mt-5">
      <div class="container p-2">
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
                  <select name="Categorias" id="Categorias" name="Categoria" class="form-control">
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
                           
                                $sql="SELECT * FROM `producto` WHERE Nombre like '%$busqueda%'";
                                
                                $query=mysqli_query($conexion,$sql);

                                $row=mysqli_fetch_array($query);

                                while($row=mysqli_fetch_array($query)){

                                 ?>  
            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="<?php echo $row['IMG']?>" style=width="300" height="300" class="img"/>
                  <a href='Producto.php?id=<?php echo $row['ID_Producto']?>'>
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['Nombre']?></h4>
                  <p class="card-text text-black">$<?php echo $row['Precio']?></p>
                  <div class="d-flex justify-content-center">
                    <form action="Aniadir_carrito.php?id=<?php echo $row['ID_Producto']?>" method="post">
                    
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" name="Cantidad_Producto" value="1" style="max-width: 3rem" />
                    <button type="submit" class="btn btn-outline-primary flex-shrink-0">
                        <i class="bi-cart-fill me-1"></i>
                        ¡Añadir al Carrito!
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } } else{

  $sql="SELECT * FROM `producto`";
  
  $query=mysqli_query($conexion,$sql);

  $row=mysqli_fetch_array($query);

  while($row=mysqli_fetch_array($query)){

   ?>  
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="<?php echo $row['IMG']?>" style=width="300" height="300" class="img"/>
            <a href='Producto.php?id=<?php echo $row['ID_Producto']?>'>
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
            </div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['Nombre']?></h4>
            <p class="card-text text-black">$<?php echo $row['Precio']?></p>
            <div class="d-flex justify-content-center">
            <form action="Aniadir_carrito.php?id=<?php echo $row['ID_Producto']?>" method="post">

            <input class="form-control text-center me-3" id="inputQuantity" type="num" name="Cantidad_Producto" value="1" style="max-width: 3rem" />
            <button type="submit" class="btn btn-outline-primary flex-shrink-0">
            <i class="bi-cart-fill me-1"></i>
            ¡Añadir al Carrito!
            </button>
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
        <div class="container p-4 pb-0">
          <!-- Section: Form -->
          <section class="">
            <form action="">
              <!--Grid row-->
              <div class="row d-flex justify-content-center">
                <!--Grid column-->
                <div class="col-auto">
                  <p class="pt-2">
                    <strong>¡Enterate de todo lo nuevo!</strong>
                  </p>
                </div>
                <!--Grid column-->
      
                <!--Grid column-->
                <div class="col-md-5 col-12">
                  <!-- Email input -->
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="form5Example29" class="form-control" />
                    <label class="form-label" for="form5Example29">Correo</label>
                  </div>
                </div>
                <!--Grid column-->
      
                <!--Grid column-->
                <div class="col-auto">
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-outline-light mb-4">
                    Suscribirse
                  </button>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </form>
          </section>
          <!-- Section: Form -->
        </div>
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