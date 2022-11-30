<?php 
Include('conexion.php');
session_start();?>

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
    <!-- CSS -->
    <link
      rel="stylesheet"

    />
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
        <li class="nav-item">
 
        </li>
      </ul>
      <!-- Left links -->
      
      <?php include("Logeado.php"); ?>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
</header>
<div class="container">
  <main>
    <br>
    <?php 
    if(sizeof($_SESSION['User']['Compra']['Producto']) != 0){?> 
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Tu carrito</span>
          <span class="badge bg-primary rounded-pill"><?php echo count($_SESSION['User']['Compra']['Producto']); ?></span>
        </h4>
        <ul class="list-group mb-3">
        <?php 

        $Total = 0;
        $i = 0;
        foreach ($_SESSION['User']['Compra']['Producto'] as $Producto => $Prod) {
          
          $sql = "SELECT * from producto where ID_Producto = $Prod";
          
          $query = mysqli_query($conexion, $sql);
          
          while($row=mysqli_fetch_array($query)){    
                
      
            if($row['Descuento'] > 0){
            $Total += ($row['Precio']-(($row['Precio']*$row['Descuento'])/100))*$_SESSION['User']['Compra']['Cantidad_Producto'][$i];
            } else{
              $Total += $row['Precio']*$_SESSION['User']['Compra']['Cantidad_Producto'][$i];
            }
        ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $row['Nombre']?></h6>
              <span>$<?php if($row['Descuento'] > 0){
                echo ($row['Precio'] - ($row['Precio']*$row['Descuento'])/100); ?>
              </span><?php }else {  ?>
              <?php echo  $row['Precio']; ?>
              </span>
              <?php } ?>
              
            </div>

              <span class="text-muted m-auto ">$<?php 
              if($row['Descuento'] > 0){
                echo ($row['Precio'] - ($row['Precio']*$row['Descuento'])/100) *$_SESSION['User']['Compra']['Cantidad_Producto'][$i]; ?>
              </span><?php }else {  ?>
              <?php echo  $row['Precio']*$_SESSION['User']['Compra']['Cantidad_Producto'][$i]; ?>
              </span>
              <?php } ?>
            <div>
            <a href="Eliminar_carrito.php?id=<?php echo $i?>&id_producto=<?php echo $row['ID_Producto']?>" class="btn btn-danger" style="max-width: 5rem"><i class="fas fa-times"></i></a>
            </div>
          </li>

          <?php
          $i++;
        }
        }
          
            ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (Pesos Uruguayos)</span>
            <strong name="Total">$<?php echo $Total;?></strong>
          </li>
        </ul>
      
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Información para compra</h4>
        <form class="form-control border border-2" action="Checkout.php?total=<?php echo $Total;?>" method="post">
          <div class="row g-3">
            <div class="col-sm-6 col-lg-6">
              <label for="firstName" class="form-label">Primer Nombre</label>
              <input type="text" class="form-control" name="Primer_Nombre" id="firstName" placeholder="" value="" required>
            </div>

            <div class="col-sm-6 col-lg-6">
              <label for="lastName" class="form-label">Segundo Nombre (opcional)</label>
              <input type="text" class="form-control" name="Segundo_Nombre" id="lastName" placeholder="" value="">
            </div>

            <div class="col-sm-6 col-lg-6">
              <label for="firstName" class="form-label">Primer Apellido</label>
              <input type="text" class="form-control" name="Primer_Apellido" id="firstName" placeholder="" value="" required>
            </div>

            <div class="col-sm-6 col-lg-6">
              <label for="lastName" class="form-label">Segundo Apellido</label>
              <input type="text" class="form-control" name="Segundo_Apellido" id="lastName" placeholder="" value="">
            </div>

            <div class="col-6">
              <label for="email" class="form-label">Telefono de Contacto <span class="text-muted"></span></label>
              <input type="tel" class="form-control" name="Tel" id="tel" placeholder="096494494">

            </div>

            <div class="col-6">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" class="form-control" name="Direccion" id="address" placeholder="1234 Main St" required>
            </div>

          <hr class="my-4">

          <h4 class="mb-3">Pago</h4>


          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nombre de la Tarjeta</label>
              <input type="text" name="Nom_Tarjeta" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Nombre completo mostrado en la tarjeta</small>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Número de tarjeta</label>
              <input type="text" name="Num_Tarjeta" minlength=16 maxlength=16 class="form-control" id="cc-number" placeholder="" required>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="month" min="2022-11" name="Expire" class="form-control" id="cc-expiration" placeholder="" required>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" name="CVV" maxlength=3 class="form-control" id="cc-cvv" placeholder="" required>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar con el Pago</button>
        </form>
      </div>
    

  <?php } 
        else{
          ?> 
          <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Tu carrito está vacio</span>
            <span class="badge bg-primary rounded-pill">Agrega algun item!</span>
          </h4> <?php
        }
           ?>
  </div>
  </main>
</div>
<?php 
    if(count($_SESSION['User']['Compra']['Producto']) != 0 ){?> 
  <footer class="mt-5">
    <?php } else { ?> <footer class="mt-5 fixed-bottom"> <?php } ?>
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
