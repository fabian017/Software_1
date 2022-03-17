
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proximos Partidos de Atletico Bucaramanga</title>
    <link rel="stylesheet" href="css/plantilla.css">
    <link rel="stylesheet" href="css/PartidosF.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js
"
></script> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
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
                        <a href="Proximos_partidos.php"><li>Calendario</li></a>
                        <a href="plantilla.php"><li>Plantilla</li></a>
                        <a href="ventas.php"><li>Tienda</li></a>
                        <a href="boleteria.php"><li>Boleteria</li></a>
                        <a href="index.html"><li ><img src="img/escudo.png" alt=""></li></a>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <selection class="slider">
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
                            Televisión: Win+
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
                            Hora: ?<br>
                            Estadio: Alfonso López<br>
                            Televisión: ?
                        </p>
                </div>

                    <figure class="slider_picture">
                        <img src="img/bucaramanga-vs-cali.jpg" class="slider_img">
                    </figure>
                </h2>
            </selection>
            

            <img src="img/rightarrow.svg" class="slider_arrow" id="next">
        </div>
    </selection>

    <div class="cont-escudo">
        <img src="img/escudo.png" class="escudo">
    </div>   
            
    <footer class=" contenido-foter no-margin">
        <div class="contenedor">
        <div class="iconos">
            <div class="iconos-centrar icon">
            <i class="fab fa-facebook fa-4x"></i>
            </div>
            <div class="iconos-centrar icon">
            <i class="fab fa-twitter-square fa-4x"></i>
            </div>
            <div class="iconos-centrar icon">
            <i class="fas fa-phone-square-alt fa-4x"></i>
            </div>
            <div class="iconos-centrar icon">
            <i class="fab fa-instagram-square fa-4x"></i>
            </div>
            <div class="iconos-centrar icon">
            <i class="fas fa-search-location fa-4x"></i>
            </div>
        </div>
        </div>        
    </footer>            
        
        <!-- poner el jqery -->
    <script 
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>  

        
    <script>
    $(document).ready(function(){

        $('.menu-icon').click(function(){ ///llamar menu
        $('nav').slideToggle();  // sacar el menu
            
        })

    })    
    </script>

    <script src="js/sliders.js"></script>
    <?php include("template/footer.php"); ?>