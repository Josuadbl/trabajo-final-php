<?php
class Estudiante {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function obtenerTodos() {
    $sql = "SELECT e.*, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS cursos
            FROM estudiantes e
            LEFT JOIN estudiantes_cursos ec ON e.id = ec.estudiante_id
            LEFT JOIN cursos c ON ec.curso_id = c.id
            GROUP BY e.id";
    return $this->pdo->query($sql)->fetchAll();
  }

  public function crear($nombre, $email, $cursos) {
    $stmt = $this->pdo->prepare("INSERT INTO estudiantes (nombre, email) VALUES (?, ?)");
    $stmt->execute([$nombre, $email]);
    $estudianteId = $this->pdo->lastInsertId();

    foreach ($cursos as $cursoId) {
      $this->asignarCurso($estudianteId, $cursoId);
    }
  }

  public function asignarCurso($estudianteId, $cursoId) {
    $stmt = $this->pdo->prepare("INSERT INTO estudiantes_cursos (estudiante_id, curso_id) VALUES (?, ?)");
    $stmt->execute([$estudianteId, $cursoId]);
  }

  public function eliminar($id) {
    $stmt = $this->pdo->prepare("DELETE FROM estudiantes WHERE id = ?");
    $stmt->execute([$id]);
  }

  public function obtenerCursos() {
    return $this->pdo->query("SELECT id, nombre FROM cursos")->fetchAll();
  }

  public function obtenerPorId($id) {
  $stmt = $this->pdo->prepare("SELECT * FROM estudiantes WHERE id = ?");
  $stmt->execute([$id]);
  return $stmt->fetch();
}

public function obtenerCursosAsignados($id) {
  $stmt = $this->pdo->prepare("SELECT curso_id FROM estudiantes_cursos WHERE estudiante_id = ?");
  $stmt->execute([$id]);
  return array_column($stmt->fetchAll(), 'curso_id');
}

public function actualizar($id, $nombre, $email, $cursos) {
  $stmt = $this->pdo->prepare("UPDATE estudiantes SET nombre = ?, email = ? WHERE id = ?");
  $stmt->execute([$nombre, $email, $id]);

  $this->pdo->prepare("DELETE FROM estudiantes_cursos WHERE estudiante_id = ?")->execute([$id]);

  foreach ($cursos as $cursoId) {
    $this->asignarCurso($id, $cursoId);
  }
}
}