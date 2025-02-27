<?php
include 'Conexion.php';
session_start();

// Si el usuario es admin, no responder con estado
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    echo json_encode(["estado" => "esperando"]);
    exit;
}

// Si no hay usuario en sesión, detener verificación
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["estado" => "esperando"]);
    exit;
}

// Obtener el estado del usuario actual
$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT estado FROM usuarios WHERE id_usuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Si el usuario existe, devolver su estado; si no, devolver "esperando"
if ($row) {
    echo json_encode(["estado" => $row['estado']]);
} else {
    echo json_encode(["estado" => "esperando"]);
}

$stmt->close();
$conexion->close();
?>
