<?php
include 'Conexion.php';
session_start(); // Iniciar sesión

$tipo_identificacion = $_POST['tipo_identificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$clave_segura = $_POST['clave_segura'];

$query = "INSERT INTO usuarios (tipo_identificacion, numero_identificacion, clave_segura, estado) 
          VALUES (?, ?, ?, 'esperando')";

$stmt = $conexion->prepare($query);
$stmt->bind_param("sss", $tipo_identificacion, $numero_identificacion, $clave_segura);

if ($stmt->execute()) {
    $_SESSION['id_usuario'] = $stmt->insert_id; // Guardar el ID en la sesión
    echo "Datos guardados correctamente";
} else {
    echo "Error: " . $query . "<br>" . $conexion->error;
}

$stmt->close();
$conexion->close();
?>
