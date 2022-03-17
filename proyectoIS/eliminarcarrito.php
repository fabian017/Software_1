<?php
    $id=$_GET['id1'];
    include("conexion.php");

    $sql="delete from detalleventa where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        //los datos ingresaron correctamente
        echo " <script language='JavaScript'>
                alert('Los datos fueron eliminados correctamente');
                location.assign('carrito.php');
                </script>";
    }else{
        echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron eliminados correctamente');
                location.assign('carrito.php');
                </script>";
    }
    //mysqli_close($conexion);

    $id=$_GET['id2'];
    include("conexion.php");

    $sql="delete from detalleboleta where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        //los datos ingresaron correctamente
        echo " <script language='JavaScript'>
                alert('Los datos fueron eliminados correctamente');
                location.assign('carrito.php');
                </script>";
    }else{
        echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron eliminados correctamente');
                location.assign('carrito.php');
                </script>";
    }
?>