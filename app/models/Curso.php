<?php
class Curso {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function obtenerTodos() {
    $sql = "SELECT c.*, COUNT(m.id) AS total_materias
            FROM cursos c
            LEFT JOIN materias m ON c.id = m.curso_id
            GROUP BY c.id";
    return $this->pdo->query($sql)->fetchAll();
  }

  public function crear($nombre, $descripcion) {
    $stmt = $this->pdo->prepare("INSERT INTO cursos (nombre, descripcion) VALUES (?, ?)");
    $stmt->execute([$nombre, $descripcion]);
  }

  public function eliminar($id) {
    $stmt = $this->pdo->prepare("DELETE FROM cursos WHERE id = ?");
    $stmt->execute([$id]);
  }
  public function obtenerPorId($id) {
  $stmt = $this->pdo->prepare("SELECT * FROM cursos WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

public function actualizar($id, $nombre, $descripcion) {
  $stmt = $this->pdo->prepare("UPDATE cursos SET nombre = ?, descripcion = ? WHERE id = ?");
  $stmt->execute([$nombre, $descripcion, $id]);
}
}