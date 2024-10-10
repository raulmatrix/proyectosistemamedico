<?php 
include 'ConexionBD.php';

$conexionBD = new ConexionBD();
$conexionBD->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellidoPat = $_POST['apellidoPat'];
    $apellidoMat = $_POST['apellidoMat'];
    $nroAsegurado = $_POST['nroAsegurado'];

    // Consulta SQL
    $sql = "INSERT INTO usuario (idUsuario, usuario, password, nombre, apellidoPat, apellidoMat, rol, nroAsegurado, estado) 
            VALUES (NULL, '$usuario', '$password', '$nombre', '$apellidoPat', '$apellidoMat', 'paciente', '$nroAsegurado', 'activo')";

    // Ejecutar consulta
    if ($conexionBD->datos($sql)) {
        echo "Usuario registrado correctamente";
    } else {
        // Mostrar un mensaje de error más detallado
        echo "Error al registrar usuario: ";
    }
}

?>
