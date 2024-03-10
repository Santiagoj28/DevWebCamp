<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia sesion en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" action="/login" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
            type="email"
            name="email"
            id="email"
            class="formulario__input"
            placeholder="Tu email"
            >
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input 
            type="password"
            name="password"
            id="password"
            class="formulario__input"
            placeholder="Tu password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar sesion">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes cuenta?Obtener una</a>
        <a href="/olvide" class="acciones__enlace">Olvidé mi password</a>
    </div>


</main>