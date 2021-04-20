<?php
require_once 'conexion.php'; 
$mensaje = false;
    if(empty($_GET['id'])){
        header('Location: crearAsignaura.php');
    }

    $id_course = $_GET['id'];

    //INSERT INTO `phpcalendar`.`class` (`id_class`, `id_teacher`, `id_course`, `id_schedule`, `name`, `color`) VALUES ('1', '1', '1', '1', 'mates', 'red');
    if($_POST){
        
        $id_teacher=$_POST['id_teacher'];
        $id_course=$_POST['id_course'];
        $id_schedule=$_POST['id_schedule'];
        $name=$_POST['name'];
        $color=$_POST['color'];

        $sql = "INSERT INTO `phpcalendar`.`class` (`id_class`, `id_teacher`, `id_course`, `id_schedule`, `name`, `color`) VALUES (null, '$id_teacher', '$id_course', '$id_schedule', '$name', '$color');";
        $guardar = mysqli_query($db, $sql);
        $sql = "SELECT * FROM phpcalendar.class where id_teacher= '$id_teacher'and color='$color'and id_course = '$id_course';";
        $resultado = $db->query($sql);
        if($resultado->num_rows==1){
            $mensaje = true;
           
        }
    }
     if($mensaje){
    echo "<script>
               alert('Asignatura añadida');
               window.location= 'crearClase.php'
   </script>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/register.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrega Asignatura a curso</title>
</head>
<body>
    
<div id="login" class="container">
      <h3>Crear Asignatura</h3>



      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          
          <div class="input-container">
            <label for="id_teacher">id_teacher</label>
            <input type="number" name="id_teacher" min="1" max="10" required/>
          </div>

        
       
            <div class="input-container">
                <label for="id_course">id_course</label>
                <input type="number" name="id_course" min="1" max="3" value= <?php echo $id_course;?> required />
            </div>
            <div> 
           

            
            </div>

            <div class="input-container">
                <label for="id_schedule">id_schedule</label>
                <input type="number" name="id_schedule" min="1" max="20" required/>

            </div>

          
            
            
                <div class="input-container">
                    <label for="name">name</label>
                    <input type="text" name="name" required />
                </div>

                <div class="input-container">
                    <label for="color">color</label>
                    <input type="text" name="color" required />
                </div>

            

            <input type="submit" name="submit" values="Modificar" />
            
      </form>
     

</body>
</html>
