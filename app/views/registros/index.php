<?php require_once __DIR__ . "/../layout/header.php"; ?>

<?php session_start(); ?>

<?php if (isset($_SESSION["success"])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '<?= $_SESSION["success"] ?>',
            confirmButtonColor: '#28a745',
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


<div class="card">
    <div class="card-header">
        <h3>Registros de Labores</h3>
    </div>
    <div class="card-body">
        <a href="/p-php/prueba-php/public/registros/create" class="btn btn-primary mb-3">Nuevo Registro</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Labor</th>
                    <th>Lote</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Tarifa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?= $registro["labor"] ?></td>
                        <td><?= $registro["lote"] ?></td>
                        <!-- <td><?= $registro["empleado"] ?></td> -->
                        <td><?= $registro["empleado_nombre"] ?></td>
                        <td><?= $registro["fecha"] ?></td>
                        <td><?= $registro["cantidad"] ?></td>
                        <td><?= $registro["tarifa"] ?> $ </td>
                        <td>
                            <button onclick="window.location.href='/p-php/prueba-php/public/registros/edit/<?= $registro['id'] ?>'" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button onclick="confirmarEliminar(<?= $registro['id'] ?>)" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmarEliminar(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/p-php/prueba-php/public/registros/delete/" + id;
        }
    });
}
</script>


<?php require_once __DIR__ . "/../layout/footer.php"; ?>
