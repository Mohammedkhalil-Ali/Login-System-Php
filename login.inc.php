<?php

if (isset($_POST["submit"])) {

    $usermail=$_POST['user'];
    $pwd=$_POST['pwd'];

    require_once("dbh.php");
    require_once("function.inc.php");

    if(emptyinputlogin($pwd,$usermail)!==false){
        header("location:signup.php?error=empty");
        exit();
    }

    usermailvalid($conn,$usermail,$pwd);

}
else{
    header("location:signup.php");
    exit();
}