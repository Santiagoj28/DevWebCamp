<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Crear Cuenta en DevWebcamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/registro" class="formulario" method="POST">
         
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input 
            type="text"
            name="nombre"
            id="nombre"
            class="formulario__input"
            placeholder="Tu Nombre"
            value="<?php echo $usuario->nombre ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input 
            type="text"
            name="apellido"
            id="apellido"
            class="formulario__input"
            placeholder="Tu Apellido"
            value="<?php echo $usuario->apellido ?>"
            >
        </div>

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

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input 
            type="password"
            name="password"
            id="password"
            class="formulario__input"
            placeholder="Tu Password"
            >
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirmar password</label>
            <input 
            type="password"
            name="password2"
            id="password2"
            class="formulario__input"
            placeholder="Repetir Password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Crear cuenta">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta?Iniciar Sesion</a>
        <a href="/olvide" class="acciones__enlace">Olvidé mi password</a>
    </div>


</main>