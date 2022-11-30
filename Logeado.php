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
      
      Hola! <?php echo $_SESSION['User']['Email']; ?>
      <div class="d-flex m-autoalign-items-center">
        <a type="button" href="Review.php" class="btn px-3 bg-white me-2"><i class="fas fa-shopping-cart"></i></i>
        </a>
        <a type="button" href="Logout.php" class="btn btn-primary bg-white text-black me-3">
        <i class="fas fa-sign-out-alt"></i>
        </a>
        
      </div>
    <?php
    }
    ?>