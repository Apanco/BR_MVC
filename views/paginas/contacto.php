<?php
if($resultado =="1"){
    alertaDinamica("Enviado exitosamente", "El correo se ha mandado exitosamente", "verde");
}
if($resultado == "2"){
    alertaDinamica("Error", "El correo no se pudo enviar", "rojo");
}

?>

<main class="contenedor seccion contenido-centrado">
    <h1 class="espacio-arriba">Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen de contacto" loading="lazy">
    </picture>

    <h2>LLene el formulario de contacto</h2>
    <form action="" class="formulario" method="POST">
        <fieldset>
            <legend>Informacion personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>--Seleccione--</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" placeholder="Tu presio o presupuesto" id="presupuesto" name="contacto[precio]" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >
                
                <label for="contactar-email">Email</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
            </div>

            <div class="espacio-arriba-min" id="contacto">

            </div>
            
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>


</main>