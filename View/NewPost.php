<?php
include "../Model/configServer.php";
include "../Model/consulSQL.php";
$nombreUsaurio = $_SESSION['nombreUser'];
//echo '<h1>Eres nuevo publicando por lo que tu publicacion permanecera oculta hasta ser aprobada por un administrador del sistema</h1>';
$existeRolUser = ejecutarSQL::consultar("SELECT * FROM Rol WHERE Usuario = '$nombreUsaurio' AND Rol = 'Vendedor' ");
$verdaderoRolUser = mysqli_num_rows($existeRolUser);
if ($verdaderoRolUser > 0) {
    //echo '<h1>Eres nuevo publicando por lo que tu publicacion permanecera oculta hasta ser aprobada por un administrador del sistema</h1>';
} else {
    echo '<p class="lead">Eres nuevo publicando por lo que tu publicacion permanecera oculta hasta ser aprobada por un administrador del sistema, despues de 5 publicaciones las siguientes no deberan ser aprobadas y seran visibles automaticamente.</p>';
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="container-form-admin">
                <h3 class="text-primary text-center">Agregar un producto a la tienda</h3>
                <form action="../Controller/regproduct.php" method="POST" enctype="multipart/form-data" class="FormCatElec" data-form="save">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend>Datos básicos</legend>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Descripcion de la publicacion</label>
                                    <!-- Cambio a textarea para permitir múltiples líneas -->
                                    <textarea class="form-control" required maxlength="500" name="prod-name" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio al publico</label>
                                    <input type="text" class="form-control" required maxlength="20" pattern="[0-9.]{1,20}" name="precio">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ubicacion</label>
                                    <input type="text" class="form-control" required maxlength="150" name="ubicacion">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend>Categoría</legend>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                              <div class="form-group">
                                <label>Categoría</label>
                                <select class="form-control" name="categoria">
                                    <?php
                                        $categoriac= ejecutarSQL::consultar("SELECT * FROM Categoria");
                                        while($catec=mysqli_fetch_array($categoriac, MYSQLI_ASSOC)){
                                            echo '<option value="'.$catec['ID'].'">'.$catec['Nombre'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-xs-12">
                                <legend>Imagen/Foto del producto</legend>
                                <p class="text-center text-primary">
                                    Seleccione una imagen/foto en el siguiente campo. Formato de imágenes admitido png y jpg. Tamaño máximo 5MB
                                </p>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <!-- Modifica aquí: agrega "[]" al nombre y el atributo "multiple" -->
                                    <input type="file" name="img[]" multiple>
                                    <div class="input-group">
                                        <input type="text" readonly="" class="form-control" placeholder="Seleccione las imágenes del producto...">
                                        <span class="input-group-btn input-group-sm">
                                            <button type="button" class="btn btn-fab btn-fab-mini">
                                                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <p class="help-block">Formato de imágenes admitido png y jpg. Tamaño máximo 5MB</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['nombreUser'] ?>">
                    <p class="text-center"><button type="submit" class="btn btn-primary btn-raised">Agregar a la tienda</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>