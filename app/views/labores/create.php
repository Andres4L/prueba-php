<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="card">
    <div class="card-header">
        <h3>Agregar Nueva Labor</h3>
    </div>
    <div class="card-body">
        <form action="/p-php/prueba-php/public/labores/store" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Labor</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/labores" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>

