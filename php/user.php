<?php
require_once("./main.php");
session_name("LOGIN");
session_start();

$class = new Scarpetoss();

if(isset($_POST['customer-name'])){
    $name = $class->cleanString($_POST['customer-name']);
}
if(isset($_POST['customer-key'])){
    $clave = $class->cleanString($_POST['customer-key']);
}
if(isset($_POST['customer-key-new'])){
    $clave_new =  $class->cleanString($_POST['customer-key-new']);
}

if($_GET['part'] == '1'){
    $data = $class->getUserAll($_SESSION['email']);

    if($clave == ''){
        echo 'Rellene el campo de clave.';
        exit();
    }
    if($data[3] == $clave){
        if($data[1] != $name){
            $id = $_SESSION['ugid'];
            echo $class->setSQL("UPDATE users SET users_name='$name' WHERE users_ID = $id");
            exit();
        }else{
            echo 'No se ha modificado el nombre.';
            exit();
        }
    }else{
        echo 'La clave es incorrecta.';
        exit();
    }
}else if($_GET['part'] == '2'){
    $data = $class->getUserAll($_SESSION['email']);

    if($clave == '' && $clave_new == ''){
        echo 'Rellene el campo de clave.';
        exit();
    }
    if(!$class->verifyKey($clave_new)){
        echo 'La clave debe contener min. 8 digitos<br> y numeros.';
        exit();
    }
    if($data[3] == $clave){
        if($data[3] != $clave_new){
            $id = $_SESSION['ugid'];
            echo $class->setSQL("UPDATE users SET users_key='$clave_new' WHERE users_ID = $id");
            exit();
        }else{
            echo 'La clave es la misma.';
            exit();
        }
    }else{
        echo 'La clave es incorrecta.';
        exit();
    }
}


?>