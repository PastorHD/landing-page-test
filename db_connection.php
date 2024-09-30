<?php
//Datos de conexión
$servername = "sql207.infinityfree.com";
$username = "if0_37413050";
$password = "2Zo52o7BmD";
$db_name = "if0_37413050_landing_page_test";

// Crear la conexión
$conn = new mysqli($servername,$username,$password,$db_name);

// Verificar la conexión
if ($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
} else{
    echo "Conexión exitosa";
}

?>