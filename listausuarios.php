<?php 
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

$sql = "select idUsuario,usuario,password,nombre,apellidoPat,apellidoMat,rol,nroAsegurado from usuario";
$resultado = $conexionBD->datos($sql);
//print($resultado);
?>

<?php  
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
            <h1 class="m-0">Lista Usuarios</h1>
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
                <table id="registro" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Rol</th>
                    <th>Nro Asegurado</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php

                        
                        while($fila = mysqli_fetch_assoc($resultado)){
                            
                            echo "<tr>";
                                $idUsuario = $fila['idUsuario'];
                                
                                echo "<td>".$fila['nombre']."</td>";
                                echo "<td>".$fila['apellidoPat']."</td>";
                                echo "<td>".$fila['apellidoMat']."</td>";
                                echo "<td>".$fila['rol']."</td>";
                                echo "<td>".$fila['nroAsegurado']."</td>";
                                //echo "<td>".$fila['telefono']."</td>";

                                echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update' onClick='actualizarReg($idUsuario)'><i class='fas fa-edit'></i></button></td>";
                            
                                echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete' onClick='deleteReg($idUsuario)'><i class='fas fa-trash'></i></button></td>";
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
            
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <?php  
  include 'footer.php';
  ?>