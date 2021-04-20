<?php
require_once 'conexion.php'; 
$mail = false;
$mensaje= false;
$id_course = $_GET['id'];
//INSERT INTO `courses` (`id_course`, `name`, `description`, `date_start`, `date_end`, `active`) VALUES (NULL, 'asdasdasd', 'asdasdasdasd', '2021-04-08', '2021-04-14', '1');
//INSERT INTO `phpcalendar`.`courses` (`name`, `description`, `date_start`, `date_end`, `active`) VALUES ('asdasd', 'asdasd', '2021-10-11', '2021-11-09', '1');
if($_POST){   
    $name= $_POST['name'];
    $description= $_POST['description'];
    $date_start= $_POST['date_start'];
    $date_end= $_POST['date_end'];
    $active= $_POST['active'];
    $active +=0;
    
    //UPDATE `phpcalendar`.`courses` SET `id_course` = '2', `name` = 'desarollo si', `description` = 'dodododod', `date_start` = '2021-10-13', `date_end` = '2021-11-08', `active` = '0' WHERE (`id_course` = '8');

    //$sql = "INSERT INTO `phpcalendar`.`courses` (`id_course`,`name`, `description`, `date_start`, `date_end`, `active`) VALUES (null, '$name', '$description', '$date_start', '$date_end', '$active');";
    $sql = "UPDATE `phpcalendar`.`courses` SET `name` = '$name', `description` = '$description', `date_start` = '$date_start', `date_end` = '$date_end', `active` = '$active' WHERE (`id_course` = '$id_course');";

    $guardar = mysqli_query($db, $sql);
    $mensaje = true;
    
    //header('Location: crearAsignaura.php ');

    if($mensaje){
        echo "<script>
                   alert('Asignatura modificada');
                   window.location= 'crearAsignaura.php'
       </script>";
    }

   
}





$sql =mysqli_query($db, "SELECT * FROM phpcalendar.courses where id_course = $id_course");

$resultado_sql = mysqli_num_rows($sql);

if($resultado_sql == 0){
    header('Location: listaTeacher.php');
}else{

    while($data = mysqli_fetch_array($sql)){
        $name = $data['name'];
        $description = $data['description'];
        $date_start = $data['date_start'];
        $date_end = $data['date_end'];
        $active = $data['active'];

    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css" />
    <title>Crear cursos</title>
</head>
<body>
<body>
<?php
    require("menu.php");
?>
    <div id="login" class="container">
 
      <h3>Crear cursos</h3>
      

      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          <div class="input-container">
            <label for="name">name</label>
            <input type="text" name="name"value= <?php echo "$name"?> required/>
          </div>
          <div class="input-container">
            <label for="description">description</label>
            <input type="text" name="description" value= <?php echo "$description"?> required/>
          </div>

        
       
            <div>
            <label for="start">Start date:</label>

        <input type="date" id="date_start" name="date_start"
            value= <?php echo "$date_start"?>
            min="2021-04-18" max="2023-12-31">
            
           

            
            </div>

            <div>
            <label for="start">End date:</label>

                <input type="date" id="date_end" name="date_end"
                value= <?php echo "$date_end"?>
                    min="2021-04-19" max="2022-12-31">
            
           

            
            </div>
            
            <div class="input-container custom-select">
                <label for="active">Curso activo</label>
                <select name="active" id="active" required>
                    
                    <option value=1>   si      </option>
                    <option value=0>   no     </option>

                 </select>
            </div>
          
            
            

            

            <input type="submit" name="submit" values="Registrar" />
            
      </form>
      
  </body>
    
</body>
</html>





