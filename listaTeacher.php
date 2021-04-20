<?php
require_once 'conexion.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="./css/lista.css" />
    <title>Lista profesores</title>
</head>
<body>
<?php
    require("menu.php");
?>

<seccion id="container">

<h1>Lista de profesores</h1>
<a href="teacher.php" class="btn_new">Crear Profesor</a>

<table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Surname</th>
                
                
                <th>Telephone</th>
                <th>Nif</th> 
                <th>Email</th> 
                <th>Acciones</th> 
            </tr>
            <?php

               $query = mysqli_query($db,"SELECT * FROM phpcalendar.teachers;");

                $result = mysqli_num_rows($query);

                

                if($result > 0){
                    while($data = mysqli_fetch_array($query)){
                       
            ?>
                        <tr>
                        <td><?php  echo $data["id_teacher"]  ?></td>
                        <td><?php  echo $data["name"]  ?></td>
                        <td><?php  echo $data["surname"]  ?></td>
                        <td><?php  echo $data["telephone"]?></td>
                        <td><?php  echo $data["telephone"] ?></td>
                        <td><?php  echo $data["email"] ?></td>
                        
                        <td>
                            <a class="link_edit" href="editteacher.php?id=<?php  echo $data["id_teacher"]  ?>">Editar</a>
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