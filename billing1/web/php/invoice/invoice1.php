<?php
include('config.php');
if($web==1){
}else{
    die("<center><h2 style='color:red'>Error to enter this page</h2></center>");
}

$cname = $_POST['cname'];
$contact = $_POST['contact'];
$email = $_POST['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $objects = array(array());
    $total_amount = 0;
    $total_sgst = 0;
    $total_cgst = 0;
    $total_discount = 0;  

    for ($i = 0; $i < count($_POST["name"]); $i++) 
    {
        $object = (object) array(
        'name' => $_POST["name"][$i],
        'qty' => $_POST["qty"][$i],
        'price' => $_POST["price"][$i],
        'discount' => $_POST["discount"][$i],
        'sgst' => $_POST["sgst"][$i],
        'cgst' => $_POST["cgst"][$i],
        );

        $total = ($object->price * $object->qty) - ($object->price * $object->qty * $object->discount / 100);
        $sgst_amount = $total * ($object->sgst / 100);
        $cgst_amount = $total * ($object->cgst / 100);
        $grand_total = $total + $sgst_amount + $cgst_amount;

        $objects[] = $object;

        $total_amount += $grand_total;
        $total_sgst += $sgst_amount;
        $total_cgst += $cgst_amount;
        $total_discount += ($total * ($object->discount / 100));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    function displayValues($objects, $total_amount, $total_sgst, $total_cgst, $total_discount){}
    displayValues($objects, $total_amount, $total_sgst, $total_cgst, $total_discount);
}

$sql1 = "SELECT * FROM users where 1";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $logo = $row['logo'];
        $bname = $row['bname'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
}

$cname = $_POST['cname'];
$contactno  = $_POST['contact'];
$emailid   = $_POST['email'];
if($cname == NULL)
{
    $cname = "CLassic enterprises";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bill</title>
</head>

<body>
    <form action="add-item-in-db.php" method="post">

        <div class="sale">
            <div class="main">
                <div class="logo">
                    <img src="http://localhost/www/billing1/web/php/web-items/<?php echo $logo ;?>" class="logo">
                </div>
                <div class="shop-d" width="600px">
                    <h2><?php echo $bname; ?>
                    </h2>
                    <p>
                        Email : <?php echo $email ; ?> <br>
                        Contact : +91 <?php echo $phone;?>
                    </p>
                </div>
                <table>
                    <tr class="text-a">
                        <th colspan="5" class="bill-to">Bill To:</th>
                        <td colspan="4" rowspan="4">
                            <b>
                                Invoice No. : <?php echo $invoice; ?><br>
                                <br>
                                Date :<?php $date = date("d/m/y"); echo $date ?><br>
                                <br>
                                Time :  <?php  date_default_timezone_set("Asia/Calcutta"); echo date(' H : i : s '); ?>  <br><br>
                            </b>
                        </td>
                    </tr>
                    <div class="top-bill">

                        <tr>
                            <td colspan="5"><b>Name : </b><?php echo $cname; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5"><b>Email : </b><?php echo $emailid;?></td>
                        </tr>
                        </div>
                        <tr>
                            <td colspan="5"><b>Contact No. : </b><?php echo $contactno;?></td>
                    </tr>
                    <tr>
                    <tr>
                        <th class="th">#</th>
                        <th class="th">No. of Items </th>
                        <th class="th">Item name</th>
                        <th class="th">Quantity</th>
                        <th class="th">Price/Unit</th>
                        <th class="th">Discount</th>
                        <th class="th">CGST</th>
                        <th class="th">SGST</th>
                        <th class="th">Amount</th>
                    </tr>
                    <?php
                        $srno = 0;
                        foreach ($objects as $object) {
                          $total = ($object->price * $object->qty) - ($object->price * $object->qty * $object->discount / 100);
                          $sgst_amount = $total * ($object->sgst / 100);
                          $cgst_amount = $total * ($object->cgst / 100);
                          $grand_total = $total + $sgst_amount + $cgst_amount;
                        
                          echo "
                                <tr> 
                                    <td>#</td>
                                    <td>" . $srno++ . "</td>
                                    <td>" . htmlspecialchars($object->name) . "</td>
                                    <td>" . htmlspecialchars($object->qty) . "</td>
                                    <td>" . htmlspecialchars($object->price) . "</td>
                                    <td>" . htmlspecialchars($object->discount) . "%</td>
                                    <td>₹" . number_format($sgst_amount, 2) . "</td>
                                    <td>₹" . number_format($cgst_amount, 2) . "</td>
                                    <td>₹" . number_format($total, 2) . "</td>
                                </tr>
                        ";
                        $sr = $srno-1;
                    }
                    ?>
                    </tr>
                    <tr>
                        <td colspan="9">`</td>
                    </tr>
                    <tr>
                        <th class="th" colspan="4">`</th>
                  
                        <th class="th" colspan="5" rowspan="2">Amount</th>
                    </tr>

                    <tr>
                        <td colspan="4" rowspan="4"></td>
                    </tr>
                    <tr>
                        <td colspan="4">Total Discount</td>
                        <td>₹<?php echo number_format($total_discount, 2) ;  ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Total Amount</td>
                        <td>₹<?php echo number_format($total_amount, 2) ;?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Total SGST</td>
                        <td>₹<?php echo  number_format($total_sgst, 2);?></td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="3"></td>
                        <td colspan="4">Total CGST</td>
                        <td>₹<?php echo number_format($total_cgst, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">No of items:</td>
                        <td><?php echo $sr ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Net Payable Amount : </b></td>
                        <td>₹<b><?php echo number_format($total_amount + $total_sgst + $total_cgst, 2);?></b></td>
                    </tr>
                    <tr>
                        <th class="th" colspan="4">Invoice Amount in Words</th>
                        <th class="th" colspan="5">Description:</th>
                    </tr>
                    <tr>
                        <td colspan="4">xyz</td>
                        <td rowspan="3" colspan="5">sale Description</td>
                    </tr>
                    <tr>
                        <th colspan="4">Payment Mode</th>
                    </tr>
                    <tr>
                        <td colspan="4">Cash(1234)</td>
                    </tr>
                    <tr>
                        <th class="th" colspan="3">Terms and condition</th>
                        <th colspan="3" rowspan="4">upi bar code</th>
                        <th colspan="3" rowspan="4">
                            <p>for: jay sunhaji genrale ware</p>Authoirized signatory
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="5">Thanks for doing business with us!</td>
                    </tr>

                </table>
                
            </div>
        </div>
        
        <?php  
            $db_name     = $cname ;        
            $db_discount = number_format($total_discount, 2) ; 
            $db_amount   = number_format($total_amount, 2) ;
            $db_sgst     = number_format($total_sgst, 2);
            $db_cgst     = number_format($total_cgst, 2);
            $db_sr       = $sr;
            $db_total    = number_format($total_amount + $total_sgst + $total_cgst, 2); 
                
        ?>
        <button type="submit" class="print" onclick="window.print() ">
        Print on : 
        <?php  
            date_default_timezone_set("Asia/Calcutta"); 
            echo date('d/m/y ( h : i : s)'); 
        ?>
        </button>
    </form>
</body>
<style>
    @page {
        size: A4;
        /* set paper size to A4 */
        margin: 0.4cm;
        /* set margins for the page */
    }

    .logo {
        width: 100px;
        height: 100px;
        position: relative;
        left: 3px;
        top: 3px;
    }

    .shop-d {
        width: 400px;
        position: relative;
        float: right;
        top: -110px;
        height: 100px;
        font-size: 20px;
        text-align: right;
        right: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        /* set table width to 100% of page width */
        font-size: 15px;
        /* set font size */
        height: 100%;
        top: -60px;
        position: relative;
    }

    th,
    td {
        border: 1px solid black;
        text-align: left;
    }

    .th {
        background-color: #5EA1BC;
    }

    .sale {
        background-color: #FFFFFF;
        width: 100%;
        /* set sale div width to 100% of page width */
        height: 100%;
        /* set sale div height to 100% of page height */
        border: #000 2px solid;
    }

    .bill-to {
        background-color: #0979A7;
    }

    .text-a td {
        text-align: right ;
    }

    .print {
        inline-size: 100%;
        background: #FFFFFF;
        height: 25px;
        width: 100.2%;
    }
</style>
</html>