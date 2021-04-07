<section>
    <div class="container">
        <h1>Insertar Jugador</h1>
        <form method="POST" action="jugadoresstore.php">
            <div class="mb-3">
                <label for="documento" class="form-label">Documento: </label>
                <input type="text" class="form-control" id="documento" name="documento">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="equipo" class="form-label">Equipo: </label>
                <select class="form-select" aria-label="Default select example" name="equipo" id="equipo">
                    <?php foreach ($equipos as $equipo) { ?>
                    <option value="<?= $equipo->id ?>"><?= $equipo->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="posicion" class="form-label">Posición: </label>
                <select class="form-select" aria-label="Default select example" name="posicion" id="posicion">
                    <?php foreach ($posiciones as $posicion) { ?>
                    <option value="<?= $posicion->id ?>"><?= $posicion->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>
</section>