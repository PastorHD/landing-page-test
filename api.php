<?php

include 'db_connection.php';

header("Content-Type: application/json");

// Realizar la consulta
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result->num_rows > 0) {
    $contacts = array();
    
    while($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }

    // Devolver la respuesta en formato JSON
    echo json_encode($contacts);
} else {
    echo json_encode([]);
}

// Cerrar la conexión
$conn->close();
?>