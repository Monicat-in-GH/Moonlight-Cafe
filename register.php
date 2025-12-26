<?php
// register.php

include 'db_connect.php';

$message = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $message = "Por favor, completa todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "El formato del email es inválido.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $message = "¡Registro exitoso! Ya puedes iniciar sesión.";
        } else {

            if ($conn->errno == 1062) { // Código de error para entrada duplicada
                $message = "El nombre de usuario o el correo electrónico ya están registrados.";
            } else {
                $message = "Error al registrar usuario: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Moonlight Cafe</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos específicos para formularios */
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .form-container h2 {
            color: #7b6a5e;
            margin-bottom: 25px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #5a4b41;
            text-align: left;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box; /* Incluye padding en el ancho */
        }
        .form-container button {
            background-color: #964B00;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }
        .form-container button:hover {
            background-color: #7b3d00;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-container p {
            margin-top: 20px;
            font-size: 0.95em;
        }
        .form-container p a {
            color: #964B00;
            text-decoration: none;
            font-weight: bold;
        }
        .form-container p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <img src="assets/Logo.jpg" alt="Logo Moonlight Cafe" class="logo" />
        <h1>Moonlight Cafe</h1>
        <p class="subtitle">En donde cada momento es único</p>
    </header>

    <div class="form-container">
        <h2>Crear una Cuenta</h2>
        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'exitoso') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
    </div>

    <footer>
        <p>© 2025 Moonlight Cafe. Todos los derechos reservados.</p>
    </footer>
</body>
</html>