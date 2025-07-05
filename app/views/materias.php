

<?php require_once __DIR__ . '/../controllers/materiasController.php'; ?>

<h2><?= isset($editarMateria) ? "Editar Materia ✏️" : "Crear Materia 📖" ?></h2>

<form method="POST">
  <?php if (isset($editarMateria)): ?>
    <input type="hidden" name="id" value="<?= $editarMateria['id'] ?>">
  <?php endif; ?>

  <select name="curso_id" required>
    <option value="">Seleccione un curso</option>
    <?php foreach ($cursos as $c): ?>
      <option value="<?= $c['id'] ?>" <?= isset($editarMateria) && $editarMateria['curso_id'] == $c['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($c['nombre']) ?>
      </option>
    <?php endforeach; ?>
  </select>

  <input type="text" name="nombre" placeholder="Nombre de la materia" value="<?= $editarMateria['nombre'] ?? '' ?>" required>
  <input type="text" name="descripcion" placeholder="Descripción" value="<?= $editarMateria['descripcion'] ?? '' ?>" required>

  <button type="submit" name="<?= isset($editarMateria) ? 'actualizar' : 'crear' ?>">
    <?= isset($editarMateria) ? 'Actualizar' : 'Crear' ?> materia
  </button>
</form>

<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Curso</th>
      <th>Materia</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($materias as $m): ?>
      <tr>
        <td><?= htmlspecialchars($m['curso_nombre']) ?></td>
        <td><?= htmlspecialchars($m['nombre']) ?></td>
        <td><?= htmlspecialchars($m['descripcion']) ?></td>
        <td>
          <a href="?seccion=materias&editar=<?= $m['id'] ?>">Editar</a> |
          <a href="?seccion=materias&eliminar=<?= $m['id'] ?>" onclick="return confirm('¿Eliminar esta materia?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>