<section>
    <div class="container">

        <?php if (isset($_GET["accion"])) { ?>
        <div class="<?= $clase ?>" role="alert">
            <?= $mensaje ?>
        </div>
        <?php } ?>

        <h1>Listado de municipios</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($municipios as $municipio) 
                { ?>
                <tr>
                    <td><?= $municipio->id  ?></td>
                    <td><?= $municipio->nombre ?></td>
                    <td>
                        <a class="btn btn-primary" href="municipiosedit.php?id=<?= $municipio->id ?>" role="button">Actualizar</a>
                        <a class="btn btn-danger" href="municipiosdestroy.php?id=<?= $municipio->id ?>" role="button">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>