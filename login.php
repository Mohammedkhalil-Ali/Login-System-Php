<?php
require_once ("header.php");
?>

<div>
    <form action="login.inc.php" method="POST" style="width:10%;margin:0 auto"><br>
        <input type="text" placeholder="Userid/E-Mail" name="user"><br>
        <input type="password" placeholder="Password" name="pwd">
        <button type="submit" name="submit">Submit</button>
    </form>
</div>