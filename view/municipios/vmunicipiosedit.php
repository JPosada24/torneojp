<section>
    <div class="container">
        <h1>Actualizar Municipio</h1>
        <form method="POST" action="municipiosupdate.php">
            <div class="mb-3">
                <label for="id" class="form-label">Id del municipio</label>
                <input type="number" class="form-control" id="id" name="id" value="<?= $municipio->id ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del municipio</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $municipio->nombre ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</section>