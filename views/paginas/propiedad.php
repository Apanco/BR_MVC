<main class="contenedor seccion contenido-centrado">
    <h1 class="espacio-arriba"><?php echo $propiedad->titulo; ?></h1>
    <?php incluirBotones('volver', 'anuncios', 'naranja'); ?>
        <img class="espacio-arriba" src="imagenes/<?php echo $propiedad->imagen;  ?>" alt="Imagen propiedad" loading="lazy">
    <div class="resumen-propiedad">
        <p class="precio"><?php
        $precio_string = $propiedad->precio;
        $partes = explode('.', $precio_string);//Divide en dos partes el string, lo divide usando el punto
        $precio_entero = number_format(intval($partes[0]), 0, '.', ',');//A la parte entera lo divide con comas
        $precio_formateado = $precio_entero . "." . $partes[1];//concatena con la parte decimal
        echo "$ ".$precio_formateado;

        ?>
        </p>
        <ul class="iconos-caracteristicas individual">
            <li>
                <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorios" loading="lazy">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" loading="lazy">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" loading="lazy">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
        </ul>
        <p>
            <?php echo $propiedad->descripcion; ?>
        </p>
    </div>
</main>