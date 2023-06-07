<div class="contenedor olvide">
<?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Reestablece tu Password</p>

        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <form action="/olvide" class="formulario" method="POST">
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
            <input type="submit" class="boton" value="Enviar">
        </form>
        <div class="acciones">
            <a href="/">Ya tienes una cuenta? Iniciar sesión.</a>
            <a href="/crear">Aún no tienes una cuenta? Crea una.</a>
        </div>
    </div> <!-- contenedor-sm -->
</div>