<html>
    <head>
        <title>Atletico Bucaramanga - AB</title>
        <script type="text/javascript">
            function confirmar(){
                return confirm('¿Estas seguro?, se eliminarán los datos');
            }
        </script>
    </head>
    <body>
        <?php
            include("conexion.php");
            //select * from producto;
            $sql="select * from producto";
            $resultado=mysqli_query($conexion,$sql);    
        ?>
        <h1>Productos</h1>
        <a href="insert.php">Nuevo producto</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['nombre'] ?></td>
                    <td><?php echo $filas['precio'] ?></td>
                    <td><?php echo $filas['unidades'] ?></td>
                    <td><?php echo $filas['descripcion'] ?></td>
                    <td>
                        <?php echo "<a href='edit.php?id=".$filas['id']."'>EDIT</a>";?>
                        <?php echo "<a href='delete.php?id=".$filas['id']."' onclick='return confirmar()'>DELETE</a>";?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
            mysqli_close($conexion);
        ?>
    </body>
</html>