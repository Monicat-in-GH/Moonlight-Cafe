<?php
// login.php

session_start(); 
include 'db_connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = "Por favor, introduce tu nombre de usuario y contraseña.";
    } else {

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.php"); // Redirige al usuario a una página de bienvenida
                exit();
            } else {
                $message = "Contraseña incorrecta.";
            }
        } else {
            $message = "Nombre de usuario no encontrado.";
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
    <title>Iniciar Sesión - Moonlight Cafe</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reutiliza los estilos del formulario de register.php */
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
            box-sizing: border-box;
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
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($message)): ?>
            <div class="message error">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>

    <footer>
        <p>© 2025 Moonlight Cafe. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
