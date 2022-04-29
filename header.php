<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">about</a></li>
            <?php 
            
            if (isset($_SESSION['useruid']))
            {
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='logout.inc.php'>logOut</a></li>";
            }
            else
            {   
                echo "<li><a href='signup.php'>sigup</a></li>";
                echo "<li><a href='login.php'>login</a></li>";
            }

            ?>
        </ul>
    </nav>
