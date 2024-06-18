<?php
session_start();
include('conexion.php');

// Consultar los cursos
$consulta_cursos = "SELECT id, curso FROM Curso";
$resultado_cursos = $conn->query($consulta_cursos);

// Consultar los niveles
$consulta_niveles = "SELECT id, nivel FROM Nivel";
$resultado_niveles = $conn->query($consulta_niveles);

// Consultar los escuela
$consulta_escuela = "SELECT id, nombre  FROM Escuela";
$resultado_escuela = $conn->query($consulta_escuela);

// Consultar los tipousuarios
$consulta_tipousuarios = "SELECT id, nombre  FROM tipousuarios";
$resultado_tipousuarios = $conn->query($consulta_tipousuarios);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="pantallaAdmin.css">
    <link rel="stylesheet" href="./css/Style.css">
    <link rel="icon" href="./img/logo.png" sizes="32x32">
</head>
<body>
    <div class="container">
        <div class="center-align">
            <img src="./img/logo.png" alt="Logo San Jose" class="logo2">
            <h4 class="center-align">Formulario de Inscripción</h4>
        </div>
        <form action="procesar_inscripcion.php" method="post">
            
            <div class="row">
                <div class="col s12 m4">
                    <div class="input-field">
                        <input type="text" id="nombre" name="nombre" class="validate" required>
                        <label for="nombre">Nombre:</label>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="input-field">
                        <input type="text" id="apellido" name="apellido" class="validate" required>
                        <label for="apellido">Apellido:</label>
                    </div>
                </div>

                <div class="col s12 m4">
                        <div class="input-field">
                            <input type="tel" id="telefono" name="telefono" class="validate" required>
                            <label for="telefono">Teléfono:</label>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <input type="email" id="email" name="email" class="validate" required>
                        <label for="email">Correo electrónico:</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <input type="password" id="contrasena" name="contrasena" class="validate" required>
                        <label for="contrasena">Contraseña:</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                    <select id="tipo_usuario" name="tipo_usuario" required>
                        <option value="" disabled selected>Selecciona un tipo de usuario</option>
                            <?php
                            if ($resultado_tipousuarios->num_rows > 0) {
                                    while ($row = $resultado_tipousuarios->fetch_assoc()) {
                                    // Excluir el tipo de usuario con id igual a 3
                                    if ($row['id'] != 3 & $row['id'] != 4) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                        <label for="tipo_usuario">Tipo de Usuario:</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select id="escuela" name="escuela" required>
                            <option value="" disabled selected>Selecciona una escuela</option>
                            <?php
                            if ($resultado_escuela->num_rows > 0) {
                                while ($row = $resultado_escuela->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <label for="escuela">Escuela:</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <select id="curso" name="curso" required>
                            <option value="" disabled selected>Selecciona un curso</option>
                            <?php
                            if ($resultado_cursos->num_rows > 0) {
                                while ($row = $resultado_cursos->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['curso'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <label for="curso">Curso:</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <select id="nivel" name="nivel" required>
                            <option value="" disabled selected>Selecciona un nivel</option>
                            <?php
                            if ($resultado_niveles->num_rows > 0) {
                                while ($row = $resultado_niveles->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['nivel'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <label for="nivel">Nivel:</label>
                    </div>
                </div>
            </div>

            <div class="center-align">
            <button type="submit" class="btn btn-custom waves-effect waves-light">Inscribirse</button>
            <a href="login.php" class="btn btn-custom waves-effect waves-light">Inicio</a>
        </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>
