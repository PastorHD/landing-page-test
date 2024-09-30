<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 50px auto;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Lista de Usuarios Registrados</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // URL de la API
            $api_url = 'http://localhost/landing-page-test/users_api.php';

            // Autenticación básica (cambia 'admin' y 'password' por tus credenciales)
            $username = 'admin';
            $password = 'password';

            // Inicializar cURL
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
            $response = curl_exec($ch);
            curl_close($ch);

            echo '<pre>';
            echo 'Respuesta en crudo de la API:';
            echo htmlspecialchars($response); // Imprimir la respuesta en formato seguro
            echo '</pre>';
            
            // Verifica la respuesta de la API con comentario
           // echo "<pre>";
           // print_r($response);
           // echo "</pre>";

            if ($response){
                echo 'Conexión exitosa desde Api a BD';
                echo 'Respuesta de la API:' . $response . '<br>';
                $users = json_decode($response, true);

                // Decodificar el JSON
                $users = json_decode($response,true);

                // Verificar si la decodiciación fue exitosa
                if (json_last_error() === JSON_ERROR_NONE){
                    if (!empty($users) && is_array($users)){
                          // Crear la tabla HTML
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Username</th><th>Email</th></tr>';

            // Iterar sobre los usuarios y agregarlos a la tabla
            foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($user['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                        echo '</tr>';
                      }
                        echo '</table>';
                    } else{
                         echo 'No se encontraron usuarios o la estructura del JSON no es válida.<br>';
                         var_dump($users); // Para depuración
                    }
                } else {
                    echo 'Error al decodificar el JSON: ' . json_last_error_msg();
                } 
            } else {
                echo 'No se pudo conectar a la API.';

            }

            ?>
        </tbody>
    </table>

</body>

</html>