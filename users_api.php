<?php
// Incluir el archivo de conexión a la base de datos
require 'db_connection.php';

// Configurar el encabezado de la respuesta para JSON
header('Content-Type: application/json');

// Función para verificar las credenciales
function authenticate($username, $password) {
    // Aquí deberías validar las credenciales
    // Para este ejemplo, usamos un usuario y contraseña estáticos
    return $username === 'admin' && $password === 'password'; // Cambia esto por tus credenciales
}

// Verificar si se envían las credenciales
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Mi API"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(['error' => 'Acceso no autorizado.']);
    exit;
}

// Obtener las credenciales
$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

// Autenticar al usuario
if (!authenticate($username, $password)) {
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(['error' => 'Credenciales incorrectas.']);
    exit;
}

// Consultar todos los usuarios
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

$users = array();

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