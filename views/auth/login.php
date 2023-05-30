<div class="contenedor">
    <h1>UpTask</h1>
    <p>Crea y administra tus proyectos</p>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesión</p>

        <form action="/" class="formulario" method="POST">
            <div class="campo">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    placeholder="Tu E-mail"
                    name="email"
                    value=""
                />
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    placeholder="Tu Password"
                    name="password"
                    value=""
                />
            </div>

            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>

        <div class="acciones">
            <a href="/crear">Aún no tienes una cuenta? Crea una.</a>
            <a href="/olvide">Olvidaste tu password?</a>
        </div>
    </div> <!-- contenedor-sm -->
</div>