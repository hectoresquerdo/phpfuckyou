<?php
require_once 'conexion.php'; 
$mensaje = false;
    if(empty($_GET['id'])){
        header('Location: schedule.php');
    }

    $id_class = $_GET['id'];

    
    if($_POST){
        
        $time_start=$_POST['time_start'];
        $time_end=$_POST['time_end'];
        $day=$_POST['day'];
       //INSERT INTO `phpcalendar`.`schedule` (`id_class`, `time_start`, `time_end`, `day`) VALUES ('1', '10:00:00', '11:00:00', '2021-04-11');

        $sql = "INSERT INTO `phpcalendar`.`schedule` (`id_schedule`,`id_class`, `time_start`, `time_end`, `day`) VALUES (null,'$id_class', '$time_start', '$time_end', '$day');";
        $guardar = mysqli_query($db, $sql);
        $sql = "SELECT * FROM phpcalendar.schedule where id_class= '$id_class'and time_start='$time_start'and day = '$day';";
        $resultado = $db->query($sql);
        if($resultado->num_rows==1){
            $mensaje = true;
           
        }
    }
     if($mensaje){
    echo "<script>
               alert('Clase añadida');
               window.location= 'schedule.php'
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
    <title>Agrega clase a curso</title>
</head>
<body>
    
<div id="login" class="container">
      <h3>Crear clase</h3>





      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          
          <div class="input-container">
            <label for="time_start">time_start</label>
            <input type="time" name="time_start"  required/>
          </div>

        
       
            <div class="input-container">
                <label for="time_end">time_end</label>
                <input type="time" name="time_end"  required />
            </div>
            <div> 
           

            
            </div>

            <div class="input-container">
                <label for="day">day</label>
                <input type="date" name="day" required/>

            </div>

          
            
            
            

            <input type="submit" name="submit" values="crear" />
            
      </form>
     

</body>
</html>
