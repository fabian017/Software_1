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

    <title>Tienda leoparda</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tienda3.css">
</head>
<body>
    <div class="contenedor">
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

    <?php
        include("conexion.php");
        //select * from detalleventa;
        $sql="select dv.id,p.nombre,dv.cantidad from detalleventa dv, producto p where dv.idproducto=p.id and dv.idcliente='".$user['id']."'";
        $resultado=mysqli_query($conexion,$sql);    
    ?>
        <table class="table ">
            <h2 class="texto">Productos</h2>
            <thead>
                <tr class="text-t">
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col"></th>
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
                    <td class="table_price"><?php echo $filas['cantidad'] ?></td>
                    <td class="table_productos"><img src="./img/productos/<?php echo $filas['nombre'] ?>.png" class="card-img-top imagen" alt="..."></td>
                    <td>
                        <?php echo "<a class='delete' href='eliminarcarrito.php?id1=".$filas['id']."' onclick='return confirmar()'>DELETE</a>";?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
           
        </table>
        <button name="enviar" type="submit"class="venta" id="venta1">Generar venta productos</button>  

        
    <?php
    include("conexion.php");
    //select * from detalleventa;
    $sql="select db.id,b.nombre,b.precio,db.idcliente from detalleboleta db, boleta b
    where db.idboleta=b.id and db.idcliente='".$user['id']."';";
    $resultado=mysqli_query($conexion,$sql);    
    ?>
        <table class="table ">
            <h2 class="texto">Boletas</h2>
            <thead>
                <tr class="text-t">
                    <th scope="col">Boleta Nro.</th>
                    <th scope="col">Tribuna</th>
                    <th scope="col">Precio</th>
                    <th scope="col">IDcliente</th>
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
                    <td class="table_cliente"><?php echo $filas['idcliente'] ?></td>
                    <td>
                        <?php echo "<a class='delete' href='eliminarcarrito.php?id2=".$filas['id']."' onclick='return confirmar()'>DELETE</a>";?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
           
        </table>
        <button name="enviar" type="submit" class="venta" >Generar venta boleta</button>        
                     
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<?php include("template/footer.php"); ?>