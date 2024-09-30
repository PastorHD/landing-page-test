<?php
//Datos de conexión
$servername = "localhost:3307";
$username = "root";
$password = "Password8956";
$db_name = "landing_page_db";

// Crear la conexión
$conn = new mysqli($servername,$username,$password,$db_name);

// Verificar la conexión
if ($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
} else{
    echo "hola";
}

?>