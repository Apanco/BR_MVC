<main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <!-- Icono 1------------------------------------------- -->
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptate placeat impedit perspiciatis asperiores?
                    Odio commodi quas eveniet, nam incidunt perferendis illum a nisi consequuntur doloribus quibusdam saepe explicabo 
                    at!</p>
            </div>
            <!-- Icono 2------------------------------------------- -->
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptate placeat impedit perspiciatis asperiores?
                    Odio commodi quas eveniet, nam incidunt perferendis illum a nisi consequuntur doloribus quibusdam saepe explicabo 
                    at!</p>
            </div>
            <!-- Icono 3------------------------------------------- -->
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptate placeat impedit perspiciatis asperiores?
                    Odio commodi quas eveniet, nam incidunt perferendis illum a nisi consequuntur doloribus quibusdam saepe explicabo 
                    at!</p>
            </div>
        </div>
    </main>
    <!-- Seccion secundaria --------------------------------------------------------------------------------------------------- -->
    <section class="seccion contenedor">
        <h2>Casas y departamentos en venta</h2>
        
        <?php
            $limite=3;
            $n = 0;
            include 'listado.php';
        ?>
        
        <!-- Fin de contenedor anuncions -->
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>
    <!-- Tercera seccion----------------------------------------------------------------------------------------------------------- -->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario de contacto y un ascesor se pondra an contacto contigo a la brevedad</p>
        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>

    <!-- Cuarta Seccion ----------------------------------------------------------------------------------------------------------- -->

    <div class="contenedor seccion seccion-inferior">
        <!-- Entradas de blog -->
        <section class="blog">
            <h3>Nuestro blog</h3>

            <!-- Entrada 1 -->
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="Imagen blog 1" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el <span>13/01/2024</span> por <span>David Apanco</span></p>
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>
            <!-- Entrada 2 -->
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="Imagen blog 1" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el <span>13/01/2024</span> por <span>David Apanco</span></p>
                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu 
                        espacio</p>
                    </a>
                </div>
            </article>
        </section>

        <!-- Testimoniales -->
        <section class="Testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente manera, muy buena atencion y la casa que me ofrecieron cumplie con mis 
                    expectativas
                </blockquote>
                <p> - David Apanco</p>
            </div>
        </section>
    </div>