<?php
session_start();
//var_dump($_REQUEST);

if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {
    //filtaration
     require_once('classes.php');
      user::login($_REQUEST["email"], md5($_REQUEST["password"]));




}else {
    header("location:index.php?msg=empty_field");
}
