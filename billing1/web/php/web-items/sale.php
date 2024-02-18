<?php
error_reporting(0);
include('config.php');

if($web==1){
}else{
    die("<center><h2 style='color:red'>Error to enter this page</h2></center>");
}

$sql = "SELECT * FROM bill ORDER BY invoice DESC";
$q = mysqli_query($conn, $sql);
$pay=0;
$unpay=0;
if (mysqli_num_rows($q) > 0) 
{
while ($row = mysqli_fetch_assoc($q)) 
{
    if($row['status']=='paid')
    {
        $temp = $row['amount']+$pay;
        $pay=$temp;
    }
    else if($row['status']=='unpaid')
    {
        $temp1 = $row['amount']+$unpay;
        $unpay=$temp1;
    }
}
}

$total=$pay+$unpay;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5" /> -->
    <title>HOME</title>
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/style.css">
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/sale.css">


</head>

<body>
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
                <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%);">
                <a href="#" style="color:#ffffff;">Add Purchase</a>
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

    <div class="main">
        <div class="cal">
            <div class="paid">
                <h4>Paid</h4>
                <p>₹<?php echo $pay ; ?></p>
            </div>
            <p class="sum">+</p>
            <div class="unpaid">
                <h4>Unpaid</h4>
                <p>₹<?php echo $unpay ; ?></p>
            </div>
            <p class="sum">=</p>
            <div class="total">
                <h4>Total</h4>
                <p>₹<?php echo $total ; ?></p>
            </div>
        </div>
        <div class="content">
            <div class="tranaction">
                <h3>TRANACTION</h3>
                <div class="search">
                    <input type="text" name="tranaction_search" placeholder="Search..."><img src="http://localhost/www/billing1/icoin/search.png" alt="">
                </div>
                <div class="adds">
                    <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%); margin-left: 0px ;">
                    <a href="http://localhost/www/billing1/web/php/saleadd.php" style="color:#ffffff;">Add Sale</a>
                </div>
                <div class="tb">
                    <table>
                        <thead>
                            <tr>
                                <th>DATE <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>INVOICE NO. <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>NAME <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>TRANACTION TYPE <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>PAYMENT TYPE <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>AMOUNT <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th>STATUS <img src="http://localhost/www/billing1/icoin/filter.png" alt=""></th>
                                <th> </th>
                            </tr>
                        </thead>
                        <?php
                            $sql = "SELECT * FROM bill ORDER BY invoice DESC";
                            $q = mysqli_query($conn, $sql);
                            $pay=0;
                            $unpay=0;
                            if (mysqli_num_rows($q) > 0) 
                            {
                            while ($row = mysqli_fetch_assoc($q)) 
                            {
                                echo "<tr>"; 
                                { ?>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td><?php echo $row['cname']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['ptype']; ?></td>
                                    <td>₹<?php echo $row['amount']; ?></td>
                                    <?php
                                        if ($row['status'] == 'paid') 
                                        {
                                            echo "<td style='color: green;'>Paid</td>";
                                        } 
                                        else if ($row['status'] == 'unpaid') 
                                        {
                                            echo "<td style='color: red;'>Unpaid</td>";
                                        }
                                    ?>
                                    <td>
                                        <a href="http://localhost/www/billing1/invoice/invoice.php?name=<?php echo $row['cname']; ?>&amount=<?php echo $row['amount']; ?>&in=<?php echo $row['invoice']; ?>"><img src="http://localhost/www/billing1/icoin/print.png" alt=""></a>
                                        <a href="http://localhost/www/billing1/web/php/sale.php?id=<?php echo $row['invoice']; ?>"><img src="http://localhost/www/billing1/icoin./bin.png" alt="" style="position: relative; left:10px;"><?php $del = $_REQUEST['id']; mysqli_query($conn, "DELETE FROM bill WHERE invoice =$del"); ?></a>
                                        <a href="#"><img src="http://localhost/www/billing1/icoin/forward.png" alt="" style="position: relative; left: 20px;"></a>
                                        <a href="#"><img src="http://localhost/www/billing1/icoin/dots.png" alt="" style="position: relative; left: 30px;"></a>
                                    </td>
                                    <?php 
                                }
                                echo "</tr>";
                                $pay=0;
                                $unpay=0;

                            }
                            mysqli_close($conn);
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>