<?php
  session_start();

  include("conexion.php");

  if (isset($_SESSION['user_id'])) {
        $sql="SELECT id,nombre,apellido,correo,username,pass FROM cliente WHERE id = '".$_SESSION['user_id']."';";
        $resultado=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_assoc($resultado);
        $user = null;

    if (count($fila) > 0) {
      $user = $fila;
    }
  }
?>

<?php include("template/header.php"); ?> 

        <title>Atletico Bucaramanga</title>
        <link rel="stylesheet" href="css/index.css">
</head>
<div class="contenedor">
<div class="menu">
            <p class="nombret">
                Atletico Bucaramanga
            </p> 
            <nav>
                <ul class="lista">
                        <a href="/proyectois"><li>Inicio</li></a>
                        <a href="plantilla.php"><li>Plantilla</li></a>
                        <a href="calendario.php"><li >Calendario</li></a>
                        <a href="tienda.php"><li>Tienda</li></a>
                        <a href="boleteria.php"><li>Boleteria</li></a>
                        <?php if(!empty($user)): ?>
                                <li>Hola. <?= $user['nombre']; ?> <?= $user['apellido']?></li>
                                <a href="logout.php"><li>Logout</li></a>
                        <?php else: ?>
                                <a href="login_user.php"><li>Login</li></a>
                        <?php endif; ?>
                        <a href="index.php"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>

<div class="titular">
        <h1>Atletico Bucaramanga</h1>
        <h2>La pasion de todo un departamento</h2>
        <a class="boton" href="calendario.php" target="_blank"> VER PROXIMOS PARTIDOS</a>
</div>
</div>

<?php include("template/footer.php"); ?>

