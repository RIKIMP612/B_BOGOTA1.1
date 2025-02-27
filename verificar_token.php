<?php
include 'Conexion.php';
session_start();

// Si el usuario no está en sesión, devolver estado "autorizado"
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["estado" => "autorizado"]);
    exit;
}

// Obtener el estado del usuario
$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT estado FROM usuarios WHERE id_usuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode(["estado" => $row['estado']]);

$stmt->close();
$conexion->close();
?>
