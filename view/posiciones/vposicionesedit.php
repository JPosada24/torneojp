<section>
    <div class="container">
        <h1>Actualizar Municipio</h1>
        <form method="POST" action="posicionesupdate.php">
            <div class="mb-3">
                <label for="id" class="form-label">Id de la posición</label>
                <input type="number" class="form-control" id="id" name="id" value="<?= $posicion->id ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Posición</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $posicion->nombre ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>