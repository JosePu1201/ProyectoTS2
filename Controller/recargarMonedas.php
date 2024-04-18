<?php
session_start();
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$monedas = $_POST['cantidadRecarga'];
$usuario = $_SESSION['nombreUser'];
 if(consultasSQL::UpdateSQL("Billetera","MonedaCambio= MonedaCambio + '$monedas'","Usuario = '$usuario'")){
    echo '<script>
    swal({
      title: "Transaccion completa",
      text: "Tu billetera a sido actualizada",
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
}else{
    echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}