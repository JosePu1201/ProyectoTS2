<h1>No se encontraron registsssros.</h1>
<?php
include '/Model/configServer.php';
include '/Model/consulSQL.php';

$consulta = ejecutarSQL::consultar("
SELECT
    ID,
    Descripcion,
    Estado,
    Precio,
    Ubicacion,
    Publicador
FROM
    Publicacion
ORDER BY
    ID
");

echo "<h1>No se adadsdasdasdsa registros.</h1>";
if ($consulta) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        echo "<div class='post'>";
        echo "<div class='post-header'>";
        echo "<h2>" . $fila['Descripcion'] . "</h2>";
        echo "</div>";
        echo "<div class='post-body'>";
        echo "<p>Categoría: " . $fila['NombreCategoria'] . "</p>";
        echo "<p>Estado: " . $fila['Estado'] . "</p>";
        echo "<p>Precio: " . $fila['Precio'] . "</p>";
        echo "<p>Ubicación: " . $fila['Ubicacion'] . "</p>";
        echo "</div>";
        echo "<div class='post-footer'>";
        echo "<button type='button'>Me gusta</button>";
        echo "<button type='button'>Comentar</button>";
        echo "<button type='button'>Compartir</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h1>No se encontraron registros.</h1>";
}
?>
<h1>fin.</h1>