<?php include("includes/header.php"); ?>
<?php include("./model/db.php") ?>
<?php 
    // Verificar qué botón se ha presionado
    if (isset($_POST['btnAgregar'])) {
        include("./controller/agregar_editorial.php");
    }

?>
<form id="formulario" class="formulario" method="POST" enctype="multipart/form-data" style="width: min(40rem, 100%)">


    <div class="camposEditorial">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Introduzca un Nombre" style="margin-bottom: 1rem;">
        </div>
    </div>

    <div class="camposEditorial">
        <div class="campo">
            <label for="direccion">Direccion</label>
            <input type="text" id="direccion" name="direccion" placeholder="Introduzca un direccion" style="margin-bottom: 1rem;">
        </div>
    </div>

    <div class="camposEditorial">
        <div class="campo">
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" placeholder="Introduzca un correo" style="margin-bottom: 1rem;">
        </div>
    </div>

    <div class="botones">
        <a type="button" class="btnRegresar" href="./index.php">Ir a panel Principal</a>
        <button type="button" class="btnLimpiar" name="btnLimpiar" onclick="limpiarFormulario()">Limpiar</button>
        <button type="submit" class="btnAgregar" name="btnAgregar" value="ok">Agregar</button>
        
    </div>

</form>

<script>
    
    function actualizarImg() {
        const $inputfile = document.querySelector('#imagen');
        const $imgFormulario = document.querySelector('#imgFormulario');
        const $imagenName = document.querySelector('#imagenName');

        // Escuchar cuando cambie
        $inputfile.addEventListener('change', () => {
            const files = $inputfile.files;

            if (!files || !files.length) {
                $imgFormulario.src = "";
                $imgFormulario.style.display = "none";
                $imagenName.textContent = "No se han seleccionado archivos";
                return;
            }
            
            const archivoInicial = files[0];
            const url = URL.createObjectURL(archivoInicial);
            $imgFormulario.src = url;
            $imgFormulario.style.display = "block";
            $imagenName.textContent = archivoInicial.name;
        });
    }

    function limpiarFormulario() {
        const nombre = document.getElementById('nombre');
        const direccion = document.getElementById('direccion');
        const correo = document.getElementById('correo');

        nombre.value = "";
        direccion.value = "";
        correo.value = "";

    }

</script>

