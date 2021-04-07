<section>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <form action="iniciar.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            <a href="usuarios/usuarioscreate.php" class="btn btn-primary">Registrarse</a>
        </form>
    </div>
</section>