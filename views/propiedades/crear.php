<main class = "contenedor seccion">
    <h1 class = "espacio-arriba">Crear propiedad</h1>
    <?php incluirBotones('volver', '/admin', 'naranja'); ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear propiedad" class="boton-verde">
    </form>
</main>