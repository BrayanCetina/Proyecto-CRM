<?php

require_once('lib/links.php');
libnivel3();

require_once('controllers/ciclocientesController.php');
$Ciclo = new cicloclientesController();
require_once('models/Ciclocientes.php');
$react = $Ciclo->read();

$dataPoints = array( 
	array("label"=>"Reactivación", "y"=>react),
	array("label"=>"Retención", "y"=>react),
	array("label"=>"Crecimiento", "y"=>1500),
	array("label"=>"Conversión", "y"=>295),
	array("label"=>"Adquisición", "y"=>335)
)
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CRM - Ventas</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
      theme: "light2",
      animationEnabled: true,
      title: {
        text: ""
        },
        element: 'area-example',
      data: [{
        type: "funnel",
        indexLabel: "{label} - {y}",
        yValueFormatString: "#,##0",
        showInLegend: true,
        legendText: "{label}",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
     
    }
    </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CRM GYM<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Ventas</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="ventas.html">Productos</a>
            <a class="collapse-item" href="ventasPaquetes.html">Paquetes</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Marketing</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="clientes.html">
          <i class="fas fa-fw fa-user"></i>
          <span>Clientes</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

            <div class="topbar-divider d-none d-sm-block"></div>

            
             <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Glendy Cruz</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>


          </ul>

        </nav>
        <!-- End of Topbar -->
         
<!--                       AQUI EL DIV                        -->
        <!-- INICIO -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ventas</h1>
          <!-- DataTales Example -->
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!--Aqui comienza lo que se quiera poner -->
                  <div class="col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div id="chartContainer" style="height: 360px; width: 100%;"></div>
                  </table>
                  </div>
              </div>
            </div>
          </div>         <!-- DataTales Example -->
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de datos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!--Aqui comienza lo que se quiera poner -->
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Telefono</th>
                      <th>Fase</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>@gmail</td>
                      <td>99</td>
                      <th>Crecimiento</th>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Adquisición</th>
                      
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Crecimiento</th>
                      
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Conversión</th>
                      
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Retención</th>
                      
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Reactivación</th>
                     
                    </tr>
                    <tr>
                      <td>Herrod Chandler</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Crecimiento</th>
                      
                    </tr>
                    <tr>
                      <td>Rhona Davidson</td>
                      <td>@gmail</td>
                      <td>99</td>
                     
                      <th>Retención</th>
                      
                    </tr>
                    <tr>
                      <td>Colleen Hurst</td>
                      <td>@gmail</td>
                      <td>99</td>
                     
                      <th>Reactivación</th>
                      
                    </tr>
                    <tr>
                      <td>Sonya Frost</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Crecimiento</th>
                      
                    </tr>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Adquisición</th>
                      
                    </tr>
                    <tr>
                      <td>Quinn Flynn</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Retención</th>
                      
                    </tr>
                    <tr>
                      <td>Charde Marshall</td>
                      <td>@gmail</td>
                      <td>99</td>
                      
                      <th>Conversión</th>
                      
                    </tr>
                  </tbody>
                  </table>
                </div>
              
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; CRM GYM 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que quieres cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
       
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 
</body>

</html>