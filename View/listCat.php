<p class="lead">

</p>
<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li>
        <a href="index.php?view=newCat">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Nueva Categoría
        </a>
    </li>
    <li>
        <a href="index.php?view=listCat"><i class="fa fa-list-ol" aria-hidden="true"></i> &nbsp; Categoría de productos</a>
    </li>
</ul>
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <br><br>
        <div class="panel panel-info">
            <div class="panel-heading text-center"><h4>Categorías de productos</h4></div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Código</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'Model/configServer.php';
                        include 'Model/consulSQL.php';

                        // Conectar a la base de datos
                        $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                        mysqli_set_charset($mysqli, "utf8");

                        // Consultar las categorías de productos
                        $categorias = ejecutarSQL::consultar("SELECT * FROM Categoria");

                        // Verificar si hay resultados
                        if ($categorias) {
                            $cr = 1; // Contador de fila
                            // Mostrar cada categoría en la tabla
                            
                            while ($cate = mysqli_fetch_assoc($categorias)) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $cr . "</td>";
                                echo "<td class='text-center'>" . $cate['ID'] . "</td>";
                                echo "<td class='text-center'>" . $cate['Nombre'] . "</td>";
                                echo "<td class='text-center'>" . $cate['Descripcion'] . "</td>";
                                echo "</tr>";
                                $cr++;
                            }
                        } else {
                            // No se encontraron categorías
                            echo "<tr><td colspan='4' class='text-center'>No se encontraron categorías.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <br><br>
    </div>
</div>

</div>