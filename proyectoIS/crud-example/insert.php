<html>
    <head>
        <title>Insert</title>
    </head>
    <body>
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
                            location.assign('index.php');
                            </script>";
                }else{
                    echo " <script language='JavaScript'>
                            alert('ERROR: Los datos NO fueron ingresados correctamente');
                            location.assign('index.php');
                            </script>";
                }
                mysqli_close($conexion);
            }else{

        ?>
        <h1>Insertar producto</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre"><br>
            <label>Precio:</label>
            <input type="text" name="precio"><br>
            <label>Unidades:</label>
            <input type="text" name="unidades"><br>
            <label>Descripcion:</label>
            <input type="text" name="descripcion"><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
        <?php
                }
        ?>
    </body>
</html>