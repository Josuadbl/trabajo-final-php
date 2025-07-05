<?php
require_once __DIR__ . '/../models/Materia.php';
require_once __DIR__ . '/../../config/database.php';

$materia = new Materia($pdo);


if (isset($_GET['editar'])) {
  $editarMateria = $materia->obtenerPorId($_GET['editar']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['actualizar'])) {
    $materia->actualizar($_POST['id'], $_POST['curso_id'], $_POST['nombre'], $_POST['descripcion']);
  } elseif (isset($_POST['crear'])) {
    $materia->crear($_POST['curso_id'], $_POST['nombre'], $_POST['descripcion']);
  }
  header("Location: ?seccion=materias");
  exit;
}


if (isset($_GET['eliminar'])) {
  $materia->eliminar($_GET['eliminar']);
  header("Location: ?seccion=materias");
  exit;
}

$materias = $materia->obtenerTodas();
$cursos = $materia->obtenerCursos();