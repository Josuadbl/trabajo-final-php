<?php

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../../config/database.php';

$usuario = new Usuario($pdo);


if (isset($_GET['editar'])) {
  $editarUsuario = $usuario->obtenerPorId($_GET['editar']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['actualizar'])) {
    $usuario->actualizar($_POST['id'], $_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['bio']);
  } elseif (isset($_POST['crear'])) {
    $usuario->crear($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['bio']);
  }
  header("Location: ?seccion=usuarios");
  exit;
}

if (isset($_GET['eliminar'])) {
  $usuario->eliminar($_GET['eliminar']);
  header("Location: ?seccion=usuarios");
  exit;
}

$usuarios = $usuario->obtenerTodos();