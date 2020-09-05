<?php

class ventanaControlador
{

    /* ================================================================
        		MOSTRAR Ventana
        ================================================================= */
    static public function ctrMostrarVentana($item, $valor)
    {

        $tabla = "ventana";

        $respuesta = ventanaModelo::mdlMostrarVentana($tabla, $item, $valor);

        return $respuesta;
    }

    /* ================================================================
        Registro de usuario
        ================================================================= */
    static public function ctrCrearVentana()
    {

        if (isset($_POST["nuevaReferencia"])) {

            $tabla = "ventana";

            $datos = array(
                "referencia" => $_POST["nuevaReferencia"],
                "ubicacion" => $_POST["nuevaUbicacion"],
                "usuario_permitidos" => $_POST['nuevoUsuarioPermitido'],
                "dias_limpieza" => $_POST['nuevoGuardarDias'],
                "hora_limpieza" => $_POST["nuevaHora"],
                "foto_ventana" => ""
            );



            $respuesta = ventanaModelo::mdlIngresarVentana($tabla, $datos);

            if ($respuesta == "ok") {

                $color = "tituloWhite";

                echo "<script>
                    Swal.fire({
                        
                        type: 'success',
                        html: '<h3 class=" . $color . "> ¡Ventana añadida correctamente! </h3>',
                        background: '#343a40',
                        showConfirmButton: true,
                        confirmButtonColor: '#28a745',
                        confirmButtonText: 'Ok',
                        closeOnConfirm: false
                        

                        }).then((result)=>{

                        if(result.value){

                            window.location = 'ventanas';
                        }      
                    });

                </script>";
            }
        }
    }

    /* ================================================================
        		EDITAR Ventana
        ================================================================= */
    static public function ctrEditarVentana()
    {

        if (isset($_POST["editarReferencia"])) {

            $tabla = "ventana";
            $idVentana = $_POST['idActual'];

            $datos = array(
                "referencia" => $_POST["editarReferencia"],
                "ubicacion" => $_POST["editarUbicacion"],
                "usuario_permitidos" => $_POST['editarUsuarioPermitido'],
                "dias_limpieza" => $_POST['editarGuardarDias'],
                "hora_limpieza" => $_POST["editarHora"],
                "foto_ventana" => "",
                "id" => $idVentana
            );

            $respuesta = ventanaModelo::mdlEditarVentana($tabla, $datos);

            if ($respuesta == "ok") {

                $color = "tituloWhite";

                echo "<script>
                    Swal.fire({
                        
                        type: 'success',
                        html: '<h3 class=" . $color . "> ¡Ventana añadida correctamente! </h3>',
                        background: '#343a40',
                        showConfirmButton: true,
                        confirmButtonColor: '#28a745',
                        confirmButtonText: 'Ok',
                        closeOnConfirm: false
                        

                        }).then((result)=>{

                        if(result.value){

                            window.location = 'ventanas';
                        }      
                    });

                </script>";
            }
        }
    }

    /*=============================================
		= BORRAR O ELIMINAR Ventana    =
		=============================================*/

    static public function ctrBorrarVentana()
    {

        if (isset($_GET["idVentana"])) {

            $tabla = "ventana";

            $datos = $_GET["idVentana"];

            if ($_GET["idVentana"] != null) {

           //     unlink($_GET["fotoUsuario"]);

          //      rmdir('images/usuarios/' . $_GET["usuario"]);

                $respuesta = ventanaModelo::mdlBorrarVentana($tabla, $datos);

                if ($respuesta == "ok") {

                    $color = "tituloWhite";

                    echo "<script>
					            Swal.fire({

					                type: 'success',
					                html: '<h3 class=" . $color . ">¡La ventana ha sido borrada correctamente!</h3>',
					                background: '#343a40',
					                showConfirmButton: true,
					                confirmButtonColor: '#28a745',
					                confirmButtonText: 'Ok',
					                closeOnConfirm: false,
					                customClass: {

										title: 'title-alert'
									},

					                }).then((result)=>{

					                    if(result.value){

					                        window.location = 'ventanas';
					                    }      
					                });

					            </script>";
                }
            }
        }
    }
}
