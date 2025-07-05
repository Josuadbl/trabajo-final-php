<?php
require_once __DIR__ . '/../models/Curso.php';
require_once __DIR__ . '/../../config/database.php';

$curso = new Curso($pdo);


if (isset($_GET['editar'])) {
  $editarCurso = $curso->obtenerPorId($_GET['editar']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['actualizar'])) {
    $curso->actualizar($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
  } elseif (isset($_POST['crear'])) {
    $curso->crear($_POST['nombre'], $_POST['descripcion']);
  }
  header("Location: ?seccion=cursos");
  exit;
}


if (isset($_GET['eliminar'])) {
  $curso->eliminar($_GET['eliminar']);
  header("Location: ?seccion=cursos");
  exit;
}

$cursos = $curso->obtenerTodos();