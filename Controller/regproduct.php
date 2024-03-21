<?php
    session_start();
    include '../Model/configServer.php';
    include '../Model/consulSQL.php';

   
    $descripcion=consultasSQL::clean_string($_POST['descripcion']);
    $precio=consultasSQL::clean_string($_POST['precio']);
    $ubicacion=consultasSQL::clean_string($_POST['ubicacion']);
    $categoria=consultasSQL::clean_string($_POST['categoria']);
    $usuario=consultasSQL::clean_string($_POST['usuario']);
   /*
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;*/

    if($descripcion!="" && $precio!="" && $ubicacion!="" && $categoria!="" && $usuario!=""){

                        if(consultasSQL::InsertSQL(
                            "Publicacion",
                            "Descripcion, ID_Categoria, Estado, Precio, Ubicacion, Publicador",
                            "'$descripcion','$categoria','Oculto','$precio','$ubicacion','$usuario'"
                        )){
                            echo '<script>
                                swal({
                                  title: "Producto registrado",
                                  text: "El producto se añadió a la tienda con éxito",
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
                    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }