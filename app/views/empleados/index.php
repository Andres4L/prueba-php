<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="card">
    <div class="card-header">
        <h3>Lista de Empleados</h3>
    </div>
    <div class="card-body">
        <a href="/p-php/prueba-php/public/empleados/create" class="btn btn-primary mb-3">Nuevo Empleado</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= $empleado["id"] ?></td>
                        <td><?= $empleado["nombre"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>
