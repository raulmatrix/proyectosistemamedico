
<?php  

session_start();
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

$idUsu = $_POST['idusu'];

$sql = "select idUsuario,usuario,password,nombre,apellidoPat,apellidoMat,rol,nroAsegurado from usuario where idUsuario='$idUsu'";
$resultado = $conexionBD->datos($sql);

//print_r($resultado);
//echo "Hola";
if($resultado->num_rows>0){
    //echo "Hay valor";
    $fila = mysqli_fetch_assoc($resultado);
?>


        <div class="modal-body">

        <!-- <h1>Registro Medicos</h1> -->
            <form action="listausuarios.php" method="post">

                <input type="hidden" name="idUsu" id="idUsu" value="<?php echo $idUsu; ?>">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Usuario" value="<?php echo $fila['nombre'];?>">
                    
                </div>
                <div class="row">   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Apellido Paterno</label>
                            <input type="text"
                                class="form-control" name="apePat" id="apePat" aria-describedby="helpId" placeholder="Apellido Paterno" value="<?php echo $fila['apellidoPat'];?>">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Apellido Materno</label>
                            <input type="text"
                                class="form-control" name="apeMat" id="apeMat" aria-describedby="helpId" placeholder="Apellido Materno" value="<?php echo $fila['apellidoMat'];?>">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text"
                            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario" value="<?php echo $fila['usuario'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="text"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Rol</label>
                          <select class="form-control" name="rol" id="rol">
                            <option value="<?php echo $fila['rol'];?>"><?php echo $fila['rol'];?></option>
                            <option value="administrador">Administrador</option>
                            <option value="paciente">Paciente</option>
                            <option></option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nro Asegurado</label>
                          <input type="text"
                            class="form-control" name="nroAseg" id="nroAseg" value="<?php echo $fila['nroAsegurado'];?>" aria-describedby="helpId" placeholder="Numero asegurado">
                          
                        </div>
                    </div>
                   
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
                            <strong>Advertencia</strong> El usuario no esta registrado
                            </div>";

                }
            ?>


