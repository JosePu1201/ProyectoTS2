<?php
session_start();
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$IdPubli = $_POST['id'];

if (consultasSQL::UpdateSQL("Publicacion", "Estado='rechazado'", "ID='$IdPubli'")) {
    echo '<script>
                    swal({
                      title: "Registro de categoria completado",
                      text: "El registro se completó con éxito, ya puedes usar la categoria",
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
