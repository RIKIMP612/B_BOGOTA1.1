<?php
include 'Conexion.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["estado" => "esperando"]);
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$query = "SELECT estado_tarjeta FROM usuarios WHERE id_usuario = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode(["estado" => $row['estado_tarjeta']]); // Puede ser "esperando" o "aprobado"

$stmt->close();
$conexion->close();
?>
