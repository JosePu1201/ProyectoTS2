<?php
session_start();
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$IdPubli = $_POST['id'];

if(consultasSQL::UpdateSQL("Publicacion","Estado='visible'","ID='$IdPubli'")){
    echo '<script>
    swal({
      title: "Actualizacion completa",
      text: "La publicacion fue aceptada y ahora es visble",
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