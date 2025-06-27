<?php
// dashboard.php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Moonlight Cafe</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .welcome-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-container h2 {
            color: #7b6a5e;
            margin-bottom: 20px;
        }
        .welcome-container p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 30px;
        }
        .welcome-container a {
            background-color: #964B00;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }
        .welcome-container a:hover {
            background-color: #7b3d00;
        }
    </style>
</head>
<body>
    <header>
        <img src="assets/Logo.jpg" alt="Logo Moonlight Cafe" class="logo" />
        <h1>Moonlight Cafe</h1>
        <p class="subtitle">En donde cada momento es único</p>
    </header>

    <div class="welcome-container">
        <h2>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Has iniciado sesión exitosamente en Moonlight Cafe. Aquí puedes acceder a contenido exclusivo o gestionar tu perfil.</p>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <footer>
        <p>© 2025 Moonlight Cafe. Todos los derechos reservados.</p>
    </footer>
</body>
</html>