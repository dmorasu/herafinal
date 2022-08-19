<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Iniciar</title>
</head>
<body>

<?PHP
if(isset($_POST['enviar'])){
    if(empty($_POST['usuario']) || empty($_POST['pass'])){
        echo"<script languague='JavaScript'>
        alert('El nombre o la contraseña no han sido ingresados');
        location.assign('index.php');
        </script> ";

    }else{
        include("include/conexion.php");
        $usuario=$_POST['usuario'];
        $pass=$_POST['pass'];
        $sql="SELECT * FROM user where user='".$usuario."' and password='".$pass."'";
        $resultado=mysqli_query($conexion,$sql);
        if($fila=mysqli_fetch_assoc($resultado)){
            echo"<script languague='JavaScript'>
            alert('Bienvenido');
            location.assign('principal.php');
            </script> ";

        }else{
            echo"<script languague='JavaScript'>
            alert('Usuario o contraseña Invalido');
            location.assign('index.php');
            </script> ";

        }

    }

}else{




?>
    <center>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <br>
            <label >Usuario</label>
            <input type="text" name="usuario"/>
            <br>
            <label>Contraseña</label>
            <input type="password" name="pass"/>
            <br>
            <input type="submit" name="enviar" value="enviar"/>
        </form>
    </center>
 <?php
 }
 ?>   
</body>
</html>