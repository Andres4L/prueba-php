<?php require_once __DIR__ . "/../layout/header.php"; ?>

<h2>Editar Registro</h2>

<form action="/p-php/prueba-php/public/registros/update/<?= $registro['id'] ?>" method="POST" onsubmit="confirmarEdicion(event)">
    <div class="mb-3">
        <label for="labor_id" class="form-label">Labor</label>
        <select name="labor_id" class="form-control" required>
            <?php foreach ($labores as $labor): ?>
                <option value="<?= $labor["id"] ?>" <?= $labor["id"] == $registro["labor_id"] ? "selected" : "" ?>>
                    <?= $labor["nombre"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="lote_id" class="form-label">Lote</label>
        <select name="lote_id" class="form-control" required>
            <?php foreach ($lotes as $lote): ?>
                <option value="<?= $lote["id"] ?>" <?= $lote["id"] == $registro["lote_id"] ? "selected" : "" ?>>
                    <?= $lote["nombre"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="empleado_nombre" class="form-label">Empleado</label>
        <input type="text" name="empleado_nombre" class="form-control" value="<?= htmlspecialchars($registro['empleado_nombre']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" class="form-control" value="<?= $registro['fecha'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" class="form-control" min="1" value="<?= $registro['cantidad'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="tarifa" class="form-label">Tarifa</label>
        <input type="number" step="0.01" name="tarifa" class="form-control" min="0.01" value="<?= $registro['tarifa'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="/p-php/prueba-php/public/registros" class="btn btn-secondary">Cancelar</a>
</form>

<script>
function confirmarEdicion(event) {
    event.preventDefault();

    Swal.fire({
        title: '¿Guardar cambios?',
        text: "Se actualizarán los datos del registro.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Sí, actualizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit();
        }
    });
}
</script>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>
