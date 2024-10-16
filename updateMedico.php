<?php


session_start();
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

$idMedico = $_POST['idMed'];

$sql = "SELECT idMedico, nombreMed, apellidoPat, apellidoMat, especialidad, estado FROM medico WHERE idMedico=$idMedico and estado = 'activo'";
$resultado = $conexionBD->datos($sql);

//print_r($resultado);
//echo "Hola";
if($resultado->num_rows>0){
    //echo "Hay valor";
    $fila = mysqli_fetch_assoc($resultado);
?>

 <!-- <h1>Registro Medicos</h1> -->
        <form action="listamedicos.php" method="post">

        <input type="hidden" name="idMedico" value="<?php echo $idMedico?>">
        <div class="modal-body">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text"
                  class="form-control" name="nombre" id="nombre" value="<?php echo $fila['nombreMed'];?>" aria-describedby="helpId" placeholder="Nombre Medico">
                
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="">Apellido Paterno</label>
                  <input type="text"
                    class="form-control" name="apePat" id="apePat" value="<?php echo $fila['apellidoPat'];?>" aria-describedby="helpId" placeholder="Apellido Paterno">
                  
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="">Apellido Materno</label>
                  <input type="text"
                    class="form-control" name="apeMat" id="apeMat" value="<?php echo $fila['apellidoMat'];?>" aria-describedby="helpId" placeholder="Apellido Materno">
                  
                  </div>
                </div>
              
              
              </div>

              <div class="form-group">
                <label for="especialidad">Especialidad</label>
                <select class="form-control" name="especialidad" id="especialidad">
                  <option value="<?php echo $fila['especialidad'];?>"><?php echo $fila['especialidad'];?></option>
                  <option>Oftalmologia</option>
                  <option>Pediatria</option>
                  <option>Traumatologia</option>
                  <option>Medico General</option>
                  <option>Ginecologia</option>
                </select>
              </div>

        </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-warning" value="Actualizar">
                </div>

            </form>

            <?php  
                }
                else{
                    echo "<div class='alert alert-warning' role='alert'>
                            <strong>Advertencia</strong> El medico no esta registrado
                            </div>";

                }
            ?>