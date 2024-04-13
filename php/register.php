<?php
require_once("./main.php"); 

$email = $_POST['email'];
$name = $_POST['name'];
$claves = [$_POST['clave-1'], $_POST['clave-2']];


if(isset($_POST['politica-privacidad-check'])){
    $politicas = $_POST['politica-privacidad-check'];
}else{
    echo 'Las politicas de privacidad son obligatorias.';
    exit();
}

if($claves[0] == $claves[1]){
    $verificacion = new Scarpetoss();

    if($verificacion->verifyEmail($email)){
        $VEmail = true;
    }else{
        echo 'El email no es valido.';
        exit();
    }
    
    if($verificacion->verifyKey($claves[0]) && $verificacion->verifyKey($claves[1])){
        $VClave = true;
    }else{
        echo 'La clave debe contener min. 8 digitos y numeros.';
        exit();
    }

    $name = $verificacion->cleanString($name);
    $email = $verificacion->cleanString($email);
    $claves[0] = $verificacion->cleanString($claves[0]);
    $claves[1] = $verificacion->cleanString($claves[1]);

}else{
    echo 'La clave que ingresaste no son iguales.';
    exit();
}

if($VClave && $VEmail){
    $VEmail = $verificacion->getUserEmail($email);
    if($VEmail == 'Correo email ya existente'){
        echo "Usuario ya existente.";
        exit();
    } else{
        $verificacion->setSQL("INSERT INTO users(users_name, users_email, users_key, users_admin) VALUES ('$name', '$email', '$claves[0]', false)");
        echo './login.php';
        exit();
    }
}


?>