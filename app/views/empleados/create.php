<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="card">
    <div class="card-header">
        <h3>Agregar Nuevo Empleado</h3>
    </div>
    <div class="card-body">
        <form action="/p-php/prueba-php/public/empleados/store" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Empleado</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/empleados" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>
