<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();  

$idUsuario = $_POST['idusu'];

$sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";

$datos=$conexionBD->datos($sql);

?>