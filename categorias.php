<?php include("includes/header.php"); ?>
<?php include("./model/db.php") ?>
<?php 
    // Verificar qué botón se ha presionado
    if (isset($_POST['btnAgregar'])) {
        include("./controller/agregar_categoria.php");
    }

?>
<form id="formulario" class="formulario" method="POST" enctype="multipart/form-data" style="width: min(40rem, 100%)">


    <div class="camposCategoria">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Introduzca un Nombre" style="margin-bottom: 1rem;">
        </div>
    </div>

    <div class="botones">
        <a type="button" class="btnRegresar" href="./index.php">Ir a panel Principal</a>
        <button type="button" class="btnLimpiar" name="btnLimpiar" onclick="limpiarFormulario()">Limpiar</button>
        <button type="submit" class="btnAgregar" name="btnAgregar" value="ok">Agregar</button>
        
    </div>

</form>

<script>

    function limpiarFormulario() {
        const nombre = document.getElementById('nombre');

        nombre.value = "";

    }

</script>

