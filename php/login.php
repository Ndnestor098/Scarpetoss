<?php
require_once("./main.php");

$email = $_POST['email'];
$clave = $_POST['clave'];

if($clave != '' && $email != ''){
    $verificacion = new Scarpetoss();

    if($verificacion->verifyEmail($email)){
        $VEmail = true;
    }else{
        echo 'El email no es valido.';
        exit();
    }

    $email = $verificacion->cleanString($email);
    $clave = $verificacion->cleanString($clave);

}else{
    echo 'Rellene todos los campos.';
    exit();
}

if($VEmail){
    $VEmail = $verificacion->getUser($email, $clave);

    if($VEmail == 'Correo email ya existente'){
        if(isset($_POST['recordarme-check'])){
            $politicas = $_POST['recordarme-check'];
            $user = $verificacion->getUserAll($email); 
            $verificacion->session($user[0], $user[1], $user[2]);

            echo "/";
            exit();
        }
        $user = $verificacion->getUserAll($email); 
        $verificacion->session($user[0], $user[1], $user[2]);
        
        echo "/";
        // $user = $verificacion->getUserAll($email);
        // echo '-'.$user[0].'-'.$user[1].'-'.$user[2];
        exit();

    } else{
        echo 'Usuario o clave incorrectas.';
        exit();
    }
}
?>