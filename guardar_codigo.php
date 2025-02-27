<?php
include 'Conexion.php'; // Asegúrate de que este archivo tiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"];

    $query = "INSERT INTO tokens (codigo, estado) VALUES (?, 'pendiente')";

    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $codigo);

    if ($stmt->execute()) {
        echo "Código guardado exitosamente.";
    } else {
        echo "Error al guardar el código.";
    }

    $stmt->close();
    $conexion->close();
}
?>
