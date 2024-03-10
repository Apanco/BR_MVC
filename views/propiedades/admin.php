<?php
if($resultado){
    if($resultado =="1"){
        alertaExito();
    }
    if($resultado == "2"){
        alertaActualizado();
    }
    if($resultado == "3"){
        alertaEliminado();
    }
    if($resultado == "4"){
        vendedorEliminado();
    }
    if($resultado == "5"){
        vendedorCreado();
    }
    if($resultado == "6"){
        vendedorActualizado();
    }
}
?>
<main class = "contenedor seccion minima-altura">
        <h1 class = "espacio-arriba">Administrador</h1>
        <h2>Propiedades</h2>
        <div class="contenedor-cartas">
            <!-- Carta 1 -->
            <a class="carta" href="/propiedades/crear">
                <div>
                    <div class="contenedor-icono-carta">
                        <i class="icono-carta fa-regular fa-square-plus"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Aqui se muestran los resultados -->
        <div class="propiedades">
            <?php
                $n=0;
                foreach($propiedades as $propiedad):
                    $n++;
            ?>
            <div class="propiedad">
                <div class="propiedad-id"><p><?php echo $propiedad->id; ?></p></div>
                <div class="propiedad-imagen"><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen propiedad"></div>
                <div class="propiedad-contenido">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p>Precio: <span  class="precio">  $<?php //Codigo que hace que el precio se imprima dividido cada 3 cifras
                    $precio_string = $propiedad->precio;
                    $partes = explode('.', $precio_string);//Divide en dos partes el string, lo divide usando el punto
                    $precio_entero = number_format(intval($partes[0]), 0, '.', ',');//A la parte entera lo divide con comas
                    $precio_formateado = $precio_entero . "." . $partes[1];//concatena con la parte decimal
                    echo $precio_formateado; 

                    ?></span></p>
                </div>
                <div class="propiedad-acciones">
                    <div><a class="boton-accion actualizar" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>
                    "><i class="icono-carta fa-solid fa-pen"></i>Actualizar</a></div>
                    <div>
                        <a class="boton-accion eliminar" href=""><i class="icono-carta fa-solid fa-trash"></i>Eliminar
                            <form method="POST" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="capa-submit" value="">
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; 
                if($n==0){
                    ?>
                    <div class="vacio">
                        <p>Aun no hay propiedades publicadas</p>
                    </div>
                    <?php
                }
            ?>
        </div>
        <h2>Vendedores</h2>
        <div class="contenedor-cartas">
            <!-- Carta 1 -->
            <a class="carta" href="vendedores/crear">
                <div>
                    <div class="contenedor-icono-carta">
                        <i class="icono-carta fa-regular fa-square-plus"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="vendedores">

            <?php
                $n=0;
                foreach($vendedores as $vendedor):
                    $n++;
            ?>
            <div class="vendedor">
                <div class="vendedor-id"><p><?php echo $vendedor->id; ?></p></div>
                <div class="propiedad-contenido">
                    <h3 class="important"><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></h3>
                    <p>Telefono:  <span class="telefono"> <?php echo $vendedor->telefono; ?></span></p>
                </div>
                <div class="propiedad-acciones">
                    <div><a class="boton-accion actualizar" href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>
                    "><i class="icono-carta fa-solid fa-pen"></i>Actualizar</a></div>
                    <div>
                        <a class="boton-accion eliminar" href=""><i class="icono-carta fa-solid fa-trash"></i>Eliminar
                            <form method="POST" action="/vendedores/eliminar">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="capa-submit" value="">
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; 
                if($n==0){
                    ?>
                    <div class="vacio">
                        <p>Aun no hay propiedades publicadas</p>
                    </div>
                    <?php
                }
            ?>
        </div>
</main>