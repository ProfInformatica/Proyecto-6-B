<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Este bloque se ejecuta solo si el método de solicitud HTTP es POST, lo cual generalmente sucede cuando un formulario ha sido enviado.
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT id, nombre, apellido, contrasena, id_TipoUsuarios FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre, $apellido, $hashed_password, $id_TipoUsuarios);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($password, $hashed_password)) {
            // Credenciales válidas, iniciar sesión
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['id_TipoUsuarios'] = $id_TipoUsuarios;

            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "No se encontró una cuenta con ese correo electrónico";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/pantallaAdmin.css">
    <link rel="stylesheet" href="./css/StyleDash.css">
    <link rel="icon" href="./img/logo.png" sizes="32x32">
</head>
<body>
    <div class="container">
        <div class="center-align">
            <img src="./img/logo.png" alt="Logo San Jose" class="logo">
        </div>
        <form action="login.php" method="post">
            <h3 class="center-align">Eventos San Jose</h3>
            <?php if (isset($error)) { echo "<p class='red-text'>$error</p>"; } ?>
            <div class="input-field">
                <input type="email" id="email" name="email" class="validate texto-en-minusculas" required>
                <label for="email">Correo electrónico:</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" class="validate" required>
                <label for="password">Contraseña:</label>
            </div>
            <div class="center-align">
                <button type="submit" class="btn btn-custom waves-effect waves-light">Iniciar sesión</button>
            </div>
            <div class="center-align">
                <a href="solicitar_password.php">¿Olvidaste tu contraseña?</a>
                <a href="inscripcion.php">|    Registrarse</a>
            </div>
            <div class="footer center-align">
                <p> Hecho por: Sexto B (Departamento de Informática)</p>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
