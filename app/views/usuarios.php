<?php require_once __DIR__ . '/../controllers/usuariosController.php'; ?>

<h2><?= isset($editarUsuario) ? "Editar Usuario 🛠️" : "Crear Usuario 👤" ?></h2>

<form method="POST">
  <?php if (isset($editarUsuario)): ?>
    <input type="hidden" name="id" value="<?= $editarUsuario['id'] ?>">
  <?php endif; ?>
  <input type="text" name="nombre" placeholder="Nombre" value="<?= $editarUsuario['nombre'] ?? '' ?>" required>
  <input type="email" name="email" placeholder="Correo" value="<?= $editarUsuario['email'] ?? '' ?>" required>
  <input type="password" name="password" placeholder="Contraseña" value="<?= $editarUsuario['password'] ?? '' ?>" required>
  <input type="text" name="bio" placeholder="Biografía" value="<?= $editarUsuario['bio'] ?? '' ?>">
  
  <button type="submit" name="<?= isset($editarUsuario) ? 'actualizar' : 'crear' ?>">
    <?= isset($editarUsuario) ? 'Actualizar' : 'Crear' ?> usuario
  </button>
</form>

<hr>

<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Nombre</th><th>Email</th><th>Biografía</th><th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $u): ?>
      <tr>
        <td><?= htmlspecialchars($u['nombre']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['bio']) ?></td>
        <td>
          <a href="?seccion=usuarios&editar=<?= $u['id'] ?>">Editar</a> |
          <a href="?seccion=usuarios&eliminar=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>