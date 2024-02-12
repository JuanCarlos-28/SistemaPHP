<?php include("includes/header.php"); ?>
<?php include("./model/db.php") ?>
<?php 
    // Verificar qué botón se ha presionado
    if (isset($_POST['btnAgregar'])) {
        include("./controller/agregar_producto.php");
    }

?>
<form id="formulario" class="formulario" method="POST" enctype="multipart/form-data">


    <div class="campos">
        <div class="campo">
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Introduzca un titulo">
        </div>

        <div class="campo">
            <label for="autor">Autor</label>
            <select name="autor" id="autor">
                <option value="0" disabled selected>Seleccione un autor</option>

                <?php
                    $query = "SELECT * FROM autores";
                    $result_libros = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_libros)) { ?>
                        <option <?php echo (isset($libro['id_autor']) && $libro['id_autor'] == $row['id_autor']) ? 'selected' : ''; ?> value="<?php echo $row['id_autor']; ?>" > <?php echo $row['nombre_autor']; ?> </option>
                <?php } ?>

            </select>
        </div>

        <div class="campo">
            <label for="editorial">Editorial</label>
            <select name="editorial" id="editorial">
                <option value="0" disabled selected>Seleccione una editorial</option>

                <?php
                    $query = "SELECT * FROM editoriales";
                    $result_libros = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_libros)) { ?>
                        <option <?php echo (isset($libro['id_editorial']) && $libro['id_editorial'] == $row['id_editorial']) ? 'selected' : ''; ?> value="<?php echo $row['id_editorial']; ?>" > <?php echo $row['nombre_editorial']; ?> </option>
                <?php } ?>

            </select>
        </div>

        <div class="campo">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <option value="0" disabled selected>Seleccione una Categoria</option>

                <?php
                    $query = "SELECT * FROM categorias";
                    $result_libros = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_libros)) { ?>
                        <option <?php echo (isset($libro['id_categoria']) && $libro['id_categoria'] == $row['id_categoria']) ? 'selected' : ''; ?> value="<?php echo $row['id_categoria']; ?>" > <?php echo $row['nombre_categoria']; ?> </option>
                <?php } ?>

            </select>
        </div>

        <div class="campo">
            <label for="fechaPublicacion">Fecha Publicacion</label>
            <input type="text" id="fechaPublicacion" name="fechaPublicacion" placeholder="Introduzca el fecha de publicacion">
        </div>

        <div class="campo">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" placeholder="Introduzca el  isbn">
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
        const titulo = document.getElementById('titulo');
        const autor = document.getElementById('autor');
        const editorial = document.getElementById('editorial');
        const categoria = document.getElementById('categoria');
        const fechaPublicacion = document.getElementById('fechaPublicacion');
        const isbn = document.getElementById('isbn');

        titulo.value = "";
        autor.value = "0";
        editorial.value = "0";
        categoria.value = "0";
        fechaPublicacion.value = "";
        isbn.value = "";


    }

</script>

