<?php
 session_start();
 include 'ConexionBD.php';
 
 $conexionBD = new ConexionBD();
 $conexionBD->conectar();

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
            <h1 class="m-0">Registro Medicos</h1>
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
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6">
        <?php
          /*datos enviados desde formulario para registro*/
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtenemos los valores enviados por el formulario
                $nombre = $_POST['nombre'];
                $apellidoPat = $_POST['apePat'];
                $apellidoMat = $_POST['apeMat'];
                $especialidad = $_POST['especialidad'];
              

                $sql = "INSERT INTO medico (idMedico, nombreMed, apellidoPat, apellidoMat, especialidad, estado) 
                VALUES (NULL, '$nombre', '$apellidoPat', '$apellidoMat', '$especialidad', 'activo')";
                $conexionBD->datos($sql);

                ?>  
                <div class="success alert-success">
                <strong>Mensaje!</strong> El medico se registro de manera exitosa
                </div>

                <?php

                }

                ?>

            <!-- <h1>Registro Medicos</h1> -->
            <form action="medicos.php" method="post">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                  class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Medico">
                
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="">Apellido Paterno</label>
                  <input type="text"
                    class="form-control" name="apePat" id="apePat" aria-describedby="helpId" placeholder="Apellido Paterno">
                  
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="">Apellido Materno</label>
                  <input type="text"
                    class="form-control" name="apeMat" id="apeMat" aria-describedby="helpId" placeholder="Apellido Materno">
                  
                  </div>
                </div>
              
              
              </div>

              <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <select class="form-control" name="especialidad" id="especialidad">
                  <option>Oftalmologia</option>
                  <option>Pediatria</option>
                  <option>Traumatologia</option>
                  <option>Medico General</option>
                  <option>Ginecologia</option>
                </select>
              </div>


              <button type="submit" class="btn btn-primary col-12">Registrar</button>

            </form>

          </div>
          <div class="col-md-3">
            
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