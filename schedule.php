<?php 
require_once 'conexion.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/lista.css" />
    <title>Crear Clase de una asignatura</title>
</head>
<body>

<?php
    require("menu.php");
?>
    <h1>Crear Clase</h1>
    

    <seccion id="container">

<h1>Lista de profesores</h1>
<a href="cursos.php" class="btn_new">Crear curso</a>

<table>
            <tr>
                <th>Id_class</th>
                <th>Color</th>
                <th>name</th>
                 
                <th>Accion</th> 
                
            </tr>
            <?php

               $query = mysqli_query($db,"SELECT id_class, name, color FROM phpcalendar.class;");

                $result = mysqli_num_rows($query);

                

                if($result > 0){
                    while($data = mysqli_fetch_array($query)){
                       
            ?>
                        <tr>
                        <td><?php  echo $data["id_class"]  ?></td>
                        <td><?php  echo $data["name"]  ?></td>
                        <td><?php  echo $data["color"]  ?></td>
                        
                        
                        <td>
                            <a class="link_edit" href="schedule1.php?id=<?php  echo $data["id_class"]  ?>">Agregar clase</a>
                            |
                            <a class="link_delete" href="#">Eliminar</a>
                        </td>
                    </tr>   
            <?php            
                    }
                }
            
            ?>



           
            
</table>




</seccion>




</body>
</html>