<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page test</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Boostrap Space -->
</head>
<body>
    <header class="bg-primary text-white text-center p-4">
        <h1>
            Bienvenido a mi landing page
        </h1>
        <p>
            Esta es una breve descripción de lo que ofrecemos
        </p>
    </header>

    <div class="container my-5">
        <section>
            <h2>
                ¿Quienes somos?
            </h2>
            <p>
                Aquí puedes hablar sobre tu proyecto o empresa
            </p>
        </section>

        <section>
            <h2>Servicios</h2>
            <ul>
                <li>Servicio 1</li>
                <li>Servicio 2</li>
                <li>Servicio 3</li>
            </ul>
        </section>

        <Section>
            <h2>Contáctanos</h2>
            <form action="process_contact.php" method="POST">

            
            <div class="form-group"> 
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </Section>

    </div>

    
    <footer class="bg-dark text-white text-center p-4 style="position: relative;">
        <p>
            &copy; 2024 Mi empresa. Todos los derechos reservados.
        </p>
    </footer>

    <!-- Vincular Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>