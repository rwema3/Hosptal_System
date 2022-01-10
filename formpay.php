<?php 
error_reporting(1|0);
define ("DB_HOST", "localhost"); // set database host 
define ("DB_USER", "root"); // set database user
define ("DB_PASS",""); // set database password
define ("DB_NAME","medepay"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db($link,DB_NAME) or die("Couldn't select database");
?>
<?php
//order_process.php
session_start();
$amount=$_GET['amount'];
$total_price = 0;

$item_details = '';

$order_details = '
<div class="table-responsive" id="order_table">
    <table class="table table-bordered table-striped">
        <tr>  
            <th>Product Name</th>  
            <th>Quantity</th>  
            <th>Price</th>  
           <th>Total</th>  
        </tr>
';

if(!empty($_SESSION["shopping_cart"]))
{
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $order_details .= '
        <tr>
            <td>'.$values["product_name"].'</td>
            <td>'.$values["product_quantity"].'</td>
            <td align="right">$ '.$values["product_price"].'</td>
            <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
        </tr>
        ';
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);

        $item_details .= $values["product_name"] . ', ';
    }
    $item_details = substr($item_details, 0, -2);
    $order_details .= '
    <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">$ '.number_format($total_price, 2).'</td>
    </tr>
    ';
}
//$order_details .= '</table>';

?>
    <head>
        
    <style>

 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');
 
 *, body {
     font-family: 'Poppins', sans-serif;
     font-weight: 400;
     -webkit-font-smoothing: antialiased;
     text-rendering: optimizeLegibility;
     -moz-osx-font-smoothing: grayscale;
 }
 
 html, body {
     height: 100%;
     background-color: #152733;
     overflow: hidden;
 }
 
 
 .form-holder {
       display: flex;
       flex-direction: column;
       justify-content: center;
       align-items: center;
       text-align: center;
       min-height: 100vh;
 }
 
 .form-holder .form-content {
     position: relative;
     text-align: center;
     display: -webkit-box;
     display: -moz-box;
     display: -ms-flexbox;
     display: -webkit-flex;
     display: flex;
     -webkit-justify-content: center;
     justify-content: center;
     -webkit-align-items: center;
     align-items: center;
     padding: 60px;
 }
 
 .form-content .form-items {
     border: 3px solid #fff;
     padding: 40px;
     display: inline-block;
     width: 100%;
     min-width: 540px;
     -webkit-border-radius: 10px;
     -moz-border-radius: 10px;
     border-radius: 10px;
     text-align: left;
     -webkit-transition: all 0.4s ease;
     transition: all 0.4s ease;
 }
 
 .form-content h3 {
     color: #fff;
     text-align: left;
     font-size: 28px;
     font-weight: 600;
     margin-bottom: 5px;
 }
 
 .form-content h3.form-title {
     margin-bottom: 30px;
 }
 
 .form-content p {
     color: #fff;
     text-align: left;
     font-size: 17px;
     font-weight: 300;
     line-height: 20px;
     margin-bottom: 30px;
 }
 
 
 .form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
     color: black;
 }
 
 .form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select {
     width: 100%;
     padding: 9px 20px;
     text-align: left;
     border: 0;
     outline: 0;
     border-radius: 6px;
     background-color: #fff;
     font-size: 15px;
     font-weight: 300;
     -webkit-transition: all 0.3s ease;
     transition: all 0.3s ease;
     margin-top: 16px;
 }
 
 
 .btn-primary{
     background-color: #6C757D;
     outline: none;
     border: 0px;
      box-shadow: none;
 }
 
 .btn-primary:hover, .btn-primary:focus, .btn-primary:active{
     background-color: #495056;
     outline: none !important;
     border: none !important;
      box-shadow: none;
 }
 
 .form-content textarea {
     position: static !important;
     width: 100%;
     padding: 8px 20px;
     border-radius: 6px;
     text-align: left;
     background-color: #fff;
     border: 0;
     font-size: 15px;
     font-weight: 300;
     color: #8D8D8D;
     outline: none;
     resize: none;
     height: 120px;
     -webkit-transition: none;
     transition: none;
     margin-bottom: 14px;
 }
 
 .form-content textarea:hover, .form-content textarea:focus {
     border: 0;
     background-color: #ebeff8;
     color: #8D8D8D;
 }
 
 .mv-up{
     margin-top: -9px !important;
     margin-bottom: 8px !important;
 }
 .invalid-feedback{
     color: #ff606e;
 }

 .valid-feedback{
    color: #2acc80;
 }
        </style>
     </head>
     <div class="form-body">
         <div class="row">
             <div class="form-holder">
                 <div class="form-content">
                     <div class="form-items">
                         <h3>Pay with MoMo</h3>

                         <form action="formpay.php" METHOD="POST" class="requires-validation"  novalidate>
                             
<?php

include("link.php");

if(isset($_POST['pay']))
{

 $numbers= $_POST['numbers'];
 $amount= $_POST['amount'];

$query ="INSERT INTO payment (numbers,amount) VALUES('$numbers','$amount')";
$result = $link->query($query);
         echo '<center><p style="background-color:green;width:300px;text-align:center;"><strong>Payed Successfully</strong><p/></center>';
        }
      ?>                   
                        <div class="col-md-12">
                                <input class="form-control" type="text" name="numbers" value="0789100700" placeholder="<?php echo $tel ?>" readonly>           
                                <input class="form-control" type="text" name="amount" value="<?php echo $amount;?>" disabled> 
                                <input class="form-control" type="password" placeholder="Enter MoMo Password" pattern="[0-9]+" maxlength="5" required> 
                             </div>
                             <div class="form-button mt-3">
                                 <button id="submit" type="submit" name="pay" class="btn btn-primary">Yes</button>
                                  <button type="clear" class="btn btn-primary">Clear</button>
                             </div>

                            
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script>
         (function () {
 'use strict'
 const forms = document.querySelectorAll('.requires-validation')
 Array.from(forms)
   .forEach(function (form) {
     form.addEventListener('submit', function (event) {
       if (!form.checkValidity()) {
         event.preventDefault()
         event.stopPropagation()
       }
       form.classList.add('was-validated')
     }, false)
   })
 })()
 
     </script>
 