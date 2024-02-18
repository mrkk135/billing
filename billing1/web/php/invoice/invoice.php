<?php
include('config.php');
if($web==1){
}else{
    die("<center><h2 style='color:red'>Error to enter this page</h2></center>");
}

$cname = $_POST['cname'];
$contact = $_POST['contact'];
$email = $_POST['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $objects = array(array());

  $total_amount = 0;
  $total_sgst = 0;
  $total_cgst = 0;
  $total_discount = 0;

  for ($i = 0; $i < count($_POST["name"]); $i++) {
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function displayValues($objects, $total_amount, $total_sgst, $total_cgst, $total_discount)
  {
  }
  displayValues($objects, $total_amount, $total_sgst, $total_cgst, $total_discount);
}
?>
<style>
  body {
    font-family: Arial, sans-serif;
  }

  .invoice {
    border: 1px solid #ccc;
    padding: 20px;
    width: 210mm;
    height: 297mm;
    margin: 0 auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .invoice h1 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 20px;
  }

  .invoice h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #4a89ff;
  }

  .invoice .detail {
    margin-bottom: 30px;
  }

  .invoice .detail table {
    width: 100%;
    border-collapse: collapse;
  }

  .invoice .detail th,
  .invoice .detail td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
  }

  .invoice .paid_by {
    margin-bottom: 30px;
  }

  .invoice table {
    border-collapse: collapse;
    width: 100%;
  }

  .invoice table,
  .invoice th,
  .invoice td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
  }

  .invoice th {
    background-color: #f2f2f2;
  }

  .invoice .total {
    font-weight: bold;
    color: #4a89ff;
  }

  .sign {
    position: relative;
    float: end;
    clear: both;
    justify-content: space-between;
  }

  .gtotal {
    background: #ccc;
  }


  h2 {
    color: #4a89ff !important;
    text-align: center;
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="stylesheet" href="invoice.css">
</head>

<body>
  <div class="invoice">
    <h2>INVOICE</h2>
    <br>
    <div>Client ID:<b>25698</b></div>
    <br>
    <div class="ino">Invoice No:<b><?php echo $invoice; ?></b></div>
    <br>
    <div class="idate">Invoice date: <b><?php $date = date("d/m/y");echo $date ?> </b></div>
    <br>

    <div class="paid_by">
      <table border="0" style="width: 400px; ">
        <tr>
          <td>Paid By:</td>
          <td>
            <?php echo $cname;  ?>
          </td>
        </tr>
        <tr>
          <td>Contact no:</td>
          <td><?php echo $contact; ?></td>
        </tr>
        <tr>
          <td>E-mail :</td>
          <td><?php echo $email; ?></td>
        </tr>
      </table>
    </div>
    <div class="detail">
      <table>
        <tr>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Discount</th>
          <th>SGST Amount</th>
          <th>CGST Amount</th>
          <th>Total</th>
        </tr>
        <?php
        foreach ($objects as $object) {
          $total = ($object->price * $object->qty) - ($object->price * $object->qty * $object->discount / 100);
          $sgst_amount = $total * ($object->sgst / 100);
          $cgst_amount = $total * ($object->cgst / 100);
          $grand_total = $total + $sgst_amount + $cgst_amount;

          echo "
                <tr>
                    <td>" . htmlspecialchars($object->name) . "</td>
                    <td>" . htmlspecialchars($object->qty) . "</td>
                    <td>" . htmlspecialchars($object->price) . "</td>
                    <td>" . htmlspecialchars($object->discount) . "%</td>
                    <td>₹" . number_format($sgst_amount, 2) . "</td>
                    <td>₹" . number_format($cgst_amount, 2) . "</td>
                    <td>₹" . number_format($total, 2) . "</td>
                </tr>
        ";
        }
        ?>

      </table>
    </div>

    <style>
      .last {
        float: right;
      }
    </style>

    <table class="last" style="width: 50%;">
      <?php
      echo " 
  <tr>
    <tr colspan='4' style='text-align:right;'><td><strong>Total Discount</strong></td>
    <td>₹" . number_format($total_discount, 2) . "</td>
    </tr>
    <tr colspan='4' style='text-align:right;'><td><strong>Total Amount</strong></td>
    <td>₹" . number_format($total_amount, 2) . "</td>
    </tr>
     <tr colspan='4' style='text-align:right;'><td><strong>Total SGST</strong></td>
     <td>₹" . number_format($total_sgst, 2) . "</td>
     </tr>
     <tr colspan='4' style='text-align:right;'><td><strong>Total CGST</strong></td>
     <td>₹" . number_format($total_cgst, 2) . "</td>
     </tr>
     <tr>
     <tr colspan='4' style='text-align:right;'><td><strong>GRAND TOTAL</strong></td>
     <td class='gtotal'>₹" . number_format($total_amount + $total_sgst + $total_cgst, 2) . "</td></tr>
  </tr>";
      ?>
    </table>
    <div class="sign">
      Signature ___________________<br><br>
      Date ______/__________/______
    </div>
  </div>
</body>

</html>