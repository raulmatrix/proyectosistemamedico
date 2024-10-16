<?php 
session_start();
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

/* Proceso de actualización del registro de usuario */
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
  // Obtenemos los valores enviados por el formulario
  $idMed = $_POST['idMedico'];
  $nombre = $_POST['nombre'];
  $apellidoPat = $_POST['apePat'];
  $apellidoMat = $_POST['apeMat'];
  $especialidad = $_POST['especialidad'];
  

  // Actualización en la base de datos
  $sql = "UPDATE medico SET nombreMed='$nombre', apellidoPat='$apellidoPat', 
  apellidoMat='$apellidoMat', especialidad='$especialidad' WHERE idMedico='$idMed'";
  
  $conexionBD->datos($sql);
    // Si la actualización es exitosa, mostrar el modal
    
}

// Consulta para obtener la lista de médicos
$sql2 = "SELECT idMedico, nombreMed, apellidoPat, apellidoMat, especialidad FROM medico WHERE estado = 'activo'";
$resultado = $conexionBD->datos($sql2);

include 'header.php';
include 'sidebarmenu.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista Médicos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card">
              <div class="card-header"></div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabla_medicos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        while($fila = mysqli_fetch_assoc($resultado)){
                            echo "<tr>";
                                $idMedico = $fila['idMedico'];
                                echo "<td>".$fila['nombreMed']."</td>";
                                echo "<td>".$fila['apellidoPat']."</td>";
                                echo "<td>".$fila['apellidoMat']."</td>";
                                echo "<td>".$fila['especialidad']."</td>";
                                

                                // Botones para editar y eliminar
                                echo "<td>";
                                  echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update' onClick='actualizarMed($idMedico)'><i class='fas fa-edit'></i></button>";
                                  echo " ";
                                  echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#eliminarMed' onClick='quitarMed($idMedico)'><i class='fas fa-trash'></i></button>";
                                echo "</td>";

                                
                            echo "</tr>";
                        }
                      ?>
                  </tbody>
                  <tfoot>
                    
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-1">
                            <!-- Modal -->
                        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Actualizacion Datos Medico</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div id="contenidoModalUpdateMedico">
                                  <div class="modal-body">
                                    Body cargando medicos...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                  </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>


          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal para eliminar -->
  <div class="modal fade" id="eliminarMed" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Registro Médico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro de eliminar al registro de medico?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger" onClick="quitarMed(<?php echo $idMedico; ?>);">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <?php  
  include 'footer.php';
  ?>
