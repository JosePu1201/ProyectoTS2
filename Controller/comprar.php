<?php
session_start();
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$publi = $_POST['idPubli'];
$comprador = $_SESSION['nombreUser'];


$resultadoSuma = ejecutarSQL::consultar("SELECT MonedaCambio, MonedaVirtual, SUM(MonedaCambio) + SUM(MonedaVirtual) AS total_monedas 
FROM Billetera 
WHERE Usuario = '$comprador'");

if ($resultadoSuma) {
    $fila =  mysqli_fetch_assoc($resultadoSuma);
    $totalBilletera = $fila['total_monedas'];
    $consultaPublicacion = ejecutarSQL::consultar("SELECT Precio,Publicador FROM Publicacion WHERE ID = '$publi'");
    if ($consultaPublicacion) {
        $filaPubli = mysqli_fetch_assoc($consultaPublicacion);
        $totalPubli = $filaPubli['Precio'];
        if ($totalBilletera >= $totalPubli) {
            $totalDebitar = $totalPubli;
            $totalVirtual = $fila['MonedaVirtual'];
            //echo "<h1>Se cambio :)</h1>";
            if ($totalDebitar <= $totalVirtual) {
                echo "<h1>Se cambio :)</h1>";
                if (consultasSQL::UpdateSQL("Billetera", "MonedaVirtual = MonedaVirtual - '$totalDebitar'", "Usuario = '$comprador'")) {
                    $publicador = $filaPubli['Publicador'];
                    if (consultasSQL::UpdateSQL("Billetera", "MonedaCambio = MonedaCambio + '$totalDebitar'", "Usuario = '$publicador'") && consultasSQL::UpdateSQL("Publicacion", "Estado = 'Vendido'", "ID = '$publi'")) {
                        echo '<script>
                        swal({
                        title: "Compra completada",
                        text: "Se te debitaron: Q' . $totalDebitar . ' de tu Moneda Virtual",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false,
                        closeOnCancel: false
                        },
                        function(isConfirm) {
                        if (isConfirm) {
                        location.reload();
                        } else {
                          location.reload();
                        }
                        });
                        </script>';
                    }
                }
            } else {
                $debitarMoneda = $totalDebitar - $totalVirtual;
                $debitarVirtual = $totalDebitar - $debitarMoneda;

                if (consultasSQL::UpdateSQL("Billetera", "MonedaVirtual = MonedaVirtual - '$debitarVirtual'", "Usuario = '$comprador'" && consultasSQL::UpdateSQL("Billetera", "MonedaCambio = MonedaCambio - '$debitarMoneda'", "Usuario = '$comprador'"))) {
                    $publicador = $filaPubli['Publicador'];
                    if (consultasSQL::UpdateSQL("Billetera", "MonedaCambio = MonedaCambio + '$totalDebitar'", "Usuario = '$publicador'") && consultasSQL::UpdateSQL("Publicacion", "Estado = 'Vendido'", "ID = '$publi'")) {
                        echo '<script>
                    swal({
                      title: "Compra completada",
                      text: "Se te debitaron: Q' . $debitarVirtual . ' de tu Moneda Virtual y Q' . $debitarMoneda . ' de tu Moneda de cambio",
                      type: "success",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Aceptar",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: false,
                      closeOnCancel: false
                      },
                      function(isConfirm) {
                      if (isConfirm) {
                        location.reload();
                      } else {
                        location.reload();
                      }
                    });
                  </script>';
                    }


                    $debitarVirtual = 0;
                    $debitarMoneda = 0;
                }
            }
        } else {
            echo '<script>swal("ERROR", "No tienes las monedas suficientes para realizar esta compra", "error");</script>';
        }
    }
}
