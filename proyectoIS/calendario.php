<?php
  session_start();

  include("conexion.php");

  if (isset($_SESSION['user_id'])) {
        $sql="SELECT id,nombre,apellido,correo,username,pass,rol FROM cliente WHERE id = '".$_SESSION['user_id']."';";
        $resultado=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_assoc($resultado);
        $user = null;

    if (count($fila) > 0) {
      $user = $fila;
    }
  }
?>

<?php include("template/header.php"); ?> 
    <title>Proximos Partidos de Atletico Bucaramanga</title>
    <link rel="stylesheet" href="css/PartidosF.css">

    
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="menu">
                <p class="nombret">
                    Atletico Bucaramanga
                </p> 
                <nav>
                    <ul class="lista">
                        <?php if(!empty($user)):
                            if($user['rol']==1){ ?>
                            <a href="insertar.php"><li>Administrar</li></a>
                        <?php }endif; ?>
                        <a href="index.php"><li>Inicio</li></a>
                        <a href="plantilla.php"><li >Plantilla</li></a>
                        <a href="calendario.php"><li>Calendario</li></a>
                        <a href="tienda2.php"><li >Tienda</li></a>
                        <a href="boleteria.php"><li>Boleteria</li></a>
                        <?php if(!empty($user)): ?>
                                <a class="nombre_usuario" href="editar_user.php"><li> Hola, <?= $user['nombre']; ?> <?= $user['apellido']?></li></a>
                                <a href="logout.php"><li>Logout</li></a>
                        <?php else: ?>
                                <a href="login_user.php"><li>Login</li></a>
                        <?php endif; ?>
                        <a href="/proyectois"><li ><img src="img/escudo.png" alt=""></li></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <selection class="slider">
    <h1 class="titulos">Calendario Leopardo</h1>
        <div class="slider_container container">
            
            <img src="img/leftarrow.svg" class="slider_arrow" id="before">

            <selection class="slider_body slider_body--show" data-id="1">
                <div class="slider_texts">
                    <h2 class="subtitle">
                        Atletico Bucaramanga Vs Atletico Nacional 
                        <p class="slider_review">
                            9a. fecha - febrero 27<br>
                            Hora: 6:10 PM<br>
                            Estadio: Alfonso López<br>
                            Transmisión: Win+
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/Nacional-vs-Bucaramanga.png" class="slider_img">
                    </figure>
                </h2>
            </selection>

            <selection class="slider_body" data-id="2">
                <div class="slider_texts">
                    <h2 class="subtitle">
                        Alianza Petrolera Vs Atletico Bucaramanga
                        <p class="slider_review">
                            10a. fecha - marzo 6<br>
                            Hora: 4:05 p.m.<br>
                            Estadio: Daniel Villa Zapata<br>
                            Transmisión: Win+
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/alinza-vs-bucaramanga.jpg" class="slider_img">
                    </figure>
                </h2>
            </selection>

            <selection class="slider_body" data-id="3">
                <div class="slider_texts">
                    <h2 class="subtitle">
                        Atletico Bucaramanga Vs Deportivo Cali
                        <p class="slider_review">
                            11a. fecha - marzo 20<br>
                            Hora: 6:05 p.m.<br>
                            Estadio: Alfonso López<br>
                            Transmisión: Win+
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/bucaramanga-vs-cali.jpg" class="slider_img">
                    </figure>
                </h2>
            </selection>

            <selection class="slider_body" data-id="4">
                <div class="slider_texts">
                    <h2 class="subtitle">
                        Independiente Santa Fe Vs Atletico Bucaramanga
                        <p class="slider_review">
                            12a. fecha - marzo 21<br>
                            Hora: 8:15 p.m.<br>
                            Estadio: El Campin<br>
                            Transmisión: Win+
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/santafe_vs_bucaramanga.jpg" class="slider_img">
                    </figure>
                </h2>
            </selection>

            <selection class="slider_body" data-id="5">
                <div class="slider_texts">
                    <h2 class="subtitle">
                        Atletico Bucaramanga Vs Jaguares FC
                        <p class="slider_review">
                            13a. fecha - marzo 26<br>
                            Hora: 2:00 p.m.<br>
                            Estadio: Alfonso Lopez<br>
                            Transmisión: Win/Win+
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/jaguares_vs_bucaramanga.png" class="slider_img">
                    </figure>
                </h2>
            </selection>
            

            <img src="img/rightarrow.svg" class="slider_arrow" id="next">
        </div>
    </selection>

    <script src="js/sliders.js"></script>
    <?php include("template/footer.php"); ?>