<?php
require_once 'conexion.php'; 
$mail = false;
$mensaje= false;
//INSERT INTO `phpcalendar`.`teachers` (`name`, `surname`, `telephone`, `nif`, `email`) VALUES ('hector', 'valverde', '605854545', '45644564', 'hector@hector.com');
if($_POST){
    $idTeacher = $_GET['id'];
    $surname =$_POST['surname'];
    $email=$_POST['email'];
    $name= $_POST['name'];
    $telephone= $_POST['telephone'];
    $nif= $_POST['nif'];
    

    $sql = "SELECT * FROM `phpcalendar`.teachers where email = '$email' and id_teacher != $idTeacher; ";
    $resultado = $db->query($sql);
    
    if($resultado->num_rows==1){
        $mail = true;
       
    }else{
        
        $sql = "UPDATE `phpcalendar`.`teachers` SET `name` = '$name', `surname` = '$surname', `telephone` = '$telephone', `nif` = '$nif', `email` = '$email' WHERE (`id_teacher` = '$idTeacher');";
        $guardar = mysqli_query($db, $sql);
        //$resultado = $db->query($sql);
        header('Location: listaTeacher.php ');
        $mensaje= true;
    }
    if($mensaje){
        echo "<script>
                   alert('Asignatura añadida');
                   window.location= 'crearClase.php'
       </script>";
    }
   
}
// Mostrar datos
if(empty($_GET['id'])){
    header('Location: listaTeacher.php');
}
$idTeacher = $_GET['id'];

$sql = mysqli_query($db, "select name, surname, telephone, nif, email from phpcalendar.teachers where id_teacher = $idTeacher;");

$resultado_sql = mysqli_num_rows($sql);

if($resultado_sql == 0){
    header('Location: listaTeacher.php');
}else{

    while($data = mysqli_fetch_array($sql)){
        $name = $data['name'];
        $surname = $data['surname'];
        $telephone = $data['telephone'];
        $nif = $data['nif'];
        $email = $data['email'];

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
    <title>Modificar Profesor</title>
</head>
<body>
<body>
    <div id="login" class="container">
      <h3>Modificar profesor</h3>

      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          <div class="input-container">
            <label for="name">name</label>
            <input type="text" name="name" value= <?php echo "$name"?> required/>
          </div>
          <div class="input-container">
            <label for="surname">surname</label>
            <input type="text" name="surname" value= <?php echo "$surname"?> required/>
          </div>

        
       
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email" value= <?php echo "$email"?> required />
            </div>
            <div> 
           

            
            </div>

            <div class="input-container">
                <label for="telephone">telephone</label>
                <input type="text" name="telephone" value= <?php echo "$telephone"?> required/>

            </div>

          
            
            
                <div class="input-container">
                    <label for="nif">Nif</label>
                    <input type="text" name="nif"value= <?php echo "$nif"?> required />
                </div>

            

            <input type="submit" name="submit" values="Modificar" />
            
      </form>
      <?php 
      if($mail){
        echo "<h3>El Email introducido ya existe</h3>";
      }
      ?>
  </body>
    
</body>
</html>





