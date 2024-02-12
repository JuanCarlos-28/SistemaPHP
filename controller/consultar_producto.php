<?php 
include("model/db.php");
include("includes/header.php");

function consultarLibro($con, $id) {

    $sql = "SELECT id_libro, titulo_libro, libros.id_autor, nombre_autor, libros.id_editorial, nombre_editorial, id_categoria, fecha_publicacion, isbn FROM libros inner join autores on autores.id_autor = libros.id_autor inner join editoriales on editoriales.id_editorial = libros.id_editorial  WHERE id_libro = ?";
    // Preparar la sentencia
    $stmt = $con->prepare($sql);
    // Vincular el parámetro
    $stmt->bind_param("i", $id);
    // Ejecutar la consulta
    $stmt->execute();
    // Obtener el resultado
    $result = $stmt->get_result();
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {

        $libro = $result->fetch_assoc();
        return $libro;
    } else {

        throw new Exception("El producto no existe en la base de datos.");
    }
}

try {

    $id = $_GET['id'];

    $libro = consultarLibro($con, $id);

} catch (Exception $e) {

    echo $e->getMessage();
}
?>
