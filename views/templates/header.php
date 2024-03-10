<header class="header">
    <div class="header__contenedor">

        <nav class="header__navegacion"><!--NAV  !-->
          <?php if(isAuth()) {?>
            <a href="<?php echo isAdmin() ? '/admin/dashboard' : 'finalizar-registro'; ?>" class="header__enlace">Administrar</a>
            <form method="POST" action="/logout" class="header__form">
                <input type="submit" value="Cerrar sesion" class="header__submit">
            </form>
            <?php  } else { ?>
            <a href="/registro" class="header__enlace">Registro</a>
            <a href="/login" class="header__enlace">Iniciar Sesion</a>
            <?php } ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">&#60;DevWebCamp /></h1>
            </a>
            <p class="header__texto">Febrero 10-9 2024</p>
            <p class="header__texto header__texto--modalidad">En linea - Presencial</p>

            <a href="/registro" class="header__boton">Comprar pase</a>
        </div>


    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
       
           <a href="/" >
               <h2 class="barra__logo">
                 &#60;DevWebCamp />
               </h2>
           </a>
   
     <nav class="navegacion">
        <a href="/eventos" class="navegacion__enlace <?php echo paginaActual('/eventos') ? 'navegacion__enlace--actual':''; ?>">Evento</a>
        <a href="/paquetes"class="navegacion__enlace <?php echo paginaActual('/paquetes') ? 'navegacion__enlace--actual':''; ?> ">Paquetes</a>
        <a href="/workshop-conferencias"class="navegacion__enlace <?php echo paginaActual('/workshop-conferencias') ? 'navegacion__enlace--actual':''; ?>">Workshop / Conferencias</a>
        <a href="/registro"class="navegacion__enlace <?php echo paginaActual('/registro') ? 'navegacion__enlace--actual':''; ?>">Comprar pase</a>
     </nav>

    </div>

</div>