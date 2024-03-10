<main class = "contenedor seccion">
    <h1 class = "espacio-arriba">Registrar nuevo vendedor</h1>
    <!-- <a class="boton-amarillo" href="../index.php">Volver</a> -->
    <?php incluirBotones('volver', '/admin', 'naranja'); ?>

    <form class="formulario" method="POST">
        <?php include __DIR__ . '/formulario_vendedores.php'; ?>
        <input type="submit" value="Registrar vendedor" class="boton-verde">
    </form>
</main>