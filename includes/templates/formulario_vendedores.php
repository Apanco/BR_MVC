<fieldset>
    <legend>Informacion general</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre);?>">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($vendedor->getError('nombre')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            }
            
        }
    ?>
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido del vendedor" value="<?php echo s($vendedor->apellido);?>">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($vendedor->getError('apellido')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            }
            
        }
    ?>
    <label for="telefono">Telefono</label>
    <input type="number" id="telefono" name="telefono" placeholder="Telefono del vendedor" value="<?php echo s($vendedor->telefono);?>">
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($vendedor->getError('telefono')){
                ?>
                    <div class="campo-obligatorio">
                        <p>Este campo es obligatorio</p>
                    </div>
                <?php
            }
            else if(!$vendedor->validarNumero()){
                ?>
                    <div class="campo-obligatorio">
                        <p>Ingrese un numero valido</p>
                    </div>
                <?php
            }
            
        }
    ?>
</fieldset>