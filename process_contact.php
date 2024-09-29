<?php

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí se maneja el envia del formulario, como enviarlo por correo electronico

    // Comprobar que los campos no esten vacios
    if (empty($name) || empty($email) || empty($message)){
        echo "<h1>Error</h1>";
        echo "<p>Todos los campos son obligatorios</p>";
        exit;
    }

    // Validar formato de correo electronico
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<h1>Error</h1>";
        echo "<p>Correo electronico invalido</p>";
        exit;
    }

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try{
         // Configuración del servidor SMTP
         $mail->isSMTP(); // Establecer el uso de SMTP
         $mail->Host = 'smtp.gmail.com'; // Especificar el servidor SMTP
         $mail->SMTPAuth = true; // Activar autenticación SMTP
         $mail->Username = 'darkors.marcors5@gmail.com'; // Tu correo de Gmail
         $mail->Password = 'jdax yzqs rbei ibrn'; // Tu contraseña de Gmail o contraseña de aplicación
         $mail->SMTPSecure = 'tls'; // Habilitar encriptación TLS
         $mail->Port = 587; // Puerto TCP para TLS
 
         // Remitente y destinatario
         $mail->setFrom('darkors.marcors5@gmail.com', 'David Martinez');
         $mail->addAddress($email); // Agregar destinatario (el que llenó el formulario)
 
         // Contenido del correo
         $mail->isHTML(true); // Establecer el formato de correo como HTML
         $mail->Subject = 'Nuevo mensaje de contacto';
         $mail->Body = "Nombre: $name<br>Correo: $email<br>Mensaje:<br>$message";

         $mail->send();
        echo "<h1>Gracias, $name</h1>";
        echo "<p>Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.</p>";
    } catch (Exception $e){
        echo "El correo no pudo ser enviado. Mailer Error : {$mail->ErrorInfo}";
    }


    // Aquí puedes manejar el envío del formulario por correo electrónico
    // Para fines de demostración, simplemente mostraremos un mensaje
    // Asegúrate de tener configurado un servidor SMTP para enviar correos

}
?>