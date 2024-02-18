<?php 
include('config.php');

{
        $username = $_POST["uname"];
        $password = ($_POST["psw"]);
        $query = "SELECT * FROM users where 1 ";
        $data = mysqli_query($conn, $query);
        if($row = mysqli_num_rows($data) > 0  ) 
        {   
            while ($row = mysqli_fetch_assoc($data))
            {
                $user = $row['username']; 
                $pws = $row['passwords']; 
            }                
        }
        if ($user == $username && $pws === $password ) {
            if($web==0){
                $sql = "UPDATE users SET logi = '1'";
                mysqli_query($conn , $sql);
            }
            echo "<script>window.location.href = 'http://localhost/www/billing1/web/php/web-items/sale.php';</script>";
        }
    }
    ?>
    <div class="notification show" >
    <center><h2>Login unsuccessful</h2>
    </center>
    </div>
   