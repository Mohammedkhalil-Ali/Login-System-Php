<?php


function emptyinput($name,$email,$username,$pwd,$pwdRepeat){
    $result;
    if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function usernameinvalid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function emailValidate($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function Passwordmatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameRetaken($conn,$username,$email){
    $sql="SELECT * FROM users WHERE usersUid=? OR usersEmail=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:signup.php?error=notconnect");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultCheck=mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($resultCheck)){
        return $row;
    }
    else
    {
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
    
}


function creatUser($conn,$name,$email,$username,$pwd){
    $sql="INSERT INTO users(usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:signup.php?error=notconnect");
        exit();
    }
    $hashpassword=password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:signup.php?error=not-error");
    exit();
}


function emptyinputlogin($pwd,$usermail){
    $result;
    if(empty($pwd)||empty($usermail)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function usermailvalid($conn,$usermail,$pwd){
    $uidExist=usernameRetaken($conn,$usermail,$usermail);

    if ($uidExist===false) {
        header("location:login.php?error=wrongEmailPassword");
        exit();
    }

    $pwdhash=$uidExist["usersPwd"];
    $checkpass=password_verify($pwd,$pwdhash);

    if ($checkpass==false) {
        header("location:login.php?error=wrongPassword");
        exit();
    }elseif ($checkpass==true) {
        session_start();
        $_SESSION["userid"]=$uidExist['usersId'];
        $_SESSION["useruid"]=$uidExist["usersUid"];
        header("location:home.php");
        exit();
    }
}