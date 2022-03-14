<?php
    $id=$_GET['id'];
    include("conexion.php");

    $sql="delete from producto where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        //los datos ingresaron correctamente
        echo " <script language='JavaScript'>
                alert('Los datos fueron eliminados correctamente');
                location.assign('index.php');
                </script>";
    }else{
        echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron eliminados correctamente');
                location.assign('index.php');
                </script>";
    }
    //mysqli_close($conexion);

?>