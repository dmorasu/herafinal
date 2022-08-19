<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img./gpa (1).ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <title>Leasing</title>
</head>
<body>
    <?php
        include("include/conexion.php");
        $sql="select * from actividades";
        $resultado=mysqli_query($conexion,$sql);
    ?>    
    <h1>Lista de Procesos</h1>
    <a href="agregar.php">Nuevo Proceso</a>
    <br>
    <br>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>ITEM</th>
                <th>ASIGNADO</th>
                <th>NIT / CC </th>
                <th>CLIENTE</th>
                <th>OBSERVACIONES</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            <tbody>
                <?php 
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id']?></td>
                    <td><?php echo $filas['nombre_abogado']?></td>
                    <td><?php echo $filas['id_cliente']?></td>
                    <td><?php echo $filas['nombre_cliente']?></td>
                    <td><?php echo $filas['observaciones']?></td>
                    <td><?php echo $filas['estado']?></td>
                    <td>
                        <?php echo"<a class='btn btn-info' href='editar.php?id=".$filas['id']."'> Editar</a>"?>
                        -
                        <?php echo"<a  class='btn btn-danger' href=''> Eliminar</a>"?>
                    </td>

                </tr>
                <?php
                    }
                ?>
            </tbody>


        </thead>
    </table>
    <?php
    mysqli_close($conexion);
    
    ?>
</body>
</html>