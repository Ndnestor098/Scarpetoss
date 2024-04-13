<?php
require_once("./main.php");

$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

if(isset($_POST['politica-privacidad-check'])){
    $politicas = $_POST['politica-privacidad-check'];
}else{
    echo 'Las politicas de privacidad son obligatorias';
    exit();
}

if($email != '' && $name != '' && $message != ''){
    $verificacion = new Scarpetoss();

    if($verificacion->verifyEmail($email)){
        $VEmail = true;
    }else{
        echo 'El email no es valido';
        exit();
    }

    $name = $verificacion->cleanString($name);
    $email = $verificacion->cleanString($email);
    $message = $verificacion->cleanString($message);

}else{
    echo 'Debe rellenar todas las casillas';
    exit();
}



if($VEmail){
    echo './gracias.php';

    exit();
}


?>