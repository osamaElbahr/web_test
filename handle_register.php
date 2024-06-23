<?php
session_start();
$errors = [];
if(empty($_REQUEST["name"])) $errors["name"] ="name is required";
if(empty($_REQUEST["email"])) $errors["email"] ="email is required";
if(empty($_REQUEST["pw"])|| empty($_REQUEST["pc"]))
{ $errors["pw"] ="password and  password cofirmation is required";}
else if($_REQUEST["pw"] != ($_REQUEST["pc"])){
    $errors["pc"] = "password configration must be equal to password";
}



$name=htmlspecialchars(trim($_REQUEST["name"]));
$email=filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$password=htmlspecialchars($_REQUEST["pw"]);
$password_configuration=htmlspecialchars($_REQUEST["pc"]);
$phone=htmlspecialchars($_REQUEST["phone"]);

if(! empty($_REQUEST["email"])&& !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL))$errors["email"]="email invalide formate please add aa@pp.com";
if(empty($errors)){
   require_once('classes.php');
try {
    $rslt = Subscriber::register($name,$email,md5($password),$phone); 
    header("location:index.php?msg=sr");


      
} catch (\Throwable $th) {
    header("location:rejister.php?msg=ar");
}

}
else{
    $_SESSION["errors"]=$errors;
    header("location:rejister.php");
}
