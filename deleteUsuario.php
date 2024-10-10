<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();  

$idUsuario = $_POST['usuario'];

/*$sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";
*/
$sql = "UPDATE usuario SET estado='inactivo' WHERE idUsuario=$idUsuario";

$datos=$conexionBD->datos($sql);

?>