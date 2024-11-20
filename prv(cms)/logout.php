<?php 

    session_start();
    
    session_unset();
    session_destroy();
//url(../images/11.jpg)

header("location:login.php");


?>