<?php

require 'db_connection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirigir si no está logueado
    exit();
}

// Obtener la información del usuario
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejar actualización de perfil
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Actualizar la información del usuario
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $email, $user_id);
        $stmt->execute();

        echo "Información actualizada con éxito!";
    }

    // Manejar eliminación de cuenta
    if (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        
        session_destroy(); // Cerrar sesión
        header("Location: register.php"); // Redirigir a la página de registro
        exit();
    }
}

?>