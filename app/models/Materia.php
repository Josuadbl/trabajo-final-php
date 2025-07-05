<?php
class Materia {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function obtenerTodas() {
    $sql = "SELECT m.*, c.nombre AS curso_nombre
            FROM materias m
            JOIN cursos c ON m.curso_id = c.id";
    return $this->pdo->query($sql)->fetchAll();
  }

  public function crear($curso_id, $nombre, $descripcion) {
    $stmt = $this->pdo->prepare("INSERT INTO materias (curso_id, nombre, descripcion) VALUES (?, ?, ?)");
    $stmt->execute([$curso_id, $nombre, $descripcion]);
  }

  public function eliminar($id) {
    $stmt = $this->pdo->prepare("DELETE FROM materias WHERE id = ?");
    $stmt->execute([$id]);
  }

  public function obtenerCursos() {
    return $this->pdo->query("SELECT id, nombre FROM cursos")->fetchAll();
  }
  public function obtenerPorId($id) {
  $stmt = $this->pdo->prepare("SELECT * FROM materias WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

public function actualizar($id, $curso_id, $nombre, $descripcion) {
  $stmt = $this->pdo->prepare("UPDATE materias SET curso_id = ?, nombre = ?, descripcion = ? WHERE id = ?");
  $stmt->execute([$curso_id, $nombre, $descripcion, $id]);
}
}