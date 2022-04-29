<?php


if (isset($_POST["submit"])) {

    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $username=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $pwdRepeat=$_POST['pwdrepeat'];

    require_once("dbh.php");
    require_once("function.inc.php");

    if(emptyinput($name,$email,$username,$pwd,$pwdRepeat)!==false){
        header("location:signup.php?error=empty");
        exit();
    }

    if(usernameinvalid($username)!==false){
        header("location:signup.php?error=usernameRetaken");
        exit();
    }

    if(emailValidate($email)!==false){
        header("location:signup.php?error=Email Not validet");
        exit();
    }

    if(Passwordmatch($pwd,$pwdRepeat)!==false){
        header("location:signup.php?error=password not equals");
        exit();
    }

    if(usernameRetaken($conn,$username,$email)!==false){
        header("location:signup.php?error=usernameRetaken");
        exit();
    }

    creatUser($conn,$name,$email,$username,$pwd);

}
else{
    header("location:signup.php");
    exit();
}