<?php
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$nombreCat = consultasSQL::clean_string($_POST['categ-name']);
$desCat = consultasSQL::clean_string($_POST['categ-descrip']);

if (!$nombreCat == "" && !$desCat == "") {
    if (consultasSQL::InsertSQL("Categoria", "Nombre,Descripcion", "'$nombreCat','$desCat'")) {
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
} else {
    echo '<script>swal("ERROR", "Los campos no pueden estar vacíos", "error");</script>';
}
