<?php
    include("conexion.php");
?>
<html>
<head>
    <title>EDIT</title>
</head>
<body>
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
                        location.assign('index.php');
                        </script>";
            }else{
                echo " <script language='JavaScript'>
                        alert('ERROR: Los datos NO fueron modificados correctamente');
                        location.assign('index.php');
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
    <h1>Editar producto</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>
        <label>Precio</label>
        <input type="text" name="precio" value="<?php echo $precio;?>"><br>
        <label>Unidades</label>
        <input type="text" name="unidades" value="<?php echo $unidades;?>"><br>
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $descripcion;?>"><br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
            }
    ?>
</body>
</html>