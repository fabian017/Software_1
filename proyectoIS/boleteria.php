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
    <title>Boleteria leoparda</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tienda3.css">
</head>

<body>
    <?php
        include("conexion.php");
        //select * from boleta;
        $sql="select * from boleta";
        $resultado=mysqli_query($conexion,$sql);    
    ?>

    <header class="container-fluid  position-sticky top-0">
        <div class="menu">
            <p class="nombret">
                Atletico Bucaramanga
            </p> 
            <nav>
                <ul class="nav nav-pills mb-3 py-3 container lista" id="pills-tab" role="tablist">
                    <?php if(!empty($user)):
                        if($user['rol']==1){ ?>
                        <a href="insertar.php"><li>Administrar</li></a>
                    <?php }endif; ?>
                    <a href="index.php"><li>Inicio</li></a>
                    <a href="plantilla.php"><li>Plantilla</li></a>
                    <a href="calendario.php"><li >Calendario</li> </a>
                    <a href="tienda2.php"><li >Tienda</li></a>
                    <a href="boleteria.php"><li >Boleteria</li></a>
                    <?php if(!empty($user)): ?>
                            <a class="nombre_usuario" href="editar_user.php"><li> Hola, <?= $user['nombre']; ?> <?= $user['apellido']?></li></a>
                            <a href="logout.php"><li>Logout</li></a>
                            <a href="carrito.php"><li class="texto" >Carrito</li></a>
                    <?php else: ?>
                            <a href="login_user.php"><li>Login</li></a>
                    <?php endif; ?>
                    
                    <a href="index.php"><li ><img src="img/escudo.png" alt=""></li></a>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
            <div class="tab-pane fade show active container" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <h2 class="h4 m-4">Boletería</h2>
                
                <div class=" row row-cols-sm-1 row row-cols-smd-2 row row-cols-lg-3 row row-cols-xl-4">
                    <?php
                        while($filas=mysqli_fetch_assoc($resultado)){
                    ?>
                    <div class="col d-flex justify-content-center mb-4 producto">
                    <?php
                        if(isset($_POST['add2'])){
                        $idb=$_POST['idb'];
                        $precio=$_POST['precio'];

                        include("conexion.php");
                        //INSERT INTO detalleboleta (idboleta, precio,idcliente) VALUES ('".$idb."','".$precio."','".$user['id']."')";
                        $sql="INSERT INTO detalleboleta (idboleta,idcliente) 
                        VALUES ('".$idb."','".$user['id']."')";

                        $resultado=mysqli_query($conexion,$sql);
                        if($resultado){
                            //los datos ingresaron correctamente
                            echo " <script language='JavaScript'>
                                    alert('Los datos fueron ingresados correctamente');
                                    location.assign('boleteria.php');
                                    </script>";
                        }else{
                            echo " <script language='JavaScript'>
                                    alert('ERROR: Los datos NO fueron ingresados correctamente');
                                    location.assign('boleteria.php');
                                    </script>";
                        }
                        mysqli_close($conexion);
                        }else{

                     ?>
                    <div class="card shadow mb-1 rounded" style="width: 20rem;">
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input name="nombre" class="n card-title pt-2 text-center  texto sinborde" readonly type="text" value="<?php echo $filas['nombre']?>">
                        
                            <img src="./img/boleto_generico.jpeg"
                            class="card-img-top imagen" alt="...">
                            <div class="card-body">
                                
                                <input name="idb" class=" card-title2 pt-2 text-center  texto sinborde" readonly type="hidden" value="<?php echo $filas['id']?>">
                            
                                <p class="card-text  description"><?php echo $filas['partido'] ?></p>
                                
                                <input name="partido" class="d" type="hidden" value="<?php echo $filas['partido']?>">
                                
                                
                                <input name="precio" class="pp texto sinborde" readonly type="text" value="<?php echo $filas['precio']?>">
                                <p></p>
                                <?php if(!empty($user)): ?>
                                <div class="d-grid gap 2">
                                    <button type="submit" name="add2" class="btn btn-primary button boton">Añadir a carrito</button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    mysqli_close($conexion);
                ?>
            </div>

    </div>
    <br><br>
<!-- hasta aca -->





    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <?php include("template/footer.php"); ?>