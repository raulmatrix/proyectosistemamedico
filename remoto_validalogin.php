<?php

include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar(); 

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sentencia = $conexionBD->conexion->prepare("SELECT * FROM usuario WHERE usuario=? AND password=?");
$sentencia->bind_param('ss', $usuario, $password);
$sentencia->execute();

$resultado = $sentencia->get_result();

if ($fila = $resultado->fetch_assoc()) {
    // Si se encontró al menos una fila, la autenticación es exitosa
    echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso", "user" => $fila], JSON_UNESCAPED_UNICODE);
} else {
    // No se encontraron filas, la autenticación falló
    echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"], JSON_UNESCAPED_UNICODE);
}

$conexionBD->conexion->close();

?>
