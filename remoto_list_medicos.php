<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

// Validar y sanitizar la especialidad
$especialidad = isset($_GET['especialidad']) ? mysqli_real_escape_string($conexionBD->conexion, $_GET['especialidad']) : '';

if (!empty($especialidad)) {
    $sql = "SELECT idMedico, nombreMed, apellidoPat, apellidoMat, especialidad 
    FROM medico WHERE especialidad='$especialidad' AND estado='activo'";
    $resultado = $conexionBD->datos($sql);

    if (!$resultado) {
        die("Error en la consulta: " . $conexionBD->conexion->error);
    }

    $medicos = array();

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $medicos[] = $fila;
    }

    // Devolver los resultados en formato JSON
    echo json_encode($medicos);
} else {
    echo json_encode(array("error" => "Especialidad no proporcionada"));
}

?>
