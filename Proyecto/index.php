
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atletico Bucaramanga</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js
"
></script> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    
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
                        <a href="index.php"><li>Inicio</li></a>
                        <a href="plantilla.php"><li>Plantilla</li></a>
                        <a href="Proximos_partidos.php"><li >Calendario</li></a>
                        <a href="ventas.php"><li>Tienda</li></a>
                        <a href="boleteria.php"><li>Boleteria</li></a>
                    <a href="index.php"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>
    </div>
    <div class="titular">
            <h1>Atletico Bucaramanga</h1>
            <h2>La pasion de todo un departamento</h2>
            <a class="boton" href="Proximos_partidos.php" target="_blank"> VER PROXIMOS PARTIDOS</a>
        </div>
    </header>
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
    


    
</body>
</html>
