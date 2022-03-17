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
    $si="1";
    if (strcmp($user['rol'], $si) == 0) {
    }
    else {
    header("Location:index.php");
    }
  }
  if($_SESSION['user_id']==null){
      header("Location:index.php");
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
                        <a href="tienda.php"><li>Tienda</li></a>
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
                $nombre=$_POST['nombre'];
                $precio=$_POST['precio'];
                $unidades=$_POST['unidades'];
                $descripcion=$_POST['descripcion'];

                include("conexion.php");
                //INSERT INTO `producto` (id, nombre, precio, unidades, descripcion) VALUES (NULL, $nombre,$precio,$unidades,$descripcion);
                $sql="INSERT INTO producto (nombre, precio, unidades, descripcion) 
                VALUES ('".$nombre."','".$precio."','".$unidades."','".$descripcion."')";

                $resultado=mysqli_query($conexion,$sql);
                if($resultado){
                    //los datos ingresaron correctamente
                    echo " <script language='JavaScript'>
                            alert('Los datos fueron ingresados correctamente');
                            location.assign('insertar.php');
                            </script>";
                }else{
                    echo " <script language='JavaScript'>
                            alert('ERROR: Los datos NO fueron ingresados correctamente');
                            location.assign('insertar.php');
                            </script>";
                }
                mysqli_close($conexion);
            }else{

        ?>
        <div class="contenedor__login-register">
            <h1 class="titulos">Añadir Inventario Leopardo grrr</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input class="inputs" type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre del producto">
                <input class="inputs" type="text" name="precio" id="precio" placeholder="Ingrese su precio">
                <input class="inputs" type="text" name="unidades" id="unidades" placeholder="Ingrese unidades a agregar">
                <input class="inputs" type="text" name="descripcion" id="descripcion" placeholder="Ingrese su descripcion">
                <input class="btn_agregar" type="submit" name="enviar" value="AGREGAR">
            </form>
        </div>
        <?php
                }
        ?>
         <?php
                include("conexion.php");
                //select * from producto;
                $sql="select * from producto";
                $resultado=mysqli_query($conexion,$sql);    
            ?>
        <table class="table ">
            <thead>
                <tr class="text-t">
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td class="table_cantidad"><?php echo $filas['id'] ?></td>
                    <td class="table_productos"><?php echo $filas['nombre'] ?></td>
                    <td class="table_price"><?php echo $filas['precio'] ?></td>
                    <td class="table_cantidad"><?php echo $filas['unidades'] ?></td>
                    <td class="table_cantidad"><?php echo $filas['descripcion'] ?></td>
                    <td>
                        <?php echo "<a class='edit' href='editar.php?id=".$filas['id']."'>EDIT</a>";?>
                        <?php echo "<a class='delete' href='eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>DELETE</a>";?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
           
        </table>
    </div>
<?php include("template/footer.php"); ?>