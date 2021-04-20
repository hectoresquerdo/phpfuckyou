<?php require_once 'conexion.php'; 
     
     $userId = $_SESSION['user'];
     
     $sql = "SELECT * FROM `phpcalendar`.users where id = $userId";
     $mail = false;
     $guardar = mysqli_query($db, $sql);
    $resultado = $db->query($sql);
        
        if($resultado->num_rows>0){
    
            while($row=$resultado->fetch_assoc()){
            
                $username = $row["username"];
                $pass = $row["pass"];
                $surname = $row["surname"];
                $email = $row["email"];
                $pass = $row["pass"];
                $telephone = $row["telephone"];
                $name = $row["name"];
                $nif = $row["nif"];

            }
        }

        if($_POST){
            $username =$_POST['username'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
            $surname = $row["surname"];
            $name= $_POST['name'];
            $telephone= $_POST['telephone'];
            $nif= $_POST['nif'];
            
             
            $sql = "SELECT * FROM `phpcalendar`.users where email = '$email' ";
            $guardar = mysqli_query($db, $sql);
            $resultado = $db->query($sql);
    
            if($resultado->num_rows>0){
                $mail = true;
               
            }else{
                $sql = "UPDATE `users` SET `username` = '$username', `name` = '$name', `surname` = '$surname', `telephone` = '$telephone', `nif` = '$nif' WHERE `users`.`id` = $userId;";
                $guardar = mysqli_query($db, $sql);
                $resultado = $db->query($sql);
                header('Location: login.php ');
    
            }
                   
        }
        
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/modificar.css" />
    <title>Modificar Datos</title>
</head>
<body>
<body>
<?php
    require("menu.php");
?>
    <div id="login" class="container">
      <h3>Modificar usuario</h3>

      <form <?php echo $_SERVER['PHP_SELF']; ?> method="POST">
          <div class="input-container">
            <label for="username">Username</label>
            <input type="text" name="username" value= <?php echo "$username"?> required/>
          </div>
          <div class="input-container">
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" value= <?php echo "$pass"?> required/>
          </div>
       
            <div class="input-container">
                <label for="email">Email</label>
                <input type="email" name="email"value= <?php echo "$email"?> required />
            </div>

            <div class="input-container">
                <label for="name">Nombre</label>
                <input type="text" name="name" value= <?php echo "$name"?> required/>

            </div>

            <div class="input-container">
                <label for="surname">Apellido</label>
                <input type="text" name="surname" value= <?php echo "$surname"?> required/>
            </div>
            
            <div class="input-container">
                <label for="telephone">Telefono</label>
                <input type="text" name="telephone" value= <?php echo "$telephone"?> required/>
            </div>
                <div class="input-container">
                    <label for="nif">Nif</label>
                    <input type="text" name="nif" value= <?php echo "$nif"?> required />
                </div>

            <input type="submit" name="submit" values="Registrar" class="btn-submit"/>
            <?php 
      if($mail){
        echo "<h3>El mail introducido ya existe</h3>";
      }
      ?>
      </form>
      
  </body>
    
</body>
</html>