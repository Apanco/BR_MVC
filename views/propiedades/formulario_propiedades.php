<fieldset>
    <legend>Informacion general</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la propiedad" value="<?php 
        echo s($propiedad->titulo);
    ?>">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('titulo')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            }
            
        }
    ?>


    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php 
        echo s($propiedad->precio);
    ?>">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('precio')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpg image/png" name="imagen">
    <?php
        if($propiedad->imagen && $isReload){
            ?>
                <img class="imagen-small" src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="">
            <?php
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('imagen')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id="descripcion"><?php 
        echo s($propiedad->descripcion);
    ?></textarea>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('descripcion')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>

</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input 
    type="number" 
    id="habitaciones" 
    placeholder="Ej. 3" 
    min="1" 
    max="10" 
    name="habitaciones" 
    value="<?php 
        echo s($propiedad->habitaciones);
    ?>">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('habitaciones')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>

    <label for="wc">Baños</label>
    <input 
    type="number" 
    id="wc" 
    placeholder="Ej. 2" 
    min="1" 
    max="10" 
    name="wc" 
    value="<?php 
        echo s($propiedad->wc);
    ?>">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('wc')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>
    
    <label for="estacionamiento">Estacionamiento</label>
    <input 
    type="number" 
    id="estacionamiento" 
    placeholder="Ej. 4" 
    min="0" 
    max="10" 
    name="estacionamiento" 
    value="<?php 
        echo s($propiedad->estacionamiento);
    ?>">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($propiedad->getError('estacionamiento')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            } 
        }
    ?>

</fieldset>

<fieldset>
    <legend>Informacion del vendedor</legend>
        <select name="vendedores_id" id="">
            <option value="" selected disabled >--Seleccione--</option>
            <?php foreach ($vendedores as $vendedor): ?>
                <option 
                <?php
                    echo $propiedad->vendedores_id == $vendedor->id ?'selected' : '';
                ?>

                value="<?php echo $vendedor->id; ?>"> 
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
                </option>
e
            <?php endforeach; ?>


        </select>
        <?php
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($propiedad->getError('vendedores_id')){
                    ?>
                        <div class="campo-obligatorio">
                            <p>Este campo es obligatorio</p>
                        </div>
                    <?php
                } 
            }
        ?>
</fieldset>
