<section>
    <div class="container">
        <h1>Insertar Equipo</h1>
        <form method="POST" action="equiposstore.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del equipo</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="dt" class="form-label">Director Técnico</label>
                <input type="text" class="form-control" id="dt" name="dt">
            </div>
            <div class="mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <select class="form-select" aria-label="Default select example" name="municipio" id="municipio">
                    <?php foreach ($municipios as $municipio) { ?>
                    <option value="<?= $municipio->id ?>"><?= $municipio->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
        </form>
    </div>
</section>