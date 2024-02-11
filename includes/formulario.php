<?php include("./controller/crud.php") ?>


<form id="formulario" class="formulario" method="POST" enctype="multipart/form-data">


    <div class="campos">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($producto['nombre_producto']) ? $producto['nombre_producto'] : ''; ?>" placeholder="Introduzca un Nombre">
        </div>

        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="<?php echo isset($producto['precio_producto']) ? $producto['precio_producto'] : ''; ?>" placeholder="Introduzca el precio">
        </div>

        <div class="campo">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Agregue una descripcion breve del producto"><?php echo isset($producto['descripcion_producto']) ? $producto['descripcion_producto'] : ''; ?></textarea>
        </div>

        <div class="campo">
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo isset($producto['cantidad_producto']) ? $producto['cantidad_producto'] : ''; ?>" placeholder="Introduzca la cantidad existente">
        </div>

        <div class="campo">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" name="categoria">
                <option value="0" disabled selected>Seleccione una Categoria</option>
                <?php
            
                    $query = "SELECT * FROM categorias";
                    $result_products = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_products)) { ?>
                        <option <?php echo (isset($producto['id_categoria']) && $producto['id_categoria'] == $row['id_categoria']) ? 'selected' : ''; ?> value="<?php echo $row['id_categoria']; ?>" > <?php echo $row['nombre_categoria']; ?> </option>
                    <?php } ?>
            </select>
        </div>

        <div class="campo">
            <label for="proveedor">Proveedor</label>
            <select name="proveedor" id="proveedor" name="proveedor">
                <option value="0" disabled selected>Seleccione un Proveedor</option>
                <?php
            
                    $query = "SELECT * FROM proveedores";
                    $result_products = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_products)) { ?>
                        <option <?php echo (isset($producto['id_proveedor']) && $producto['id_proveedor'] == $row['id_proveedor']) ? 'selected' : ''; ?> value="<?php echo $row['id_proveedor']; ?>" > <?php echo $row['nombre_proveedor']; ?> </option>
                    <?php } ?>
            </select>
        </div>

        <div class="campo">
            <div class="imagenPreview" id="imagenContainer">
                <img id="imgPreview" src="#" height="200" class="none" alt="Imagen introducida" />
            </div>
            <label>Imagen:</label>
            <div class="input-image">
                <label for="imagen" class="input-file">
                    <input type="file" class="none" name="imagen" id="imagen" accept="image/*" onclick="actualizarImg()"/>
                    Seleccione un archivo
                </label>
                <div class="input-name" id="imagenName">No se han seleccionado archivos</div>
            </div>
            <img id="imgFormulario" alt="Selected Image" src="./img/<?php echo isset($producto['url_producto']) ? $producto['url_producto'] : ''; ?>" <?php echo isset($producto['url_producto']) ? '' : 'hidden'; ?> width="300" style="margin: 1rem auto;" />
        </div>

        <div class="campo consultarProducto" style="margin: 3rem 0 2rem 0;">
            <div style="width: 14rem; margin-right: 4rem;" >
                <label for="idProducto">Consultar por ID</label>
                <input type="number" id="idProducto" name="idProducto" placeholder="Introduzca un ID">
            </div>
            <button class="btnConsultar" name="btnConsultar" style="" >Consultar</button>
        </div>

    </div>

    <div class="botones">
        <button type="button" class="btnLimpiar" name="btnLimpiar" onclick="limpiarFormulario()">Limpiar</button>
        <button type="submit" class="btnAgregar" name="btnAgregar" value="ok">Agregar</button>
        <button class="btnModificar" name="btnModificar">Modificar</button>
        <button class="btnEliminar" name="btnEliminar">Eliminar</button>
        
    </div>

    <input hidden id="id" name="id" type="text" value="<?php echo isset($producto['id_producto']) ? $producto['id_producto'] : ''; ?>" >
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
        const precio = document.getElementById('precio');
        const descripcion = document.getElementById('descripcion');
        const cantidad = document.getElementById('cantidad');
        const categoria = document.getElementById('categoria');
        const proveedor = document.getElementById('proveedor');
        const idProducto = document.getElementById('idProducto');
        const imgFormulario = document.getElementById('imgFormulario');

        nombre.value = '';
        precio.value = '';
        descripcion.value = '';
        cantidad.value = '';
        categoria.value = "0";
        proveedor.value = "0";
        idProducto.value = '';
        imgFormulario.remove();

    }

</script>

