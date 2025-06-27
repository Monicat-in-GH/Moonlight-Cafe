<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moonlight Cafe</title>
    <link rel="stylesheet" href="styles.css" />
    <style>

        .auth-links {
            margin-top: 20px;
            font-size: 1.1em;
        }
        .auth-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 8px 15px;
            border: 1px solid #f0e6d2;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .auth-links a:hover {
            background-color: #f0e6d2;
            color: #7b6a5e;
        }

        .auth-links .logout-button {
            background-color: #dc3545; /* Color rojo para cerrar sesión */
            border-color: #dc3545;
            color: white;
        }
        .auth-links .logout-button:hover {
            background-color: #c82333;
            color: white;
        }
    </style>
</head>
<body>
    <header id="home">
        <img src="assets/Logo.jpg" alt="Logo Moonlight Cafe" class="logo" />
        <h1>Moonlight Cafe</h1>
        <p class="subtitle">En donde cada momento es único</p>

        <div class="auth-links">
            <?php
            session_start(); // Inicia la sesión si no se ha iniciado
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <span>Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="dashboard.php">Mi Cuenta</a>
                <a href="logout.php" class="logout-button">Cerrar Sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesión</a>
                <a href="register.php">Registrarse</a>
            <?php endif; ?>
        </div>
    </header>

    <section class="menu">
        <h2>Menú</h2>
        <div class="menu-items">
            <div class="menu-item">
                <img src="assets/menu.jpg" alt="Cafés" />
                <p>Cafés</p>
            </div>
            <div class="menu-item">
                <img src="assets/menup.jpg" alt="Postres" />
                <p>Postres</p>
            </div>
            </div>
    </section>

    <section id="about">
        <h2>Nuestra Historia</h2>
        <p>
            Nacimos en el corazón de la ciudad con el deseo de ofrecer un espacio cálido donde cada taza tenga recuerdos inolvidables.
            ¿Nuestro dicho? Cada recuerdo cabe en una taza de café.
        </p>
    </section>

    <section id="contact">
        <h2>Horarios y Ubicación</h2>
        <p>Lunes a Domingo: 8:00 AM - 10:00 PM</p>
        <p>Dirección: Calle Luna 123, Ciudad Café</p>
    </section>

    <section id="gallery">
        <h2>Galería</h2>
        <img src="assets/Imagen C 1.jpg" alt="Interior" />
        <img src="assets/Imagen C 2.jpg" alt="interior" />
        <img src="assets/Imagen C 3.jpg" alt="interior" />
    </section>

    <footer>
        <p>© 2025 Moonlight Cafe. Todos los derechos reservados.</p>
    </footer>
</body>
</html>