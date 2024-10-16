<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();  

$idMedico = $_POST['idMed'];

/*$sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";
*/
$sql = "UPDATE medico SET estado='inactivo' WHERE idMedico=$idMedico";

$datos=$conexionBD->datos($sql);

?>