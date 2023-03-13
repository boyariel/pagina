<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $university = $_POST['university'];
    $career = $_POST['career'];
    $knowledge = $_POST['knowledge'];
    $experience = $_POST['experience'];
    $addressu = $_POST['addressu'];

    $file = $_FILES["fileTest"]["name"]; //Nombre de nuestro archivo

    $url_temp = $_FILES["fileTest"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

    //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
    $url_insert = dirname(__FILE__) . "/files"; //Carpeta donde subiremos nuestros archivos

    //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
    $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

    //Si la carpeta no existe, la creamos
    if (!file_exists($url_insert)) {
        mkdir($url_insert, 0777, true);
    };

    //movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
    if (move_uploaded_file($url_temp, $url_target)) { ?>
        <script type="text/javascript">
            window.addEventListener('load', function () {
                Swal.fire({
                icon: 'success',
                title: 'Imagen de Perfil de <?php echo $name; ?> ha sido Cargada',
                footer: '<a href="page.html">Regresar al Formulario</a>'
                })
            })
        </script>
    <?php } else  { ?>
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Imagen de Perfil de <?php echo $name; ?> no ha sido Cargada',
                footer: '<a href="page.html">Regresar al Formulario</a>'
                })
            </script>
    <?php }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrapper">

        <div id="content">

            <header>

                <section id="contact-details">

                    <div class="header_1">
                    <img src="files/<?php echo $file; ?>" width="250" height="250" alt="Your Name" />
                    </div>

                    <div class="header_2">

                        <h1><span><?php echo $name," ",$last_name;?></span></h1>
                        <h3><?php echo $career; ?></h3>

                        <ul class="info_1">
                            <li class="address">DIRECCION: <?php echo $address;?></li>
                        </ul>
                        <ul class="info_2">
                            <li class="phone">TELEFONO: <?php echo $phone;?></li>
                        </ul>
                        <ul class="info_3">
                        <li class="email">CORREO: <a href="ariguz@gmail.com"><?php echo $email;?></a></li>
                        </ul>
                        <ul class="info_4">
                        <li class="address">FECHA DE NACIMIENTO: <?php echo $date;?></li>
                        </ul>

                    </div>

                </section>

            </header>

            <div class="clear">&nbsp;</div>

            <dl>
                <dt>Conocimiento:</dt>
                <dd>
                    <section id="skills">
                        <ul class="list1">
                        <ul>
                                <?php foreach ($knowledge as $key => $item) {?>
                                            <li><?php echo $item; ?></li>
                                <?php }   
                                ?>
                            </ul>
                        </ul>
                    </section>
                </dd>
            </dl>

            <div class="clear">&nbsp;</div>

            <dl>
                <dt>Experiencia:</dt>

                <dd>

                <section id="experience">


                <h2 class="top">Desarrollador</h2>
                <p class="bus1">Intelligent Society</p>
                <p class="time">Enero - Febrero 2023</p>

                <p>
                <?php echo $experience; ?>

                    <section id="education">

                        <p class="bus1"><?php echo $university; ?></p>
                        <?php echo $addressu ?>
                        <br />
                        Cochabamba,  BOLIVIA.

                        <p class="summary">Web Design</p>
                        <p class="time">2003 &#45; 2005</p>

                        <p class="edu-info">
                        <a href="https://cbba.usalesiana.edu.bo/" target="_blank" title="University of Toledo">cbba.usalesiana.edu.bo</a>
                        </p>

                    </section>

                </dd>
            </dl>

            <div class="clear">&nbsp;</div>

        </div>

    </div>
    
</body>
</html>