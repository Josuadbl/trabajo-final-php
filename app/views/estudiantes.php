<?php require_once __DIR__ . '/../controllers/estudiantesController.php'; ?>

<h2>Gestión de Estudiantes 🧑‍🎓</h2>

<form method="POST">
  <input type="text" name="nombre" placeholder="Nombre" required>
  <input type="email" name="email" placeholder="Correo electrónico" required>
  <label>Selecciona cursos:</label><br>
  <?php foreach ($cursos as $c): ?>
    <label><input type="checkbox" name="cursos[]" value="<?= $c['id'] ?>"> <?= htmlspecialchars($c['nombre']) ?></label><br>
  <?php endforeach; ?>
  <br>
  <button type="submit" name="crear">Registrar estudiante</button>
</form>

<hr>

<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Nombre</th><th>Email</th><th>Cursos asignados</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($estudiantes as $e): ?>
      <tr>
        <td><?= htmlspecialchars($e['nombre']) ?></td>
        <td><?= htmlspecialchars($e['email']) ?></td>
        <td><?= htmlspecialchars($e['cursos'] ?? '—') ?></td>
        <td><a href="?seccion=estudiantes&eliminar=<?= $e['id'] ?>" onclick="return confirm('¿Eliminar este estudiante?')">Eliminar</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2><?= isset($editarEstudiante) ? "Editar Estudiante ✏️" : "Registrar Estudiante 🧑‍🎓" ?></h2>

<form method="POST">
  <?php if (isset($editarEstudiante)): ?>
    <input type="hidden" name="id" value="<?= $editarEstudiante['id'] ?>">
  <?php endif; ?>

  <input type="text" name="nombre" placeholder="Nombre" value="<?= $editarEstudiante['nombre'] ?? '' ?>" required>
  <input type="email" name="email" placeholder="Correo electrónico" value="<?= $editarEstudiante['email'] ?? '' ?>" required>

  <label>Cursos:</label><br>
  <?php foreach ($cursos as $c): ?>
    <?php
      $checked = '';
      if (isset($cursosAsignados) && in_array($c['id'], $cursosAsignados)) {
        $checked = 'checked';
      }
    ?>
    <label><input type="checkbox" name="cursos[]" value="<?= $c['id'] ?>" <?= $checked ?>> <?= htmlspecialchars($c['nombre']) ?></label><br>
  <?php endforeach; ?>

  <br>
  <button type="submit" name="<?= isset($editarEstudiante) ? 'actualizar' : 'crear' ?>">
    <?= isset($editarEstudiante) ? 'Actualizar' : 'Registrar' ?> estudiante
  </button>
</form>

<