<?php
include '../Model/configServer.php';
include '../Model/consulSQL.php';

$nameCliente = consultasSQL::clean_string($_POST['clien-name']);
$fullnameCliente = consultasSQL::clean_string($_POST['clien-fullname']);
$apeCliente = consultasSQL::clean_string($_POST['clien-lastname']);
$passCliente = consultasSQL::clean_string($_POST['clien-pass']);
$passCliente2 = consultasSQL::clean_string($_POST['clien-pass2']);
$phoneCliente = consultasSQL::clean_string($_POST['clien-phone']);
$emailCliente = consultasSQL::clean_string($_POST['clien-email']);

if (!$nameCliente == "" && !$apeCliente == "" && !$phoneCliente == "" && !$emailCliente == "" && !$fullnameCliente == "") {
    if ($passCliente == $passCliente2) {
        $verificar = ejecutarSQL::consultar("SELECT * FROM Usuario WHERE Usuario='" . $nameCliente . "'");
        $verificaltotal = mysqli_num_rows($verificar);
        if ($verificaltotal <= 0) {
            if (consultasSQL::InsertSQL("Usuario", "Usuario, Nombre, Apellidos, NumeroDeTelefono, email, Contra", "'$nameCliente','$fullnameCliente','$apeCliente','$phoneCliente','$emailCliente', '$passCliente'")) {
                if (consultasSQL::InsertSQL("Rol", "Usuario,Rol", "'$nameCliente','Comprador'") && consultasSQL::InsertSQL("Billetera","Usuario,MonedaVirtula,MonedaCambio","'$nameCliente',150.0,0.0")) {
                    echo '<script>
                    swal({
                      title: "Registro completado",
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
                }
            } else {
                echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
            }
        } else {
            echo '<script>swal("ERROR", "El Usuario que ha ingresado ya está registrado en el sistema, por favor ingrese otro nombre de usuario", "error");</script>';
        }
        mysqli_free_result($verificar);
    } else {
        echo '<script>swal("ERROR", "Las contraseñas no coinciden, por favor verifique e intente nuevamente", "error");</script>';
    }
} else {
    echo '<script>swal("ERROR", "Los campos no pueden estar vacíos", "error");</script>';
}
