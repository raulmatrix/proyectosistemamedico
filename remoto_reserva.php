<?php
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

// Obtener los datos enviados por POST
$idUsuario = $_POST['idUsuario'];
$idMedico = $_POST['idMedico'];
$horario = $_POST['horario']; // Asegúrate que esto es el idHorarios
$fecha = $_POST['fecha'];
$estado = $_POST['estado'];

// Validar que los parámetros no estén vacíos
if(empty($idUsuario) || empty($idMedico) || empty($horario) || empty($fecha) || empty($estado)) {
    echo "Error: Faltan parámetros para la inserción.";
    exit;
}

// Consulta para insertar la reserva
$sql = "INSERT INTO reserva (estado, fecha, Usuario_idUsuario, Medico_idMedico, Horarios_idHorarios)
        VALUES ('$estado', '$fecha', '$idUsuario', '$idMedico', 1)";

if ($conexionBD->datos($sql)) {
    echo "Reserva insertada correctamente";
} else {
    echo "Error al insertar la reserva: "; //mysqli_error($conexionBD->getConnection());
}

// Cerrar la conexión (opcional, pero recomendable)
$conexionBD->cerrarConexion();
?>
