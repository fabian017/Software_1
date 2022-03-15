



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login AB</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/tienda.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <!-- Menú navegación -->
    <header class="container-fluid  position-sticky top-0">
        <div class="menu">
            <p class="nombret">
                Atletico Bucaramanga
            </p> 
            <nav>
                <ul class="nav nav-pills mb-3 py-3 container lista" id="pills-tab" role="tablist">
                    <a href="/proyectois"><li>Inicio</li></a>
                    <a href="plantilla.php"><li>Plantilla</li></a>
                    <a href="calendario.php"><li >Calendario</li> </a>
                    <a href="tienda.php"><li >Tienda</li></a>
                    <a href="boleteria.php"><li >Boleteria</li></a>
                    <li class="nav-item carro" role="presentation">
                        <a class="nav-link carro" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Carrito</a>
                    </li>
                    
                    <a href="index2.php"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>
    </header>
    <!-- User -->
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">

                    <!--Login-->
                    <?php

                    session_start();

                    if (isset($_SESSION['user_id'])) {
                    header('Location: /proyectois');
                    }
                    include("conexion.php");

                    if(isset($_POST['entrar'])){
                        
                        $correo=$_POST['correo-login'];
                        $pass=$_POST['pass-login'];

                        include("conexion.php");

                        $sql="SELECT id,nombre,apellido,correo,username,pass FROM cliente WHERE correo = '".$correo."';";

                        $resultado=mysqli_query($conexion,$sql);
                        $fila=mysqli_fetch_assoc($resultado);
                        if($fila['pass']==$pass){
                            $_SESSION['user_id']=$fila['id'];
                            header("Location: /proyectois");
                        }else{
                            echo " <script language='JavaScript'>
                                    alert('ERROR: Login fallido');
                                    location.assign('login_user.php');
                                    </script>";
                        }
                        
                    }else{
                    ?>
                    <form action="<?=$_SERVER['PHP_SELF']?>" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="email" placeholder="Correo Electronico" name="correo-login">
                        <input type="password" placeholder="Contraseña" name="pass-login">
                        <input type="checkbox" class="role-admin"><label>Admin  </label><br>
                        <button class="entrar" name="entrar" type="submit">Entrar</button>
                    </form>
                    <?php
                        }
                    ?>
                    <!--Register-->
                    <?php
                    if(isset($_POST['enviar'])){
                        $id=$_POST['id'];
                        $nombre=$_POST['nombre'];
                        $apellido=$_POST['apellido'];
                        $correo=$_POST['correo'];
                        $username=$_POST['username'];
                        $pass=password_hash($_POST['pass'], PASSWORD_BCRYPT);
                        include("conexion.php");
                        //INSERT INTO `producto` (id, nombre, precio, correo, descripcion) VALUES (NULL, $nombre,$precio,$unidades,$descripcion);
                        $sql="INSERT INTO cliente (id,nombre,apellido,correo,username,pass) 
                        VALUES ('".$id."','".$nombre."','".$apellido."','".$correo."','".$username."','".$pass."')";

                        $resultado=mysqli_query($conexion,$sql);
                        if($resultado){
                            //los datos ingresaron correctamente
                            echo " <script language='JavaScript'>
                                    alert('Registro exitoso');
                                    location.assign('login_user.php');
                                    </script>";
                        }else{
                            echo " <script language='JavaScript'>
                                    alert('ERROR: Registro fallido');
                                    location.assign('login_user.php');
                                    </script>";
                        }
                        mysqli_close($conexion);
                    }else{
                    ?>

                    <form action="<?=$_SERVER['PHP_SELF']?>" class="formulario__register" method="POST">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nro. identificacion" name="id">
                        <input type="text" placeholder="Nombre" name="nombre">
                        <input type="text" placeholder="Apellido" name="apellido">
                        <input type="email" placeholder="Correo Electronico" name="correo">
                        <input type="text" placeholder="Usuario" name="username">
                        <input type="password" placeholder="Contraseña" name="pass">
                        <button name="enviar" type="submit">Regístrarse</button>
                    </form>

                    <?php
                        }
                    ?>
                </div>
            </div> 
    </div>



        <script src="js/login.js"></script>

<?php include("template/footer.php"); ?>