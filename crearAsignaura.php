<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/lista.css" />
    <title>Crear Asignatura</title>
</head>


<body>
<h1>Crear Asignatura</h1>
<?php
    require("menu.php");
?>
<seccion id="container">

<h1>Lista de cursos</h1>
<a href="cursos.php" class="btn_new">Crear curso</a>

<table>
            <tr>
                <th>id_course</th>
                <th>name</th>
                <th>description</th>
                
                
                <th>date_start</th>
                <th>date_end</th> 
                <th>active</th> 
                <th>Accion</th> 
                
            </tr>
            <?php

               $query = mysqli_query($db,"SELECT * FROM phpcalendar.courses;");

                $result = mysqli_num_rows($query);

                

                if($result > 0){
                    while($data = mysqli_fetch_array($query)){
                       
            ?>
                        <tr>
                        <td><?php  echo $data["id_course"]  ?></td>
                        <td><?php  echo $data["name"]  ?></td>
                        <td><?php  echo $data["description"]  ?></td>
                        <td><?php  echo $data["date_start"]?></td>
                        <td><?php  echo $data["date_end"] ?></td>
                        <td><?php  echo $data["active"] ?></td>
                        
                        <td>
                            <a class="link_edit" href="crearAsignaura1.php?id=<?php  echo $data["id_course"]  ?>">Agregar Asignatura</a>
                            |
                            <a class="link_mod" href="cursosMod.php?id=<?php  echo $data["id_course"]  ?>">Modificar</a>
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