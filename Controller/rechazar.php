<?php
session_start();
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$IdPubli = $_POST['idR'];

if (consultasSQL::UpdateSQL("Publicacion", "Estado='rechazado'", "ID='$IdPubli'")) {
    echo '<script>
                    swal({
                      title: "Publicacion actualizada con exito",
                      text: "Rechazaste esta publicacion",
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
} else {
    echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
}
