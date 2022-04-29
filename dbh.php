<?php

$conn=mysqli_connect("localhost","root","","loginsystemproject");

if(!$conn){
    die("connection lost".mysqli_connect_error());
}