<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <div class="container-form">
                <h3 class="text-primary text-center">Recarga monedas a tu billetera virtual</h3>
                <form class="FormCatElec" action="Controller/recargarMonedas.php" role="form" method="POST" data-form="save">
                    <div class="container-fluid">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Cantidad a recargar:</label>
                                <input type="number" class="form-control" id="cantidadRecarga" name="cantidadRecarga" step="0.01" min="0"  required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Número de Tarjeta de Crédito:</label>
                                <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta" minlength="16" maxlength="16"  required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Fecha de Expiración:</label>
                                <input type="month" class="form-control" id="fechaExpiracion" name="fechaExpiracion" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">CVV:</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" minlength="3" maxlength="3"  required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['nombreUser'] ?>">
                    <p class="text-center"><button type="submit" class="btn btn-primary btn-raised">Recargar monedas</button></p>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>