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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#"
          ></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2 m-auto"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interfaz
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-house"></i></span>
                <span>Home</span>
              </a>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-person-fill"></i></span>
                <span>Usuarios</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Crear Usuarios</span>
                    </a>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Lista de Usuarios</span>
                    </a>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Aceptar Usuarios</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#products"
              >
                <span class="me-2"><i class="bi bi-bag"></i></span>
                <span>Productos</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="products">
                <ul class="navbar-nav ps-3">
                  <li>
                    <li>
                      <a
                        class="nav-link px-3 sidebar-link"
                        data-bs-toggle="collapse"
                        href="#productos_abm"
                      >
                        <span class="me-2"></i></span>
                        <span>Productos</span>
                        <span class="ms-auto">
                          <span class="right-icon">
                            <i class="bi bi-chevron-down"></i>
                          </span>
                        </span>
                      </a>
                      <div class="collapse" id="productos_abm">
                        <ul class="navbar-nav ps-3">
                          <a href="Altas_Proveedor.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Alta Productos</span>
                          </a>
                          <a href="Mostrar_Productos.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Listado Productos</span>
                          </a>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <a
                        class="nav-link px-3 sidebar-link"
                        data-bs-toggle="collapse"
                        href="#paquetes_abm"
                      >
                        <span class="me-2"></span>
                        <span>Paquetes</span>
                        <span class="ms-auto">
                          <span class="right-icon">
                            <i class="bi bi-chevron-down"></i>
                          </span>
                        </span>
                      </a>
                      <div class="collapse" id="paquetes_abm">
                        <ul class="navbar-nav ps-3">
                          <a href="Alta_Paquetes.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Alta Paquetes</span>
                          </a>
                          <a href="Mostrar_Paquetes.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Listado Paquetes</span>
                          </a>
                        </ul>
                      </div>
                    </li>
                    
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#Proveedores"
              >
                <span class="me-2"><i class="bi bi-truck"></i></i></i></span>
                <span>Proveedores</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Proveedores">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="Alta_Proveedores.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Agregar Proveedores</span>
                    </a>
                    <a href="Mostrar_Proveedor.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Mostrar Proveedores</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#Stock"
              >
                <span class="me-2"><i class="bi bi-file-earmark-bar-graph"></i></i></span>
                <span>Stock</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Stock">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="Ver_Stock.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Ver Stock</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>

          </ul>
          </ul>
          
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1>Crear Usuarios</h1>
            <form class="row g-3 m-1" method="post">
                <div class="row">
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="Direccion" id="inputtext4" required>
                    </div>
                    <div class="col-md-3 m-1">
                        <label for="inputtext4" class="form-label">Nombre de Empresa</label>
                        <input type="text" class="form-control" name="Nombre" id="inputtext4" required>
                    </div>
                  
                </div>
                <div class="row">
                  <div class="col-auto m-2">
                    <input type="submit" value="Crear" name="submit" class="btn btn-primary" required>
                  </div>
                  <?php
      include_once("../../conexion.php");
      include("SQL/Alta_Proveedor.php");
      if(isset($_POST['submit'])){
        if(isset($_POST['Direccion']) && isset($_POST['Nombre'])){
          $Direccion = $_POST['Direccion'];
          $Nombre = $_POST['Nombre'];
          Alta_Proveedor($Direccion, $Nombre, $conexion);
        }
        else{
          echo "<h1>No ha ingresado uno de los datos</h1>";
        }


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