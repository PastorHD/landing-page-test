<?php
// Incluir el archivo de conexión a la base de datos
require 'db_connection.php';

// Configurar el encabezado de la respuesta para JSON
header('Content-Type: application/json');

// Consultar todos los usuarios
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    // Agregar cada usuario al arreglo
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Devolver la respuesta en formato JSON
echo json_encode($users);

// Cerrar la conexión
$conn->close();
?>