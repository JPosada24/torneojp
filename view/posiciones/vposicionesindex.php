<section>
    <div class="container">

        <?php if (isset($_GET["accion"])) { ?>
        <div class="<?= $clase ?>" role="alert">
            <?= $mensaje ?>
        </div>
        <?php } ?>

        <h1>Listado de Posiciones</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Posición</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posiciones as $posicion) 
                { ?>
                <tr>
                    <td><?= $posicion->id  ?></td>
                    <td><?= $posicion->nombre ?></td>
                    <td>
                        <a class="btn btn-primary" href="posicionesedit.php?id=<?= $posicion->id ?>" role="button">Actualizar</a>
                        <a class="btn btn-danger" href="posicionesdestroy.php?id=<?= $posicion->id ?>" role="button">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>