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
                <li><a class="dropdown-item" href="../Logout.php">Salir</a></li>
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
                    <a href="Jefe/Altas/Alta_Usuario.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Crear Usuarios</span>
                    </a>
                    <a href="Jefe/Mostrar/Mostrar_Usuario.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Lista de Usuarios</span>
                    </a>
                    <a href="Jefe/Mostrar/Aceptar_Usuario.php" class="nav-link px-3">
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
                          <a href="Jefe/Altas/Alta_Producto.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Alta Productos</span>
                          </a>
                          <a href="Jefe/Mostrar/Mostrar_Producto.php" class="nav-link px-3">
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
                          <a href="Jefe/Altas/Alta_Paquetes.php" class="nav-link px-3">
                            <span class="me-2"></span>
                            <span>Alta Paquetes</span>
                          </a>
                          <a href="Jefe/Mostrar/Mostrar_Paquetes.php" class="nav-link px-3">
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
                    <a href="Jefe/Altas/Alta_Proveedor.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Agregar Proveedores</span>
                    </a>
                    <a href="Jefe/Mostrar/Mostrar_Proveedor.php" class="nav-link px-3">
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
                <span>Pedidos</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="Stock">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="Jefe/Mostrar/Mostrar_Pedido.php" class="nav-link px-3">
                      <span class="me-2"></span>
                      <span>Ver Pedido</span>
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