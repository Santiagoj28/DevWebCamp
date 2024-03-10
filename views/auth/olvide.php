<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Recupera tu acceso a  DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/olvide" class="formulario" method="POST" novalidate>
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
            type="email"
            name="email"
            id="email"
            class="formulario__input"
            placeholder="Tu Email"
            >
        </div>


        <input type="submit" class="formulario__submit" value="Enviar instrucciones">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta?Iniciar sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes cuenta?Obtener una</a>
    </div>


</main>