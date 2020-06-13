<?php

$dataPoints = array(
  array("label" => "Conocimiento", "y" => 2130),
  array("label" => "Consideración", "y" => 1043),
  array("label" => "Preferencia", "y" => 501),
  array("label" => "Compra", "y" => 295),
  array("label" => "Recompra ", "y" => 135)
)

?>

<?php
require_once('lib/links.php');
libnivel3();
require_once('controllers/alumnosController.php');
$Alumnos = new alumnosController();
require_once('models/Alumnos.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  getMeta("Alta de Alumnos"); //hacemos el llamado de las el titulo y las referencias
  estilosPaginas(); //le damos estilo a la tabla, los colores y el fondo
  ?>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        theme: "white",
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


  <script type="text/javascript">
    var ActualMatricula;
    var ActualNombre;
    $(document).ready(function() {

      ///////DATABLES ////////
      $('#tableAlumnos').DataTable();
      ///////GENERACION DEL CRUD EN LA TABLA////// 
      $('[data-toggle="tooltip"]').tooltip();
      var actions = $("table td:last-child").html();

      // Append table with add row form on add new button click
      $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:first-child").index();
        var row = '<tr>' +
          '<td><input type="text" class="form-control" name="inputMatricula" id="inputMatricula" ></td>' +
          '<td><input type="text" class="form-control" name="inputNombre" id="inputNombre"></td>' +
          '<td><input type="text" class="form-control" name="inputEstatus" id="inputEstatus" placeholder="Automatico" readonly "></td>' +
          '<td><input type="text" class="form-control" name="aviso" id="aviso" placeholder="Automatico" readonly "></td>' +
          '<td>' + actions + '</td>' +
          '</tr>';
        $("table").prepend(row);
        $("table tbody tr").eq(index + 0).find(".add , .update, .delete, .update, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
      });
      // Add row on add button click (Agregar base de datos)
      $(document).on("click", ".add", function() {
        /////GUARDAR LOS DATOS/////
        //1. OBTENER LOS VALORES//
        var matricula = document.getElementById("inputMatricula").value; //(JALAR EL VALOR INGRESADO)
        var nombre = document.getElementById("inputNombre").value;
        //2. ENVIAR POR POTS//
        if (matricula != "" || nombre != "") {
          $.post("controllers/alumnosController.php", {
              inputMatricula: matricula,
              inputNombre: nombre,
              buttonCreate: true
            },
            function(data) {
              if (data === "-1") {
                alert("Error al guardar los datos, revisar la matricula");
              } else if (data === "-2") {
                alert("Matricula ya existente: " + matricula)
              } else {
                alert("Registro Guardado con éxito");
                location.reload(true);
              }
            });
        } else {
          alert("Porfavor llene los todo los campos");
        }
      });
      //3. REFRESCAR LOS VALORES///
      var empty = false;
      var input = $(this).parents("tr").find('input[type="text"]');
      input.each(function() {
        if (!$(this).val()) {
          $(this).addClass("error");
          empty = true;
        } else {
          $(this).removeClass("error");
        }
      });
      $(this).parents("tr").find(".error").first().focus();
      if (!empty) {
        input.each(function() {
          $(this).parent("td").html($(this).val());
        });
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").removeAttr("disabled");
        $(".update").removeAttr("enabled");
      }
      // Delete row on delete button click
      $(document).on("click", ".delete", function() {
        var matricula = $(this).parents("tr").find("td:first-child").html();
        $.post("controllers/alumnosController.php", {
            inputMatricula: matricula,
            buttonDelete: true
          },
          function(data) {
            if (data === "-1") {
              alert("Error al guardar los datos, revisar la matricula: " + matricula);
            } else {
              location.reload(true);
            }
          });
      });
    });

    //desactivar grupo 
    $(document).on("click", ".btn-success", function() {
      if (confirm("¿Esta seguro de la Acción?")) {
        var matricula = ($(this).parents("tr").find("td:first-child").html());
        $.post("controllers/alumnosController.php", {
            input_matricula: matricula,
            buttonDesactivar: true
          },
          function(data) {
            if (data === "-1") {
              alert("Error de conexión.");
            } else {
              location.reload(true);
            }
          });
      }
    });
    //fin cambiar estado grupo
    //activar grupo 
    $(document).on("click", ".btn-danger", function() {
      if (confirm("¿Esta seguro de la Acción?")) {
        var matricula = ($(this).parents("tr").find("td:first-child").html());
        $.post("controllers/alumnosController.php", {
            input_matricula: matricula,
            buttonActivar: true
          },
          function(data) {
            if (data === "-1") {
              alert("Error en la conexión.");
            } else {
              location.reload(true);
            }
          });
      }
    });

    // Edit row on edit button click
    $(document).on("click", ".edit", function() {
      //busca
      $(this).parents("tr").find("td:nth-child(1)").each(function() {
        $(this).html('<input type="text" style="text-transform:uppercase" class="form-control" id="Matricula" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="' + $(this).text() + '">');
      });
      //busca 
      $(this).parents("tr").find("td:nth-child(2)").each(function() {
        $(this).html('<input type="text" style="text-transform:uppercase" class="form-control" id="Nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="' + $(this).text() + '">');
      });
      ActualMatricula = document.getElementById("Matricula").value;
      ActualNombre = document.getElementById("Nombre").value;
      $(this).parents("tr").find(".edit, .delete").toggle();
      $(".add-new").attr("disabled", "disabled");
    });
    /*Actualizar*/
    $(document).on("click", ".update", function() {
      var nuevaMatricula = document.getElementById("Matricula").value;
      var nuevoNombre = document.getElementById("Nombre").value;
      if (nuevoNombre != "" && nuevaMatricula != "") {
        if (nuevaMatricula.length < 20) {
          if (confirm("Se modificaran los datos, esta seguro de esto?")) {
            $.post("controllers/alumnosController.php", {
                Matricula: ActualMatricula,
                imputMatriculaNueva: nuevaMatricula,
                inputNombreNuevo: nuevoNombre,
                buttonUpdate: true
              },
              function(data) {
                if (data === "-1") {
                  alert("Error al guardar los datos, revisar la matricula");
                } else if (data === "-2") {
                  alert("Error, Nueva matricula exitente");

                } else {
                  alert("Registro Guardado con éxito");
                  location.reload(true);
                }
              });
          }
        } else {
          alert("Tamaño de la matricula erronea");
        }
      } else {
        location.reload(true);
        alert("llene los campos");
      }
    });
    //fin cambiar estado grupo
  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <?php
  getHeader();
  ?>

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
    </div>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <!--Aqui comienza lo que se quiera poner -->

            <!--TABLA-->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <div class="container">
                <div class="table-wrapper">
                 
                  <table class="table table-bordered" id="tableAlumnos">
                    <thead>
                      <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Estado Actual</th>
                        <th>Mostrar Calificaciones </th>
                        <th>Herramientas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $json = $Alumnos->read();
                      $datosTabla = json_decode($json);

                      foreach ($datosTabla as $row) {
                        echo "<tr>"
                          . "<td>" . $row->{'matricula'} . "</td>"
                          . "<td>" . $row->{'nombre'} . "</td>"
                          . "<td>" . $row->{'status'} . "</td>";
                        if ($row->{'aviso'} === "SIN PENDIENTES") {
                          echo "<td><button class='btn-success'>" . $row->{'aviso'} . "</button></td>";
                        } else {
                          echo "<td><button class='btn-danger' id='btn-activar' onclick='activarPeriodo(this);'>" . $row->{'aviso'} . "</button></td>";
                        }
                        echo "<td><a class = 'add' title = 'Agregar' data-toggle = 'tooltip'><i class = 'material-icons'>&#xE03B;</i></a>"
                          . "<a class = 'edit' title = 'Editar' data-toggle = 'tooltip'><i class = 'material-icons'>&#xE254;</i></a>"
                          . "<a class = 'delete' title = 'Eliminar' data-toggle = 'tooltip'><i class = 'material-icons'>&#xE872;</i></a>"
                          . "<a class = 'update' title = 'Actualizar' data-toggle = 'tooltip'><i class = 'material-icons'>&#xE863;</i></a>"
                          . "</td> </tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </table>

            <!--FIN TABLA-->
          </div>
        </div>
      </div>
    <?php
    getFooter();  //esta parte agrega toda la parte de abajo, los derechos reservados
    ?>

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