<?php
error_reporting(0);
include('config.php');

if($web==1){
}else{
    die("<center><h2 style='color:red'>Error to enter this page</h2></center>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/style.css">
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/add-item.css">
    <style>
        .tranaction h3 {
            position: relative;
            font-size: 25px;
            top: 10px;
            left: 15px;
        }

        .cal {
            position: absolute;
            background: #ffffff;
            width: 98%;
            left: 15px;
            top: 50px;
            height: 100px;
            display: inline-flex;
            gap: 10px;
        }

        .cal .paid,
        .unpaid,
        .total {
            color: #225254;
            width: 20%;
            border-radius: 6px;
            position: relative;
            height: 70px;
            top: 15px;
            left: 20px;
            font-size: 18px;
            box-shadow: 1px 1px 10px #c5c5c5;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .cal .paid {
            background: #B9F3E7;
        }

        .cal .paid h4,
        .cal .unpaid h4,
        .cal .total h4 {
            position: relative;
            left: 30px;
            top: 10px;
        }

        .cal .paid p,
        .cal .unpaid p,
        .cal .total p {
            position: relative;
            left: 30px;
            top: 10px;
            font-weight: 300;

        }

        .cal .sum {
            font-size: 28px;
            font-weight: bold;
            position: relative;
            top: 33px;
            left: 20px;
        }

        .cal .unpaid {
            background: #D0E6FE;
        }

        .cal .total {
            background: #F8C888;
        }

        .tb {
            position: absolute;
            bottom: 0%;
            margin-bottom: 5%;
            height: 60%;
            width: 98%;
            left: 2%;
            overflow: scroll;
            overflow-x: hidden;
            scrollbar-width: none;
            background: #ffffff;
        }

        .tb th img {
            float: right;
            width: 15px;
        }

        .tb thead tr th {
            position: sticky;
            top: 0;
        }

        .tb td {
            border-right: 1px solid #ddd;
            border-left: 1px solid #ddd;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px soliddddddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dddddd;
        }

        .adds {
            position: relative;
            top: 110px;
            float: right;
            margin-right: 40px;
            background-color: #0075E8;
            padding: 10px;
            border-radius: 30px;
            width: 99px;
        }

        .adds a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            position: relative;
            top: -2px;
            left: 10px;

        }

        .adds img {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%);
            position: relative;
            top: 2px;
            left: 7px;
        }

        .search input {
            display: inline-block;
            height: 26px;
            line-height: 26px;
            vertical-align: middle;
            border: 1px solid #ddd;
            outline: none;
            font-size: 14px;
            color: black;
            padding: 0 10px;
            box-sizing: border-box;
            position: relative;
            top: 150px;
            left: 15px;
            width: 300px;
        }

        .search img {
            cursor: pointer;
            position: relative;
            top: 156px;
            left: -15px;
        }
    </style>
</head>

<body>
    <div class="left">
        <div class="profile">
            <h2>
                <img src="http://localhost/www/billing1/icoin/user_icon.png" alt="#" />
                SHREE NATH SHOP
            </h2>
        </div>
        <div class="home">
        <p><img src="http://localhost/www/billing1/icoin/item.png" alt=""><a href="http://localhost/www/billing1/web/php/web-items/item.php">Items </a></p>
            <p><img alt="#" src="http://localhost/www/billing1/icoin/sale.png"><a href="http://localhost/www/billing1/web/php/web-items/sale.html">Sale </a></p>
            <p><img alt="#" src="http://localhost/www/billing1/icoin/user.png"><a href="#">Profile </a></p>
            <p><img src="http://localhost/www/billing1/icoin/setting.png" alt=""><a href="http://localhost/www/billing1/web/php/web-items/setting.php">Setting </a></p>
        </div>

    </div>
    <div class="righttop">
        <div class="add">
            <div class="addsale" style="background: #ED1A3B;">
                <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%); margin-left: 20px ;">
                <a href="http://localhost/www/billing1/icoin/saleadd.html" style="color:#ffffff;">Add Sale</a>
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
                <p>1000</p>
            </div>
            <p class="sum">+</p>
            <div class="unpaid">
                <h4>Unpaid</h4>
                <p>100</p>
            </div>
            <p class="sum">=</p>
            <div class="total">
                <h4>Total</h4>
                <p>900</p>
            </div>
        </div>
        <div class="content">
            <div class="tranaction">
                <h3>TRANACTION</h3>
                <div class="search">
                    <input type="text" name="tranaction_search" placeholder="Search..."><img src="http://localhost/www/billing1/icoin/search.png" alt="">
                </div>
                <div class="adds">
                    <img src="http://localhost/www/billing1/icoin/plus1.png" alt="" style="filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(235deg) brightness(103%) contrast(102%); margin-left: 20px ;">
                    <a href="http://localhost/www/billing1/icoin/saleadd.html" style="color:#ffffff;">Add Sale</a>
                </div>
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
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM bill ORDER BY invoice DESC";
                    $q = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($q) > 0) {
                    ?>
                        <?php
                        while ($row = mysqli_fetch_assoc($q)) {
                            echo "<tr>"; { ?>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['invoice']; ?></td>
                                <td><?php echo $row['cname']; ?></td>
                                <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['ptype']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><a href="#"><img src="http://localhost/www/billing1/icoin/print.png" alt=""></a><a href="#"><img src="http://localhost/www/billing1/icoin/forward.png" alt="" style="position: relative; left: 20px;"></a> <a href="#"><img src="http://localhost/www/billing1/icoin/dots.png" alt="" style="position: relative; left: 30px;"></a></td>
                    <?php }
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>

    </div>
    <div>
        <div class="back">
            <div class="addsale">
            </div>
        </div>
        <div class="from">


            <div class="add_item">
                <h4 class="h4">Tranaction</h4>
                <div class="goback"><a href="http://localhost/www/billing1/web/php/sale.php"><img src="http://localhost/www/billing1/icoin/cancel.png" alt=""></a></div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="sub_topic1">
                        <h4 class="topic">Name</h4>
                        <h4 style="position:relative; left: 400px; top: 2px; font-size: 15px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Tranaction Type</h4>
                        <input type="text" placeholder="Name" name="pname">
                        <select type="text" name="type" style="position:relative; left: 120px;">
                            <option value="sale">SALE</option>
                            <option value="purchase">PURCHASE</option>
                        </select>
                    </div>
                    <div class="sub_topic1">
                        <h4 class="topic">Payment Type</h4>
                        <select name="ptype" style="left: 20px;">
                            <option value="cash">CASH</option>
                            <option value="atm">ATM</option>
                            <option value="upi">UPI</option>
                            <option value="debit card">DEBIT CARD</option>
                            <option value="credit card">CREDIT CARD</option>
                        </select>
                        <h4 class="topic" style="left: 400px; top: -35px;">Status</h4>
                        <select name="status" style="left: 400px; top: -11px; ">
                            <option value="paid">PAID</option>
                            <option value="unpaid">UNPAID</option>
                        </select>
                    </div>
                    <div class="sub_topic2">
                        <h4 class="topic">Amount</h4>
                        <input type="text" placeholder="Amount" name="amount">
                    </div>
                    <div class="sub_topic3">
                        <h4 class="topic">Taxes</h4>
                        <select name="taxes">
                            <option value="None">None</option>
                            <option value="None">1%</option>
                            <option value="None">3%</option>
                            <option value="None">5%</option>
                        </select>
                    </div>
                    <div class="go">
                        <button type="submit">
                            <p>Save</p>
                        </button>
                        <style>
                            button {
                                background: #0075E8;
                                position: relative;
                                top: 20px;
                                height: 35px;
                                left: 545px;
                            }

                            button:hover {
                                background-color: #0069d9;
                            }

                            .goback {
                                float: right;
                                position: relative;
                                right: 15px;
                                top: -10px;
                            }

                            .goback:hover {
                                padding: 1px;
                            }
                        </style>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <style>
        .from {
            position: absolute;
            width: 80%;
            left: 10%;
            top: 10%;
            height: 80%;
        }

        .back {
            background: #ffffff95;
            width: 100%;
            height: 100%;
            position: absolute;
        }

        .addsale {
            filter: blur(400px);
            position: relative;
            width: 80%;
            left: 10%;
            top: 10%;
            height: 80%;
        }
    </style>
</body>
<?php
$date = date("Y/m/d");
$pname = $_POST['pname'];
$type = $_POST['type'];
$ptype = $_POST['ptype'];
$amount = $_POST['amount'];
$status = $_POST['status'];
if ($pname == NULL || $amount == NULL) {
} else {
    $sql = "insert  into bill values('$date','$invioce','$pname','$type','$ptype','$amount','$status')";
    $q = mysqli_query($conn, $sql);
}
?>

</html>