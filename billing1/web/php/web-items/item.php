<?php 
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
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/style.css">
    <link rel="stylesheet" href="http://localhost/www/billing1/web/styles/item.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


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
        <div class="roll">
            <h1>Billing Form</h1>
            <form action="http://localhost/www/billing1/web/php/invoice/invoice1.php" method="post">
                <!--  Customer Details -->
                <fieldset>
                    <legend>Customer Details :</legend><br/><br/>
                    Name : &nbsp;
                    <input type="text" placeholder="Customer name" name="cname" id="custname"/>
                    Contact No : &nbsp;
                    <input type="text" name="contact" placeholder="Contact no." id="contactno" size="16" maxlength="14"/>&nbsp;&nbsp
                    Email ID : &nbsp;
                    <input type="email" name="email" id="emailid" placeholder="E-mail ID" /><br>
                </fieldset>
                <br>


                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>SGST</th>
                            <th>CGST</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <button type="button" id="addRow">Add Row</button>
                <button type="submit" name="submit">Submit</button>
            </form>

            <script>
                $(document).ready(
                    function()
                    {
                        loadData(); // Load initial data
                        addRow(); // Add default row

                        $("#addRow").click(function() 
                        {
                            rowCounter++;
                            addRow();
                        });
                    });

                function loadData() {
                    let objects = [];
                    updateTable(objects);
                }

                let rowCounter = 0;

                function updateTable(objects) {
                    let tableRows = "";
                    objects.forEach((object, index) => 
                    {
                        tableRows += `
                            <tr id="row-${index}">
                            <td><input type="text" name="name[]" value="${object.name}" required></td>
                            <td><input type="number" name="qty[]" value="${object.qty}" required></td>
                            <td><input type="number" step="0.01" name="price[]" value="${object.price}" required></td>
                            <td><input type="number" name="discount[]" value="${object.discount}" required></td>
                            <td><input type="number" name="sgst[]" value="${object.sgst}" required></td>
                            <td><input type="number" name="cgst[]" value="${object.cgst}" required></td>
                            <td><button type="button" class="removeRow" data-row-id="${index}">Remove</button></td>
                            </tr>`;
                        });
                    $("table tbody").html(tableRows);
                    // Add remove row functionality
                    $(document).on("click", ".removeRow", function() {
                        let rowId = $(this).data("row-id");
                        $(`#row-${rowId}`).remove();
                    });
                }

                function addRow() {
                    rowCounter++;
                    let newRow = `
            <tr id="row-${rowCounter}">
                <td><input type="text" name="name[]" placeholder="Item name" required></td>
                <td><input type="number" name="qty[]" placeholder="Quntity" required></td>
                <td><input type="number" step="0.01" name="price[]" placeholder="Item price" required></td>
                <td><input type="number" name="discount[]" placeholder="Discount (%)"> </td>
                <td><input type="number" name="sgst[]" placeholder="SGST (%)" step="0.1"></td>
                <td><input type="number" name="cgst[]" placeholder="CGST (%)"></td>
                <td><button type="button" class="removeRow" data-row-id="${rowCounter}">Remove</button></td>
            </tr>
        `;
                    $("table tbody").append(newRow);
                }
            </script>
        </div>
    </div>

</body>

</html>