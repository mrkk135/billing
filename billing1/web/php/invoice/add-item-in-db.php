<?php 

include('config.php');

echo $cname;


if($db_total == 0.00 ){

}else{    
    $item = "insert into item values( NULL , '$db_name', '$db_sr', ' $db_amount', ' $db_discount ', ' $db_cgst', '$db_sgst', '$db_total')";

mysqli_query($conn , $item);
}


?>