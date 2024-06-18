<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $tipo_usuario = $_POST['tipo_usuario'];
    $escuela = $_POST['escuela'];
    $curso = $_POST['curso'];
    $nivel = $_POST['nivel'];
   

    // Verificar si el correo o teléfono ya están registrados
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? OR telefono = ?");
    $stmt->bind_param("ss", $email, $telefono);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El correo electrónico o el teléfono ya están registrados.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, telefono, contrasena, id_TipoUsuarios, id_escuela, id_curso, id_nivel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssiisi", $nombre, $apellido, $email, $telefono, $contrasena, $tipo_usuario, $escuela, $curso, $nivel);

        if ($stmt->execute()) {
            echo "Inscripción exitosa.";
            header("Location: inscripcion_exito.php");
            exit();
        } else {
            echo "Error al inscribirse.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
