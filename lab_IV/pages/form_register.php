<?php

    include "../conexion.php";
    require "../logic/validate_sessionLogic.php";
    $mysqli = new mysqli($host, $user, $pw, $db);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400;1,500;1,900&family=Lobster&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b50f20f4b1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_form.css">
    <title>Formulario de registro</title>
    <link rel="icon" href="../images/icon.png">

    <!-- CONEXION CON AJAX -->
    <script type="text/javascript">

        function mostrarSelect(str){
            var conexion;

            if(str==""){

                document.getElementById("txtHint").innerHTML="";
                return;
            }

            if(window.XMLHttpRequest){
                conexion = new XMLHttpRequest();

            }

            conexion.onreadystatechange = function(){
                if(conexion.readyState == 4 && conexion.status == 200){
                    document.getElementById("div").innerHTML = conexion.responseText;
                }
            }

            conexion.open("GET", "../logic/municipiosLogic.php?c="+str,true);
            conexion.send();
        }

    </script>

</head>
<body>



<div id="particles-js"></div>

<!-- CABECERA DE TRABAJO -->
<header>

    <div class="contenedor_principal">
        <div class="contenedor_logo">
            <a href="../index.php"><img id="imagen_logo" src="../images/logo.png" alt="Error al cargar la imagen"></a>
        </div>
        <div class="contenedor_frase">
            <span>Controla y monitoriza tu biodigestor al alcance de unos pocos clicks </span>
        </div>
        <div class="contenedor_botones">
            <div class="contenedor_botton_inicio">
                <a href="../index.php"><button type="" class="btn-inicio-sesion">Men?? principal</button></a>
            </div>
            <div class="contenedor_botton_registro">
                <a href="inicio_sesion.php"><button type="" class="btn-inicio-sesion">Inicio de sesi??n</button></a>
            </div>

        </div>
    </div>

</header>

<!-- BARRA DE NAVEGACION -->
<div class="contenedor_menu">
<div class="contenedor_listas">
    <ul>
        <a href="../index.php"><li class="btn-inicio-go_home">Men?? Principal</li></a>
        <a href="suscription.php"><li>Suscripciones <i class="fa fa-angle-down"></i></a>
            <ul>
                <a href="compras.php?suscp=Prem"><li> Premiun</li></a>
                <a href="compras.php?suscp=Basic"><li> B??sico</li></a>
            </ul>
        </li>
        <a href="quienes_somos.php"><li class="btn-inicio-go_catalogo">??Qui??nes somos?</li></a>

    </ul>
</div>
</div>


<!-- SCRIPT PARA LA VERFICACION DE CONTRASE??AS -->
<script>
    function comprobarPSW(){
        var passw1 = document.formulario.pasw.value;
        var passw2 = document.formulario.re_pasw.value;

        if(passw1 != passw2){
            alert('Las contrase??as NO coinciden');
            document.getElementById("passw").value="";
            document.getElementById("passw_conf").value="";
            return false;

        }



    }

</script>
<!-- INICIO DEL FORMULARIO -->
    <div class="contenedor_form">
        <div class="contenedor_img">
            <img src="../images/icon.png" class="avatar" alt="Error al cargar la imagen">
        </div>
        <h2>FORMULARIO DE REGISTRO</h2>
        <form action="../logic/form_registerLogic.php" method="POST" class="form" name="formulario" onsubmit="return comprobarPSW()">

            <!-- INPUT DE NOMBRE Y APELLIDOS -->
            <div class="form_container">
                <div class="form_group">
                    <label for="nombre_usuario">Nombres y apellidos </label>
                    <input type="text" name="nombre_usuario" class="input_decor" min="4" max="40" placeholder="nombres y apellidos" required>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DE FECHA DE NACIMIENTO -->
            <div class="form_container">
                <div class="form_group">
                    <label for="fecha_nac">Fecha de nacimiento </label>
                    <input type="date" name="fecha_nac" class="input_decor" min="1950-01-01" max="2004-12-31"  required>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DE TIPO DE DOCUMENTO -->
            <div class="form_container">
                <div class="form_group">
                    <label for="tipo_doc"> Tipo de documento </label>
                    <select class="input_decor" name="tipo_doc">
                        <option value="">Seleccione</option>
                        <option value="CC">Cedula de ciudadania</option>
                        <option value="PST">Pasaporte</option>
                    </select>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DEL NUMERO DE IDENTIFICACION -->
            <div class="form_container">
                <div class="form_group">
                    <label for="numero_id"> N??mero de identificaci??n </label>
                    <input type="text" name="numero_id" class="input_decor" placeholder="N??mero de identificaci??n" pattern="[0-9]{8,10}" title="La identifiacion solo debe contener caracteres num??ricos y debe cumplir con el formato nacional">
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DE LA DIRECCION  -->
            <div class="form_container">
                <div class="form_group">
                    <label for="direccion"> Direcci??n </label>
                    <input type="text" name="direccion" class="input_decor" placeholder="N??mero de direcci??n">
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- SELECT DE DEPARTAMENTO -->
            <div class="form_container">
                <div class="form_group">
                    <label for="depart"> Departamento </label>
                    <select class="input_decor" name="depart" onclick="mostrarSelect(this.value)">
                        <!-- <option >Departamento</option> -->

                        <?php
                            include "../logic/departamentosLogic.php";
                        ?>

                    </select>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- SELECT DE MUNICIPIO -->
            <div class="form_container">
                <div class="form_group" id="div">
                    <label for="munic"> Municipio </label>
                    <select class="input_decor" name="munic">
                        <option>Municipio</option>
                    </select>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT NUMERO DE CELULAR -->
            <div class="form_container">
                <div class="form_group">
                    <label for="tel"> Tel??fono / Celular </label>
                    <input type="tel" name="tel" class="input_decor" placeholder="N??mero de telefono" pattern="[0-9]{7,10}" title="Error. El numero de telefono debe contener unicamente digitos y deben coincidir con el formato nacional">
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DE LA CONTRASE??A -->
            <div class="form_container">
                <div class="form_group">
                    <label for="pasw"> Contrase??a </label>
                    <input type="password" name="pasw" class="input_decor" placeholder="Digite una contrase??a" id="passw" required>
                    <span class="form_line"></span>
                </div>
            </div>
            <!-- INPUT DE REP CONTRASE??A -->
            <div class="form_container">
                <div class="form_group">
                    <label for="re_pasw">Repita la contrase??a </label>
                    <input type="password" name="re_pasw" class="input_decor" placeholder="Repita la contrase??a" id="passw_conf" required>
                    <span class="form_line"></span>
                </div>
            </div>
            <button type="submit" class="btn_registrar">REGISTRAR</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>