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
        
        if (!$_SESSION['nombreUser'] == "") {
            echo"<div>";
            echo "<div class='post-button'>";
            echo "<table>";
            echo "<tr>";
            
            echo "<td>";
            echo "<form action='Controller/comprar.php' method='POST' class='FormCatElec' role='form' data-form='save'>";
            echo "<input type='hidden' class='form-control' name='id' value='" . $fila['ID'] . "'>";
            echo "<button type='submit' like='like' class='btn btn-success'>Like</button>";
            echo "</form>";
            echo "</td>";
            
            echo "<td>";
            echo "<form action='Controller/comentar.php' method='POST' class='FormCatElec' role='form' data-form='save'>";
            echo "<input type='hidden' class='form-control' name='id' value='" . $fila['ID'] . "'>";
            echo "<button type='submit' name='comentar' class='btn btn-success'>Comentar</button>";
            echo "</form>";
            echo "</td>";
            
            echo "<td>";
            echo "<form action='Controller/reportar.php' method='POST' class='FormCatElec' role='form' data-form='save'>";
            echo "<input type='hidden' class='form-control' name='id' value='" . $fila['ID'] . "'>";
            echo "<button type='submit' name='reportar' class='btn btn-success'>Reportar</button>";
            echo "</form>";
            echo "</td>";
            
            echo "<td>";
            echo "<form action='Controller/comprar.php' method='POST' class='FormCatElec' role='form' data-form='save'>";
            echo "<input type='hidden' class='form-control' name='id' value='" . $fila['ID'] . "'>";
            echo "<button type='submit' name='comprar' class='btn btn-success'>Comprar</button>";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            
            
            
            echo "</div>";
        }

        
        echo "</div>";
        }else{
            
        }
    }
} else {
    // Output a message if no records are found
    echo "<h1>No se encontraron registros.</h1>";
}
