<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

$sql = "SELECT idMedico, nombreMed, apellidoPat, apellidoMat, especialidad FROM medico where estado='activo'";
$resultado = $conexionBD->datos($sql);

$medicos = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $medicos[] = $fila;
}

// Devolver los resultados en formato JSON
echo json_encode($medicos);

?>
