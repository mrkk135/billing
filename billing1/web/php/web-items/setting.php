<?php
error_reporting(0);
include('config.php');

if($web==1){
}else{
    die("<center><h2 style='color:red'>Error to enter this page</h2></center>");
}

if (isset($_POST["upload"])) 
{
    $filename =  $_FILES["filename"]["name"];
    $tempname =  $_FILES["filename"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($tempname, $folder);
    if($filename == null){
    }else{
        $sql = "UPDATE users SET logo = '$folder'";
        $data = mysqli_query($conn, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 96%;
        margin-left: 2%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    form {
        margin-top: 20px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        margin-top: 10px;
        margin-left: 2%;
        font-size: 13px;
    }

    button:hover {
        background-color: #45a049;
    }

    input {
        display: inline-block;
        vertical-align: middle;
        font-family: Arial, Helvetica, sans-serif;
        width: 150px;
        height: 20px;
    }

    .roll {
        height: 90%;
        overflow: scroll;
        overflow-x: hidden;
        bottom: 10%;
    }



    .h2 {
        font-size: 30px;
        position: relative;
        left: 20px;
    }

    .main2 {
        position: fixed;
        background: #BABECC;
        width: 18%;
        height: 682px;
        bottom: 0%;
    }

    .main1 {
        position: absolute;
        background: #E4E9EF;
        left: 18%;
        width: 82%;
        height: 100%;
    }

    .submenu a {
        text-decoration: none;
        display: block;
        color: black;
        padding: 14px 20px;
        padding-top: 20px;
        text-align: left;
        bottom: 0%;
        height: 25px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        margin-left: 0px;
    }

    /* Change the link color to red on hover */
    .submenu a:hover {
        background-color: rgb(76, 175, 80);
        color: black;
    }

    .active1 {
        background-color: rgb(220, 228, 198);
    }

    .img {
        width: 200px !important;
        height: 200px !important;
        position: relative;
        border-radius: 50%;

    }

    input {
        margin-top: 20px;
        background: #f5f7fa;
        border: 0cm;
        padding: 10px;
        font-size: 14px;
        border-radius: 20px;
        width: 300px;
        padding-left: 45px;
        outline: none;
        border: none;
        font-size: 18px;
        background: #dde1e7;
        color: #595959;
        border-radius: 25px;
        border-radius: 25px;
        box-shadow: inset 2px 2px 5px #BABECC,
            inset -5px -5px 10px #ffffff73;
    }

    input:focus {
        border-radius: 25px;
        box-shadow: inset 1px 1px 2px #BABECC,
            inset -1px -1px 2px #ffffff73;
    }

    .info {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        width: 400px;
        float: right;
        font-size: 25px;
        font-weight: 500;
        top: -250px;
        position: relative;
    }

    .button1 {
        margin: 15px 0;
        width: 150px;
        height: 50px;
        font-size: 25px;
        line-height: 50px;
        font-weight: 600;
        background: #0066ff;
        border-radius: 25px;
        position: relative;
        float: right;
        left: 360px;
        top: 200px;
        border: none;
        cursor: pointer;
        color: #ffffff;
        box-shadow: 2px 2px 5px #BABECC,
            inset -5px -5px 10px #ffffff73;
    }

    .button1 b {
        position: relative;
        top: -10px;
    }

    .button1:hover {
        transform: scale(1.03);
        box-shadow: inset rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px, rgb(84, 77, 77) 0px 1px 10px;

    }

    .profile .input {
        position: relative;
        top: 80px;
        left: 155px;
        width: 300px;
    }

    .logo {
        width: 200px !important;
        height: 200px !important;
        position: relative;
        left: 230px;
        top: 30px;
        border-radius: 50%;
        box-shadow: inset 2px 2px 5px #000000,
            inset -5px -5px 10px #00000073;

    }
</style>

<body>
    <div>
        <div class="left">
            <div class="profile">
                <h2>
                    <img src="http://localhost/www/billing1/icoin//images/user_icon.png" alt="#" />
                    SHREE NATH SHOP
                </h2>
            </div>
            <div class="home">
                <p><img src="http://localhost/www/billing1/icoin/item.png" alt=""><a href="http://localhost/www/billing1/web/php/web-items/item.php">Items </a></p>
                <p><img src="http://localhost/www/billing1/icoin/sale.png" alt=""><a href="http://localhost/www/billing1/web/php/web-items/sale.php">Sale </a></p>
                <p><img src="http://localhost/www/billing1/icoin/user.png" alt=""><a href="#">Profile </a></p>
                <p><img src="http://localhost/www/billing1/icoin/setting.png" alt=""><a href="http://localhost/www/billing1/web/php/web-items/setting.php">Setting </a></p>
            </div>

        </div>
        <div class="righttop">
            <div class="add">
                <div class="addsale" style="background: #ED1A3B;">
                    <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%); margin-left: 20px ;">
                    <a href="http://localhost/www/billing1/web/php/saleadd.php" style="color:#ffffff;">Add Sale</a>
                </div>
                <div class="addsale" style="background: #0075E8;">
                    <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%); margin-left: 20px ;">
                    <a href="http://localhost/www/billing1/web/php/saleadd.php" style="color:#ffffff;">Purchase</a>
                </div>
                <div class="addsale">
                    <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="margin-left: 20px;">
                    <a href="#">Add More</a>
                </div>
            </div>
            <div class="line"></div>
            <div class="sidemenu">
            <a href="http://localhost/www/billing1/web/php/loging/logout.php"><img src="http://localhost/www/billing1/icoin/logout.png" alt=""></a>
                <img src="http://localhost/www/billing1/icoin/print.png" alt="">
                <a href="http://localhost/www/billing1/web/php/web-items/setting.php"><img src="http://localhost/www/billing1/icoin/setting.png" alt=""></a>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="main2">
            <h2 class="h2">Settings</h2>
            <div class="submenu">
                <a class="active1" href="settings.php?page=general">General Settings</a>
                <a href="settings.php?page=socialmedia">Social Media Links</a>
                <a href="#contactform">Contact Form Settings</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
        <div class="main1">
            <form action="<?php echo $_SERVER['PHP-SELF']; ?>" method="post" enctype="multipart/form-data">

                <div class="profile">
                    <div class="logo">
                        <?php
                        $sql1 = "SELECT * FROM users where 1";
                        $result = mysqli_query($conn, $sql1);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['logo'];
                            }
                            echo "<img src='$id' class='img'>";
                        }

                        ?>
                    </div>
                    <input type="file" class="input" name="filename">
                    <br><br>
                </div><br>
                <div class="info">
                    Business Name:<input type="text" name="bname" placeholder="Business Name"><br>
                    Contact:<input type="text" name="contact" placeholder="Contact"><br>
                    Email ID:<input type="text" name="email" placeholder="Email"><br><br>
                </div>
                <button type="submit" class="button1" name="upload"><b>Save</b></button>
            </form>
        </div>
    </div>
</body>
<style>
    .sign{
        background: #4CAF50;
        color: #ddd;
        width: 250px;
        height: 50px;
        text-align: center;
        border-radius: 10px;
        position: absolute;
        top: 9%;
        left: 83%;
        font-size: 18px;
        z-index: 999;
    }
    .sign p{
        position: relative;
        top: 32%;
    }
    </style>

</html>
<?php 
    if ($data) {
        echo "
        <div class='sign'><p>Successfully Updated </p></div>
        ";
    }
    ?>