<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="card">
    <div class="card-header">
        <h3>Agregar nuevo lote</h3>
    </div>
    <div class="card-body">
        <form action="/p-php/prueba-php/public/lotes/store" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del lote</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="/lotes" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>