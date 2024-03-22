<?php
    session_start();
    echo '<script>
    swal({
      title: "Canjeo completado",
      text: "El registro se completó con éxito, ya puedes iniciar sesión en el sistema",
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
    ?>