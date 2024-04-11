<?php
if (!$_SESSION['nombreUser'] == "") {
    include '../Model/configServer.php';
    include '../Model/consulSQL.php';
} else {
    include 'Model/configServer.php';
    include 'Model/consulSQL.php';
}


// Execute the SQL query
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

// Check if there are any results
if ($consulta) {
    // Loop through each row in the result set
    while ($fila = mysqli_fetch_assoc($consulta)) {
        if($fila['Estado']=="visible"){
            echo "<div class='post'>";
        // Output the Publicador column at the beginning of post-body
        echo "<div class='post-body'>";
        echo "<p class='publicador'>Publicado por: " . $fila['Publicador'] . "</p>";
        // Output other column values
        echo "<h2>" . $fila['Descripcion'] . "</h2>";
        echo "<p>Precio: " . $fila['Precio'] . "</p>";
        echo "<p>Ubicación: " . $fila['Ubicacion'] . "</p>";
        // Output buttons or additional information if needed
        echo "</div>";
        echo "<div class='post-button'>";
        if (!$_SESSION['nombreUser'] == "") {
            echo "<button type='button'>Me gusta</button>";
            echo "<button type='button'>Comentar</button>";
            echo "<button type='button'>Compartir</button>";
        }

        echo "</div>";
        echo "</div>";
        }else{
            
        }
    }
} else {
    // Output a message if no records are found
    echo "<h1>No se encontraron registros.</h1>";
}
