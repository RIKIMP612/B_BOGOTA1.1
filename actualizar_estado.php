<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_usuario"])) {
    $id_usuario = $_POST["id_usuario"];
    
    $query = "UPDATE usuarios SET estado = 'autorizado' WHERE id_usuario = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        echo "Usuario autorizado.";
    } else {
        echo "Error al actualizar estado.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Solicitud inválida.";
}
?>
