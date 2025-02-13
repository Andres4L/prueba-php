<?php 
session_start();

require_once __DIR__ . "/../layout/header.php"; 
?>

<?php if (isset($_SESSION["success"])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '<?= $_SESSION["success"] ?>',
            confirmButtonColor: '#28a745',
        }).then(() => {
            window.location.href = "/p-php/prueba-php/public/registros";
        });
    </script>
    <?php unset($_SESSION["success"]); ?>
<?php endif; ?>

<?php if (isset($_SESSION["error"])): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '<?= $_SESSION["error"] ?>',
            confirmButtonColor: '#dc3545',
        });
    </script>
    <?php unset($_SESSION["error"]); ?>
<?php endif; ?>
<form action="/p-php/prueba-php/public/registros/store" method="POST" onsubmit="confirmarRegistro(event)">
    
    <div class="mb-3">
        <label for="labor_id" class="form-label">Labor</label>
        <select name="labor_id" class="form-control" required>
            <option value="">Seleccione una labor</option>
            <?php foreach ($labores as $labor): ?>
                <option value="<?= $labor["id"] ?>"><?= $labor["nombre"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="lote_id" class="form-label">Lote</label>
        <select name="lote_id" class="form-control" required>
            <option value="">Seleccione un lote</option>
            <?php foreach ($lotes as $lote): ?>
                <option value="<?= $lote["id"] ?>"><?= $lote["nombre"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="empleado_id" class="form-label">Empleado</label>
        <!-- <select name="empleado_id" class="form-control" required>
            <option value="">Seleccione un empleado</option>
            <?php foreach ($empleados as $empleado): ?>
                <option value="<?= $empleado["id"] ?>"><?= $empleado["nombre"] ?></option>
            <?php endforeach; ?>
        </select> -->
        <input type="text" name="empleado_nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
    </div>

    <div class="mb-3">
        <label for="tarifa" class="form-label">Tarifa</label>
        <input type="number" step="0.01" name="tarifa" id="tarifa" class="form-control" min="0.01" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="/p-php/prueba-php/public/registros" class="btn btn-secondary">Cancelar</a>
    </div>
</form>


<script>
function confirmarRegistro(event) {
    event.preventDefault(); 

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se guardará el registro de labor.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Sí, guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit(); 
        }
    });
}
</script>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>
