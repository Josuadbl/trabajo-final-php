<?php
require_once __DIR__ . '/../models/Estudiante.php';
require_once __DIR__ . '/../../config/database.php';

$estudiante = new Estudiante($pdo);


if (isset($_GET['editar'])) {
  $editarEstudiante = $estudiante->obtenerPorId($_GET['editar']);
  $cursosAsignados = $estudiante->obtenerCursosAsignados($_GET['editar']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $cursos = $_POST['cursos'] ?? [];

  if (isset($_POST['actualizar'])) {
    $estudiante->actualizar($_POST['id'], $nombre, $email, $cursos);
  } elseif (isset($_POST['crear'])) {
    $estudiante->crear($nombre, $email, $cursos);
  }

  header("Location: ?seccion=estudiantes");
  exit;
}


if (isset($_GET['eliminar'])) {
  $estudiante->eliminar($_GET['eliminar']);
  header("Location: ?seccion=estudiantes");
  exit;
}

$estudiantes = $estudiante->obtenerTodos();
$cursos = $estudiante->obtenerCursos();