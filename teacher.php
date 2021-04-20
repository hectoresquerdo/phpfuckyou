<?php
require_once 'conexion.php'; 
$mail = false;
//INSERT INTO `phpcalendar`.`teachers` (`name`, `surname`, `telephone`, `nif`, `email`) VALUES ('hector', 'valverde', '605854545', '45644564', 'hector@hector.com');
if($_POST){
    $surname =$_POST['surname'];
    $email=$_POST['email'];
    $name= $_POST['name'];
    $telephone= $_POST['telephone'];
    $nif= $_POST['nif'];
    

    $sql = "SELECT * FROM `phpcalendar`.teachers where email = '$email' ";
    $resultado = $db->query($sql);
    
    if($resultado->num_rows==1){
        $mail = true;
       
    }else{
        
        $sql = "INSERT INTO `phpcalendar`.`teachers` (`name`, `surname`, `telephone`, `nif`, `email`) VALUES ('$name', '$surname', '$telephone', '$nif', '$email');";
        $guardar = mysqli_query($db, $sql);
        //$resultado = $db->query($sql);
        header('Location: teacher.php ');

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
    <title>Crear profesor</title>
</head>
<body>
<body>

<?php
    require("menu.php");
?>
    <div id="login" class="container">
      <h3>Crear profesor</h3>

      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          <div class="input-container">
            <label for="name">name</label>
            <input type="text" name="name" required/>
          </div>
          <div class="input-container">
            <label for="surname">surname</label>
            <input type="text" name="surname" required/>
          </div>

        
       
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email"required />
            </div>
            <div> 
           

            
            </div>

            <div class="input-container">
                <label for="telephone">telephone</label>
                <input type="text" name="telephone" required/>

            </div>

          
            
            
                <div class="input-container">
                    <label for="nif">Nif</label>
                    <input type="text" name="nif"required />
                </div>

            

            <input type="submit" name="submit" values="Registrar" />
            
      </form>
      <?php 
      if($mail){
        echo "<h3>El Email introducido ya existe</h3>";
      }
      ?>
  </body>
    
</body>
</html>





