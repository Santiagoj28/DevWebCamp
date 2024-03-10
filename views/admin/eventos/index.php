<h2 class="dashboard__heading"><?php  echo $titulo ; ?> </h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Agregar Evento
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Evento</th>
                    <th scope="col" class="table__th">Categoria</th>
                    <th scope="col" class="table__th">Dia Y Hora</th>
                    <th scope="col" class="table__th">Ponentes</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
                <?php foreach($eventos as $evento) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $evento->nombre ?>
                        </td>

                        <td class="table__td">
                            <?php echo $evento->categoria->nombre; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $evento->dia->nombre . ', ' .  $evento->hora->hora ?>
                        </td>
                        <td class="table__td">
                            <?php echo $evento->ponente->nombre. ' ' .  $evento->ponente->apellido ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/eventos/editar?id=<?php echo $evento->id; ?> ">
                            <i class="fa-solid fa-pencil"></i>
                            Editar</a>
                            <form action="/admin/eventos/eliminar" class="table__formulario" method="POST">
                                <input type="hidden" name="id" value="<?php echo $evento->id ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                
                    </tr>

                   
                <?php } ?>    
            <tbody>

            </tbody>
        </table>
     
    <?php }else { ?>
        <p class="text-center">No hay ponentes</p>
    <?php } ?>    
</div>

<?php 
    echo $paginacion 
?>