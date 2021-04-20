<?php

require_once 'conexion.php';

var_dump($_POST);


if(isset($_POST)){

    $username = isset($_POST['username']) ? $_POST['username'] : false;
    $pass= isset($_POST['pass']) ?  $_POST['pass'] : false;
    $email= isset($_POST['email']) ? $_POST['email'] : false;
    $name= isset($_POST['name']) ? $_POST['name'] : false;
    $telephone= isset($_POST['telephone']) ? $_POST['telephone'] : false;
    $nif= isset($_POST['nif']) ? $_POST['nif'] : false;
    $surname = isset($_POST['surname']) ? $_POST['surname'] : false;
    $type = isset($_POST['type']) ? $_POST['type'] : false;
    //array de errores

    $errores = array();

    //validar datos antes de guardar
    //username
    if(!empty($username) && !is_numeric($username) && !preg_match("/[0-9]/", $username)){
        $username_validate = true;
    }else {
        $errores['username'] = "El username no es valido";
        $username_validate = false;
        header('Location: registro.php ');
    }


     //pass
     if(!empty($pass)){
        $nombre_validate = true;
    }else {
        $errores['pass'] = "La contraseña esta vacia";
        $pass_validate = false;
        header('Location: registro.php ');
    }

    //email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emaile_validate = true;
    }else {
        $errores['email'] = "El email no es valido";
        $email_validate = false;
        header('Location: registro.php ');
    }

   

     //name
     if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $name_validate = true;
    }else {
        $errores['name'] = "El name no es valido";
        $name_validate = false;
        header('Location: registro.php ');
    }

     //surname
     if(!empty($surname)){
        $surname_validate = true;
    }else {
        $errores['surname'] = "El surname no es valido";
        $surname_validate = false;
        header('Location: registro.php ');
    }

     //telephone
     if(!empty($telephone)){
        $telephone_validate = true;
    }else {
        $errores['telephone'] = "El telephone esta vacia";
        $telephone_validate = false;
        header('Location: registro.php ');
    }

    //nif
    if(!empty($nif)){
        $nif_validate = true;
    }else {
        $errores['nif'] = "El nif esta vacia";
        $nif_validate = false;
        header('Location: registro.php ');
    }
    
    if($mail){
        header('Location: registrar.php ');
    }else{
        $sql = "INSERT INTO `users` (`id`, `username`, `pass`, `email`, `name`, `surname`, `telephone`, `nif`, `date_registered`) VALUES (NULL,  '$username', '$pass', '$email', '$name', '$surname',  '$telephone', '$nif', CURRENT_DATE());";
        $guardar = mysqli_query($db, $sql);
    }

    
}

