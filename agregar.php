<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $nombre_cliente=$_POST['nombre_cliente'];
            $id_cliente=$_POST['id_cliente'];
            $asignado=$_POST['abogado'];
            $estado=$_POST['estado'];
            $observaciones=$_POST['observaciones'];

            include("include/conexion.php");
            $sql="insert into actividades (estado,observaciones,nombre_cliente,id_cliente,nombre_abogado) values ('".$estado."', '".$observaciones."','".$nombre_cliente."',".$id_cliente.",'".$asignado."')";
            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo "  <script language='JavaScript'>
                alert('Los Datos fueron ingresados Correctamente a la BD!');
                location.href='principal.php';
                </script>";
            }else{
                echo "  <script language='JavaScript'>
                alert('Los Datos no fueron ingresados Correctamente!');
                location.href='principal.php';
                </script>";

            }
            mysqli_close($conexion);

        }else{
    
    ?>
    <h1>Proceso Nuevo</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre Cliente</label>
        <input type="text" name="nombre_cliente" onkeyup="mayus(this);" required> <br>
        <label>CC/NIT CLiente</label>
        <input type="number" name="id_cliente"  required><br>
        <label>Asigado</label>
        <select name="abogado">
            <option value="JUAN GUERRA MORENO">JUAN GUERRA MORENO</option>
            <option value="MARIA ADELAIDA VELEZ" selected>MARIA ADELAIDA VELEZ</option>
            <option value="DANIELA DURAN">DANIELA DURAN</option>
            <option value="ERIKA ARANGO">ERIKA ARANGO</option>
            <option value="MARCELA RESTREPO">MARCELA RESTREPO</option>
            <option value="NATALIA SALDARRIAGA">NATALIA SALDARRIAGA</option>
        </select><br>
        <label>Estado</label>
        <select name="estado">
            <option value="ACTIVIDAD ACTUAL">ACTIVIDAD ACTUAL</option>
            <option value="SOLICITUD DOC" selected>SOLICITUD DOC</option>
            <option value="ET PRELIMINAR">ET PRELIMINAR</option>
            <option value="AVALÚO">AVALÚO</option>
            <option value="PTE HONORARIOS">PTE HONORARIOS</option>
            <option value="ET DEFINITIVO">ET DEFINITIVO</option>
            <option value="1er Vo Bo">1er Vo Bo</option>
            <option value="C. RATIFICACION">C. RATIFICACION</option>
            <option value="REMISION NOTARIA">REMISION NOTARIA</option>
            <option value="ESCRITURACION">ESCRITURACION</option>
            <option value="REVISION ESCRITURA">REVISION ESCRITURA</option>
            <option value="2do Vo Bo">2do Vo Bo</option>
            <option value="ESPERA BOLETA">ESPERA BOLETA</option>
            <option value="BOLETA">BOLETA</option>
            <option value="ESC REGISTRADA">ESC REGISTRADA</option>
            <option value="TERMINADO">TERMINADO</option>
            <option value="DESISTIDO">DESISTIDO</option>
            <option value="SUSPENDIDO">SUSPENDIDO</option>

            

        </select><br>
        <label >Observaciones</label>
        <textarea name="observaciones" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" name="enviar" value="Guardar" class="btn btn-success"> 
        <a href="principal.php">Regresar</a>
    </form>
    <?php
    }
    ?>

    <script src="js/main.js"></script>
</body>
</html>