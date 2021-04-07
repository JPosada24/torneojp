<section>
    <div class="container">

        <?php if (isset($_GET["accion"])) { ?>
        <div class="<?= $clase ?>" role="alert">
            <?= $mensaje ?>
        </div>
        <?php } ?>

        <h1>Listado de equipos</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">D.T</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo) 
                { ?>
                <tr>
                    <td><?= $equipo->id  ?></td>
                    <td><?= $equipo->nombre ?></td>
                    <td><?= $equipo->dt ?></td>
                    <td><?= $equipo->municipio_nombre ?></td>
                    <td>
                        <a class="btn btn-primary" href="equiposedit.php?id=<?= $equipo->id ?>" role="button">Actualizar</a>
                        <a class="btn btn-danger" href="equiposdestroy.php?id=<?= $equipo->id ?>" role="button">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>