<div class="contenedor-anuncios">
        <?php foreach($propiedades as $propiedad): 
                $n++;
                if($n <= $limite):
                ?>
            <!-- Carta 1 ---    ---     --- -->
            <div class="anuncio">
                <div class="anuncio-imagen">
                    <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">
                </div>
                <div class="contenido-anuncio">
                    <div class="anuncio-titulo">
                        <h3><?php echo $propiedad->titulo; ?></h3>
                    </div>
                    
                    <p class="descripcion-anuncio"><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php
                    $precio_string = $propiedad->precio;
                    $partes = explode('.', $precio_string);//Divide en dos partes el string, lo divide usando el punto
                    $precio_entero = number_format(intval($partes[0]), 0, '.', ',');//A la parte entera lo divide con comas
                    $precio_formateado = $precio_entero . "." . $partes[1];//concatena con la parte decimal
                    echo "$ ".$precio_formateado;
                    ?></p>
                    <ul class="iconos-caracteristicas">
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
                    <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                        Ver propiedad
                    </a>
                </div>
            </div>
            <?php 
                endif;
            endforeach; ?>
        </div> 
<?php
?>