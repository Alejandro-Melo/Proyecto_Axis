<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Producto</title>
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
        <a href="" class="text-white px-3 me-2">Contacto</a>
        <a type="button" href="Login.php" class="btn btn-primary px-3 me-2">
          Login
        </a>
        <a type="button" href="Register.php" class="btn btn-primary bg-white text-black me-3">
          ¡Registrate!
        </a>
        
      </div>
    <?php } else{
      ?>
      <div class="d-flex m-autoalign-items-center">
        <a href="" class="text-white px-3 me-2">Contacto</a>
        <a type="button" href="Review.php" class="btn px-3 bg-white me-2"><i class="fas fa-shopping-cart"></i></i>
        </a>
        <a type="button" href="Logout.php" class="btn btn-primary bg-white text-black me-3">
        <i class="fas fa-sign-out-alt"></i>
        </a>
        
      </div>
    <?php
    }
    ?>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
</header>
<!-- Navbar -->

<?php 

    include('conexion.php');

    $id=$_GET['id'];

    $sql = "SELECT * from Producto Where ID_Producto = $id";

    $query=mysqli_query($conexion,$sql);

    if(mysqli_num_rows($query) === 0){
      header("Location: index.php");
    }
    while($row=mysqli_fetch_array($query)){
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $row['IMG']?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">Stock disponible: <?php echo $row['Cantidad_Stock']; ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $row['Nombre']; ?></h1>
                <div class="fs-5 mb-5">
                <?php if($row['Descuento'] > 0){ ?>
                            <span class="text-muted text-decoration-line-through">$<?php echo $row['Precio']?></span>
                            $<?php echo $row['Precio'] - $row['Precio']*$row['Descuento']/100; } else{ ?>
                            $<?php echo $row['Precio'];}?>
                </div>
                <p class="lead"><?php echo $row['Descripcion']; ?></p>
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
    <?php } ?>
</section>

<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
            $sql = "SELECT * from Producto WHERE NOT ID_Producto = $id LIMIT 4";
            $query=mysqli_query($conexion,$sql);
            while($row=mysqli_fetch_array($query)){ 
              
            ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <?php if($row['Descuento'] > 0){ ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <?php } ?>
                    <!-- Product image-->
                    <img class="card-img-top" src="<?php echo $row['IMG'];?>" alt="..." />
                    <a href='Producto.php?id=<?php echo $row['ID_Producto']?>'>
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.0);"></div>
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['Nombre']?></h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div class>
                            <!-- Product price-->
                            <?php if($row['Descuento'] > 0){ ?>
                            <span class="text-muted text-decoration-line-through">$<?php echo $row['Precio']?></span>
                            <?php echo $row['Precio'] - $row['Precio']*$row['Descuento']/100;; } else{ ?>
                            <?php echo $row['Precio'];}?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="Aniadir_carrito.php?id=<?php echo $id ?>">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>  
    </div>
</section>
<!-- Footer-->






<div
    class="p-5 text-center bg-image shadow-1-strong"
    style="
      background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
      height: 500px;
    "
  >
    
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
          <a class="text-white" href="https://NataliaVieraSeguridadCorporal.com/">Natalia Viera</a>
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
