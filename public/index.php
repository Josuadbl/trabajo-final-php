<?php


$seccion = $_GET['seccion'] ?? 'inicio';
$rutaVista = __DIR__ . "/../app/views/$seccion.php";

if (!file_exists($rutaVista)) {
  $rutaVista = __DIR__ . "/../app/views/404.php";

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi App PHP</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <h1>Aplicación Web Modular con PHP</h1>
    <nav>
    <ul>
    <li><a href="?seccion=inicio">Inicio</a></li>
    <li><a href="?seccion=usuarios">Usuarios</a></li>
    <li><a href="?seccion=cursos">Cursos</a></li>
    <li><a href="?seccion=materias">Materias</a></li>
    <li><a href="?seccion=estudiantes">Estudiantes</a></li>
  </ul>
</nav>
  </header>

  <main>
    <?php include $rutaVista; ?>
  </main>

  <footer>
    <p>Desarrollado por Josua &copy; <?php echo date("Y"); ?></p>
  </footer>
  <script src="assets/js/script.js"></script>
</body>
</body>
</html>