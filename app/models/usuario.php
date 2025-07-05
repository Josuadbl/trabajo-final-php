<?php
class Usuario {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function obtenerTodos() {
    $stmt = $this->pdo->query("SELECT u.*, p.bio FROM usuarios u LEFT JOIN perfiles p ON u.id = p.usuario_id");
    return $stmt->fetchAll();
  }

  public function crear($nombre, $email, $password, $bio) {
    $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $email, $password]);
    $usuarioId = $this->pdo->lastInsertId();

    $stmt2 = $this->pdo->prepare("INSERT INTO perfiles (usuario_id, bio) VALUES (?, ?)");
    $stmt2->execute([$usuarioId, $bio]);
  }

  public function eliminar($id) {
    $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
  }
  public function obtenerPorId($id) {
  $stmt = $this->pdo->prepare("SELECT u.*, p.bio FROM usuarios u LEFT JOIN perfiles p ON u.id = p.usuario_id WHERE u.id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

public function actualizar($id, $nombre, $email, $password, $bio) {
  $stmt = $this->pdo->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE id = ?");
  $stmt->execute([$nombre, $email, $password, $id]);

  $stmt2 = $this->pdo->prepare("UPDATE perfiles SET bio = ? WHERE usuario_id = ?");
  $stmt2->execute([$bio, $id]);
}
}