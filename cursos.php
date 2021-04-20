<?php
require_once 'conexion.php'; 
$mail = false;
//INSERT INTO `courses` (`id_course`, `name`, `description`, `date_start`, `date_end`, `active`) VALUES (NULL, 'asdasdasd', 'asdasdasdasd', '2021-04-08', '2021-04-14', '1');
//INSERT INTO `phpcalendar`.`courses` (`name`, `description`, `date_start`, `date_end`, `active`) VALUES ('asdasd', 'asdasd', '2021-10-11', '2021-11-09', '1');
if($_POST){   
    $name= $_POST['name'];
    $description= $_POST['description'];
    $date_start= $_POST['date_start'];
    $date_end= $_POST['date_end'];
    $active= $_POST['active'];
    $active +=0;
    

    $sql = "INSERT INTO `phpcalendar`.`courses` (`id_course`,`name`, `description`, `date_start`, `date_end`, `active`) VALUES (null, '$name', '$description', '$date_start', '$date_end', '$active');";
    var_dump($sql);

    $guardar = mysqli_query($db, $sql);

    
    header('Location: cursos.php ');

    

   
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
            <input type="text" name="name" required/>
          </div>
          <div class="input-container">
            <label for="description">description</label>
            <input type="text" name="description" required/>
          </div>

        
       
            <div>
            <label for="start">Start date:</label>

        <input type="date" id="date_start" name="date_start"
            value="2021-04-18"
            min="2021-04-18" max="2023-12-31">
            
           

            
            </div>

            <div>
            <label for="start">Start date:</label>

                <input type="date" id="date_end" name="date_end"
                value="2021-04-19"
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





