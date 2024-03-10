<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>
    <div class="formulario__campo">
        <label  class="formulario__label" form="nombre">Nombre</label>
        <input type="text"
        class="formulario__input"
        id="nombre"
        name="nombre"
        placeholder="Nombre Ponente"
        value="<?php echo $ponente->nombre ?? '';?>">
    </div>

    <div class="formulario__campo">
        <label  class="formulario__label" form="apellido">Apellido</label>
        <input type="text"
        class="formulario__input"
        id="apellido"
        name="apellido"
        placeholder="Apellido Ponente"
        value="<?php echo $ponente->apellido ?? '';?>">
    </div>

    <div class="formulario__campo">
        <label  class="formulario__label" form="ciudad">Ciudad</label>
        <input type="text"
        class="formulario__input"
        id="ciudad"
        name="ciudad"
        placeholder="Ciudad Ponente"
        value="<?php echo $ponente->ciudad ?? '';?>">
    </div>

    <div class="formulario__campo">
        <label  class="formulario__label" form="pais">Pais</label>
        <input type="text"
        class="formulario__input"
        id="pais"
        name="pais"
        placeholder="Pais Ponente"
        value="<?php echo $ponente->ciudad ?? '';?>">
    </div>

    <div class="formulario__campo">
        <label  class="formulario__label" form="imagen">Imagen</label>
        <input type="file"
        class="formulario__input  formulario__input--file"
        id="imagen"
        name="imagen"
      >
    </div>
    <?php if(isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'].'/img/speakers/'.$ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'].'/img/speakers/'.$ponente->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'].'/img/speakers/'.$ponente->imagen; ?>.png" alt="imagen ponente">

            </picture>
        </div>
       <?php } ?>  
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>
        <div class="formulario__campo">
            <label  class="formulario__label" form="tags_input">Areas de Experiencia(separadas por coma)</label>
            <input type="text"
            class="formulario__input"
            id="tags_input"
            placeholder="Ej:Node.js,PHP,Python,Laravel,CSS,Javascript,Java,etc..">
            <div id="tags" class="formulario__listado"></div>
            <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
            
        </div>

    </legend>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes</legend>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[facebook]"
            placeholder="Facebook"
            value="<?php echo $redes->facebook ?? ''; ?>"
            
            >
        </div>

        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[instagram]"
            placeholder="Instagram"
            value="<?php echo $redes->instagram ?? ''; ?>"
            >
        </div>

        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[twitter]"
            placeholder="Twitter"
            value="<?php echo $redes->Twitter ?? ''; ?>"
            >
        </div>

        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[youtube]"
            placeholder="Youtube"
            value="<?php echo $redes->youtube ?? ''; ?>"
            >
        </div>

        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[tiktok]"
            placeholder="Tikok"
            value="<?php echo $redes->tiktok ?? ''; ?>"
            >
        </div>

        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text"
            class="formulario__input--sociales"
            name="redes[github]"
            placeholder="Github"
            value="<?php echo $redes->github ?? ''; ?>"
            >
        </div>
        
    </div>

    </legend>
</fieldset>






