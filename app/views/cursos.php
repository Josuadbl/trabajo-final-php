<?php require_once __DIR__ . '/../controllers/cursosController.php'; ?>

<h2><?= isset($editarCurso) ? "Editar Curso ✏️" : "Crear Curso 📚" ?></h2>

<form method="POST">
  <?php if (isset($editarCurso)): ?>
    <input type="hidden" name="id" value="<?= $editarCurso['id'] ?>">
  <?php endif; ?>

  <input type="text" name="nombre" placeholder="Nombre del curso" value="<?= $editarCurso['nombre'] ?? '' ?>" required>
  <textarea name="descripcion" placeholder="Descripción" required><?= $editarCurso['descripcion'] ?? '' ?></textarea>

  <button type="submit" name="<?= isset($editarCurso) ? 'actualizar' : 'crear' ?>">
    <?= isset($editarCurso) ? 'Actualizar' : 'Crear' ?> curso
  </button>
</form>

<hr>

<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Nombre</th><th>Descripción</th><th>Materias</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cursos as $c): ?>
      <tr>
        <td><?= htmlspecialchars($c['nombre']) ?></td>
        <td><?= htmlspecialchars($c['descripcion']) ?></td>
        <td><?= $c['total_materias'] ?></td>
        <td>
          <a href="?seccion=cursos&editar=<?= $c['id'] ?>">Editar</a> |
          <a href="?seccion=cursos&eliminar=<?= $c['id'] ?>" onclick="return confirm('¿Eliminar este curso?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>