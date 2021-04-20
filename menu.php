<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="mod.php">Actualizar</a></li>
  <?php
  require_once 'conexion.php';
  $userId = $_SESSION['user'];
  $sql = "SELECT * FROM `phpcalendar`.users where id = $userId";
  $mail = false;
  $guardar = mysqli_query($db, $sql);
 $resultado = $db->query($sql);

 if($resultado->num_rows>0){
    
    while($row=$resultado->fetch_assoc()){
    
        $type = $row["type"];
    }
}


  if($type == 0){ ?>
  
  <li><a href="cursos.php">Crear Curso</a></li>
  
  <li><a href="listaTeacher.php">Lista de Profesores</a></li>

  <li><a href="crearAsignaura.php">Crear Asignatura</a></li>

  <li><a href="schedule.php">Crear Clase</a></li>

  <li><a href="calendario.php">Calendario</a></li>
  <?php }else{ ?>

    <li><a href="Asignaura.php">Asignaturas</a></li>

  <?php } ?>
  <li><a href="endSession.php">Cerrar session</a></li>
  
</ul>



</body>
</html>
