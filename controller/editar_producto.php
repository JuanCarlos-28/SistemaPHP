<?php 
    include("model/db.php");

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Obtener datos del formulario
    $id = $_GET['id'];
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $editorial = $_POST["editorial"];
    $categoria = $_POST["categoria"];
    $fechaPublicacion = $_POST["fechaPublicacion"];
    $isbn = $_POST["isbn"];

    // Consulta preparada para obtener la ruta de imagen actual antes de la actualización
    $querySelectImagen = $con->prepare("SELECT url_libro FROM libros WHERE id_libro = ?");
    $querySelectImagen->bind_param("i", $id);
    $querySelectImagen->execute();
    $querySelectImagen->bind_result($imagenActual);
    $querySelectImagen->fetch();
    $querySelectImagen->close();

    // Inicializar la variable para el nombre de la imagen
    $imagen_nombre = $imagenActual; // Inicializar con el valor actual

    // Verificar si se ha subido un nuevo archivo de imagen
    if (!empty($_FILES["imagen"]["name"])) {
        // Nuevo archivo de imagen proporcionado
        $imagen_nombre = $_FILES["imagen"]["name"]; // Nombre
        $imagen_temporal = $_FILES["imagen"]["tmp_name"]; // Imagen
        $ruta_destino = "./img/" . $imagen_nombre;  // Ruta

        // Guardar la nueva imagen en la carpeta img
        move_uploaded_file($imagen_temporal, $ruta_destino);
    }

    // Consulta preparada para UPDATE
    $query = $con->prepare("UPDATE libros SET titulo_libro=?, id_autor=?, id_editorial=?, id_categoria=?, fecha_publicacion=?, isbn=?, url_libro=? WHERE id_libro=?");

    // Vincular los parámetros
    $query->bind_param("ssdissii", $titulo, $autor, $editorial, $categoria, $fechaPublicacion, $isbn, $imagen_nombre, $id);

    // Ejecutar la actualización
    if ($query->execute()) {
        // Si se proporciona un nuevo archivo de imagen y había una imagen anterior, eliminar la imagen anterior
        if (!empty($_FILES["imagen"]["name"]) && !empty($imagenActual)) {
            $ruta_imagen_anterior = "./img/" . $imagenActual;
            if (file_exists($ruta_imagen_anterior)) {
                unlink($ruta_imagen_anterior);
            }
        }

        echo "Datos actualizados correctamente";
        header("refresh:2;url=./index.php");
    } else {
        echo "Error al actualizar datos: " . $con->error;
    }

    // Cerrar la conexión a la base de datos u otras tareas necesarias
    $query->close();
    $con->close();
?>
