<?php 
session_start();
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

$sql1 = "select idMedico, nombreMed, apellidoPat, apellidoMat, especialidad, estado from medico where estado = 'activo'";
$resultado = $conexionBD->datos($sql1);

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
            <h1 class="m-0">Lista Medicos</h1>
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
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-10">
                  
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="tabla_medicos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Especialidad</th>
                    
                    
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
                               
                                echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update' onClick='actualizarReg($idMedico)'><i class='fas fa-edit'></i></button></td>";
                            
                                echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#eliminar' onClick='eliminar($idMedico)'><i class='fas fa-trash'></i></button></td>";
                            echo "</tr>";
                        }
                      ?>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Rol</th>
                    <th>Telefono</th>
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
                                <h5 class="modal-title">Actualizacion Datos Usuario</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div id="contenidoModalUpdate">
                                  <div class="modal-body">
                                    Body cargando...
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
  
  
  
  <!-- Modal -->
  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Registro Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          Esta seguro de eliminar este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onClick="eliminar(<?php echo $idUsuario; ?>);">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <?php  
  include 'footer.php';
  ?>