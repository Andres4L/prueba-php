<?php require_once __DIR__ . "/../layout/header.php"; ?>

<div class="card">
    <div class="card-header">
        <h3>Lista de Lotes</h3>
    </div>
    <div class="card-body">
        <a href="/p-php/prueba-php/public/lotes/create" class="btn btn-primary mb-3">Nuevo Lote</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lotes as $lote): ?>
                    <tr>
                        <td><?= $lote["id"] ?></td>
                        <td><?= $lote["nombre"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . "/../layout/footer.php"; ?>
