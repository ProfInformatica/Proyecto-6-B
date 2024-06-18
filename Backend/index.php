<?php
session_start();

// Verificar si el usuario está logeado
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

//$nombre_usuario = $_SESSION['nombre'] . " " . $_SESSION['apellido'];
$nombre_usuario = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/StyleDash.css">
    <link rel="icon" href="./img/logo.png" sizes="32x32">
</head>
<body>
    <!-- Navbar -->
<header>

    <nav>
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">
                <div class="logoflex">
                    <img src="./img/logo.png" alt="Logo San Jose" class="logo2">
                    <span class="username"><?php echo $nombre_usuario; ?>.</span>
                </div>
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">add</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="dashboard.php">Eventos</a></li>
                <li><a href="inscripciones.php">Inscripciones</a></li>
                <li><a href="resutados.php">Resultados</a></li>
                <li><a href="fechas.php">Fechas</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
                <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content colorDropdown">
                    <li><a href="crud.php">Registro</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">three</a></li>
                </ul>

                <!-- Dropdown Structure -->
                <ul id="dropdown2" class="dropdown-content colorDropdown">
                    <li><a href="crud.php">Registro</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">three</a></li>
                </ul>

    <!-- Sidebar (Sidenav) -->
    <ul class="sidenav" id="mobile-demo">
        <li>
            <div class="user-view">
                <a href="#user" class="LogoSidebar"><img class="Sidebar" src="./img/logo.png"></a>
                <a href="#name"><span class="white-text name"><?php echo $nombre_usuario; ?></span></a>
            </div>
        </li>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="dashboard.php">Eventos</a></li>
        <li><a href="inscripciones.php">Inscripciones</a></li>
        <li><a href="resutados.php">Resultados</a></li>
        <li><a href="fechas.php">Fechas</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Menu<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="logout.php" class="waves-effect">Cerrar sesión</a></li>
    </ul>

</header>

    <!-- Contenido Principal -->
<main>
    <div class="container">
        <h4 class="center-align">Colegio San José Córdoba</h4>
        <h5 class="center-align">hace 9 meses aproximadamente</h5>
        <div class="row rowIndex">

            <!-- Primera tarjeta en una columna -->
            <div class="col s12 m4"> <!-- Utilizando el sistema de cuadrícula de Materialize CSS: s12 para móvil, m6 para tamaño mediano -->
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="./img/img_01.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nivel Inicial<i class="material-icons right">more_vert</i></span>
                       <!--<p class="texto-link"><a href="#">ninicial@colegiodesanjose.edu.ar</a></p>-->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nivel Inicial<i class="material-icons right">close</i></span>
                        <p>Nuestro carisma y hacer cotidiano, se sustenta en la formación en valores humanos, evangélicos, sociales que van determinando  modos de vincularse.</p>
                    </div>
                </div>
            </div>

             <!-- Primera tarjeta en una columna -->
             <div class="col s12 m4"> <!-- Utilizando el sistema de cuadrícula de Materialize CSS: s12 para móvil, m6 para tamaño mediano -->
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="./img/img_01.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nivel Primario<i class="material-icons right">more_vert</i></span>
                        <!--<p class="texto-link"><a href="nprimario@colegiodesanjose.edu.ar">nprimario@colegiodesanjose.edu.ar</a></p>-->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nivel Primario<i class="material-icons right">close</i></span>
                        <p>Nuestra Comunidad Educativa trabaja la identidad pedagógico-pastoral atendiendo el carisma institucional, los propósitos fundacionales, tratando de leer los signos del presente para orientar la evangelización de la cultura actual.</p>
                    </div>
                </div>
            </div>

            <!-- Segunda tarjeta en otra columna -->
            <div class="col s12 m4"> <!-- Utilizando el sistema de cuadrícula de Materialize CSS: s12 para móvil, m6 para tamaño mediano -->
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="./img/img_02.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Nivel Secundario<i class="material-icons right">more_vert</i></span>
                      <!--<p class="texto-link"><a href="#">direccionsecundario@colegiodesanjose.edu.ar</a></p>-->
                      </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Nivel Secundario<i class="material-icons right">close</i></span>
                        <p>En nuestra escuela San José la educación secundaria responde a una tarea evangelizadora que fomenta en nuestros alumnos una visión comprometida y transformadora del medio ambiente natural y social.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<footer class="footerColor footerContainer">
        <div class="container footerContainer">
        <div class="row footerColor center footerContainer">
            <div class="col l6 s12">
                <a href="index.php" class="brand-logo">
                    <div class="logofooterDiv">
                        <img src="./img/logo.png" alt="Logo San Jose" class="logofooter">
                        <span class="username"><h5 class="amber-text text-accent-3">Colegio de San José</h5></span>
                    </div>
                </a>
                <p class="grey-text text-lighten-4">Independencia 302. X5000 - Córdoba Argentina</p>
            </div>
            <div class="col l4 offset-l2 s12">
            <h6 class="white-text">0351 - 4223428</h6>
            <ul>
                <li><a class="grey-text text-lighten-3 texto-en-minusculas texto-chico" href="#!">ninicial@colegiodesanjose.edu.ar</a></li>
                <li><a class="grey-text text-lighten-3 texto-en-minusculas texto-chico" href="#!">nprimario@colegiodesanjose.edu.ar</a></li>
                <li><a class="grey-text text-lighten-3 texto-en-minusculas texto-chico" href="#!">direccionsecundario@colegiodesanjose.edu.ar</a></li>
            </ul>
            </div>
            <p class="grey-text text-lighten-4">© 2024 Copyright-informatica San José</p>
        </div>
        </div>
</footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidenavElems = document.querySelectorAll('.sidenav');
            var sidenavInstances = M.Sidenav.init(sidenavElems, {});

            var dropdownElems = document.querySelectorAll('.dropdown-trigger');
            var dropdownInstances = M.Dropdown.init(dropdownElems, {
                hover: false  // Para activar el dropdown al hacer clic
            });
        });
    </script>

</body>

</html>


