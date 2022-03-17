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

    <title>ADMIN</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/insertar.css">
</head>
<body>
<div class="contenedor">
        <div class="menu">
            <p class="nombret">
                Atletico Bucaramanga
            </p> 
            <nav>
                <ul class="lista">
                        <a href="index.php"><li>Inicio</li></a>
                        <a href="plantilla.php"><li>Plantilla</li></a>
                        <a href="calendario.php"><li >Calendario</li></a>
                        <a href="tienda2.php"><li>Tienda</li></a>
                        <a href="boleteria.php"><li>Boleteria</li></a>
                        <?php if(!empty($user)): ?>
                                <a class="nombre_usuario" href="editar_user.php"><li> Hola, <?= $user['nombre']; ?> <?= $user['apellido']?></li></a>
                                <a href="logout.php"><li>Logout</li></a>
                        <?php else: ?>
                                <a href="login_user.php"><li>Login</li></a>
                        <?php endif; ?>
                        <a href="index.php"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>
        <?php
        if(isset($_POST['enviar'])){
            $id=$_POST["id"];
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $unidades=$_POST['unidades'];
            $descripcion=$_POST['descripcion'];
            //UPDATE producto set nombre=$nombre,precio=$precio,unidades=$unidades,descripcion=$descripcion where id=$id;
            $sql="UPDATE producto set nombre='".$nombre."',precio='".$precio."',
                unidades='".$unidades."',descripcion = '".$descripcion."' 
                where id='".$id."'";

            $resultado=mysqli_query($conexion,$sql);
            if($resultado){
                    //los datos ingresaron correctamente
                echo " <script language='JavaScript'>
                        alert('Los datos fueron modificados correctamente');
                        location.assign('insertar.php');
                        </script>";
            }else{
                echo " <script language='JavaScript'>
                        alert('ERROR: Los datos NO fueron modificados correctamente');
                        location.assign('insertar.php');
                        </script>";
            }
            mysqli_close($conexion);
        }else{
            //aqui entra si no se presiona el boton enviar
            $id=$_GET["id"];
            $sql="select * from producto where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $nombre=$fila["nombre"];
            $precio=$fila["precio"];
            $unidades=$fila["unidades"];
            $descripcion=$fila["descripcion"];

            mysqli_close($conexion);
    ?>
        <div class="contenedor__login-register">
            <h1 class="titulos">Modificar productos</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input class="inputs" type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>">
                <input class="inputs" type="text" name="precio" id="precio" value="<?php echo $precio;?>">
                <input class="inputs" type="text" name="unidades" id="unidades" value="<?php echo $unidades;?>">
                <input class="inputs" type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input class="btn_agregar" type="submit" name="enviar" value="EDITAR">
            </form>
        </div>
    <?php
            }
    ?>
</div>
<?php include("template/footer.php"); ?>