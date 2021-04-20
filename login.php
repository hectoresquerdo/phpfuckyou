<?php require_once 'conexion.php'; 
     $invalid = false;
    if($_POST){
        $email= $_POST['email'];
        $contraseña= $_POST['password'];
        $sql = "SELECT * FROM `phpcalendar`.users where email = '$email' AND pass ='$contraseña'";
        $guardar = mysqli_query($db, $sql);
        $resultado = $db->query($sql);
        
        if($resultado->num_rows>0){
    
            while($row=$resultado->fetch_assoc()){
            
                $type = $row["type"];
                $id = $row["id"];
            
                if($type == 0){
                    $_SESSION['user']= $id;
                    header("Location: admin.php");
                }
                else{
                    $_SESSION['user']= $id;
                    header("Location: user.php");
    
                }
            }
        } else{
            $invalid = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle</title>
    
    <link rel="stylesheet" href="./css/login.css" />
</head>
<body>

<div class="login">
      <h3>Identificate</h3>
      <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Escribe el email" required/>

        <label for="password">Contraseña</label>
        <input
          type="password"
          name="password"
          placeholder="Escribe la contraseña"required
        />

        <input type="submit" values="Entrar" class="submit" />
      </form>
      
      <?php 
      if($invalid){
        echo "<h3>Credenciales Incorrectas</h3>";
      }
      ?>
      
    </div>
    

</body>
</html>



