<?php

abstract class User
{
    public $id;
    public $name;
    public $email;
    public $phone;
    protected $password;
    public $created_at;
    public $updated_at;





    public static function  login($email, $password)
    {
        $user = null;
        $qry = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $result = mysqli_query($cn, $qry);
        if ($arr = mysqli_fetch_assoc($result)) {
            var_dump($arr);
        }else{
            echo "no user";
        }
    }

}


class Subscriber extends User
{
    public $role = "subscriber";

    public static function register($name, $email, $password, $phone)
    {
        $qry = "INSERT INTO USERS (name , email , password , phone) 
        VALUES ('$name' , '$email' , '$password' , '$phone')";

        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $result = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $result;
    }




}





class Admin extends User
{
    public $role = "admin";
}