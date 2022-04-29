<?php
require_once ("header.php");
?>

<div>
    <form action="signup.inc.php" method="POST" style="width:10%;margin:0 auto"><br>
        <input type="text" placeholder="FullName..." name="fullname"><br>
        <input type="email" placeholder="E-Mail" name="email"><br>
        <input type="text" placeholder="Userid" name="uid"><br>
        <input type="password" placeholder="Password" name="pwd"><br>
        <input type="password" placeholder="Reapet password" name="pwdrepeat"><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>