<section>
    <div class="container">
        <h1>Actualizar Jugador</h1>
        <form method="POST" action="jugadoresupdate.php">
            <div class="mb-3">
                <label for="id" class="form-label">Documento del jugador</label>
                <input type="number" class="form-control" id="id" name="id" value="<?= $jugador->documento ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del jugador</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $jugador->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label">Equipo</label>
                <select class="form-select" aria-label="Default select example" name="equipo" id="equipo">
                    <?php foreach ($equipos as $equipo) { ?>
                    <option value="<?= $equipo->id ?>"<?php if ($equipo->id == $jugador->equipo) echo "selected"?>><?= $equipo->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label">Posición</label>
                <select class="form-select" aria-label="Default select example" name="posicion" id="posicion">
                    <?php foreach ($posiciones as $posicion) { ?>
                    <option value="<?= $posicion->id ?>"<?php if ($posicion->id == $jugador->posicion) echo "selected"?>><?= $posicion->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>