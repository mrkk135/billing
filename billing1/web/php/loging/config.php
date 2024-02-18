<?php
$db_host 		= "localhost";
$db_user 		= 'root';
$db_password 	= '';
$db_name 		= "billing";
$conn = mysqli_connect( $db_host , $db_user , $db_password ) or die("can not connect");
mysqli_select_db($conn , $db_name);

$weblogin = "SELECT * FROM users where 1";
$r = mysqli_query($conn, $weblogin);

if (mysqli_num_rows($r) > 0)
{
    while ($row = mysqli_fetch_assoc($r))
    { 
        $web = $row['logi'];
    }
}

