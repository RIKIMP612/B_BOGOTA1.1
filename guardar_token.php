<?php
include 'Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codigo_token"])) {
    $codigo_token = $_POST["codigo_token"];

    // Obtiene el último usuario registrado
    $query = "UPDATE usuarios SET codigo_token = ? WHERE id_usuario = (SELECT id_usuario FROM usuarios ORDER BY id_usuario DESC LIMIT 1)";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $codigo_token);

    if ($stmt->execute()) {
        echo "Código almacenado correctamente.";
    } else {
        echo "Error al guardar el código.";
    }

    $stmt->close();
    $conexion->close();
}
?>
