<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user["id"] ?></td>
            <td><?= $user["nombre"] ?></td>
            <td><?= $user["email"] ?></td>
            <td><?= $user["edad"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
