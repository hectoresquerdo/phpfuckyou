<?php 
require_once 'conexion.php'; 
$userId = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/lista.css" />
    <title>Asignaturas</title>
</head>
<body>

<?php
    require("menu.php");
?>
    <h1>Asignaturas</h1>
    

    <seccion id="container">

<h1>Lista de asignaturas</h1>


<table>
            <tr>
                <th>Curso</th>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Empieza</th>
                <th>Finaliza</th>
                 
                
                
            </tr>
            <?php

               $query = mysqli_query($db,"select courses.name as 'Curso', courses.date_start as 'empieza',courses.date_end as 'finaliza', users.username  as 'Estudiante',users.id as 'Id Usuario', class.name from users, courses, enrollment, class
               where users.id = enrollment.id_student and enrollment.id_course = courses.id_course and courses.id_course = class.id_course and users.id = $userId;");

                $result = mysqli_num_rows($query);

                

                if($result > 0){
                    while($data = mysqli_fetch_array($query)){
                       
            ?>
                        <tr>
                        <td><?php  echo $data["Curso"]  ?></td>
                        <td><?php  echo $data["Estudiante"]  ?></td>
                        <td><?php  echo $data["name"]  ?></td>
                        <td><?php  echo $data["empieza"]  ?></td>
                        <td><?php  echo $data["finaliza"]  ?></td>
                        
                        
                        <td>
                            
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