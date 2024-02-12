<?php include("./model/db.php") ?>

<?php include("includes/header.php") ?>

    <!-- Sidebar -->
    <div class="contenedor">

        <div class="sidebar">
            <!-- Puedes añadir contenido adicional al sidebar si es necesario -->
            <h2> Libros </h2>
            <p> Administra tus Libros </p>
            <nav>
                <a href="./index.php">Libros</a>
                <a href="./nuevoLibro.php">Nuevo Libro</a>
                <a href="./autores.php">Autores</a>
                <a href="./editoriales.php">Editoriales</a>
                <a href="./categorias.php">Categorias</a>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h1 class="titulo">Admin de tienda en linea</h1>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Categoría</th>
                        <th>Fecha Publicación</th>
                        <th>ISBN</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                    
                        $query = "  SELECT 
                                        id_libro, 
                                        titulo_libro, 
                                        url_libro, 
                                        autores.nombre_autor as nombre_autor, 
                                        editoriales.nombre_editorial as nombre_editorial, 
                                        categorias.nombre_categoria as nombre_categoria, 
                                        fecha_publicacion, 
                                        isbn 
                                    FROM libros 
                                    INNER JOIN autores ON libros.id_autor = autores.id_autor 
                                    INNER JOIN editoriales ON libros.id_editorial = editoriales.id_editorial 
                                    INNER JOIN categorias ON libros.id_categoria = categorias.id_categoria;";
                        $result_libros = mysqli_query($con, $query);

                        while($row = mysqli_fetch_array($result_libros)) { ?>
                            <tr>
                                <td> <?php echo $row['titulo_libro'] ?> </td>
                                <td> <?php echo $row['nombre_autor'] ?> </td>
                                <td> <?php echo $row['nombre_editorial'] ?> </td>
                                <td> <?php echo $row['nombre_categoria'] ?> </td>
                                <td> <?php echo $row['fecha_publicacion'] ?> </td>
                                <td> <?php echo $row['isbn'] ?> </td>
                                <td>
                                    <div>
                                        <a href="./modificarProducto.php?id=<?php echo $row['id_libro'] ?>">
                                            <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/4FC3CF/edit--v1.png" alt="edit--v1"/>
                                        </a>
                                        <a href="./controller/eliminar_producto.php?id=<?php echo $row['id_libro'] ?>">
                                            <img width="24" height="24" src="https://img.icons8.com/material-rounded/24/ED1313/delete.png" alt="delete"/>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        
                </tbody>
            </table>
        </div>
    </div>


    

    
