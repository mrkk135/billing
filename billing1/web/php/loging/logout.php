<?php
error_reporting(0);
    include('config.php');
    $logout="UPDATE users SET logi = '0'";
    $run = mysqli_query($conn , $logout);
    if($run)
    {
        echo "<script>window.location.href = 'http://localhost/www/billing1/login.html';</script>";  
    }

?>