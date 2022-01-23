<?php
//require ('stripe/link.php');
$amount=$_GET['amount'];
$cname=$_POST['customer_name'];
$Publishablekey='pk_test_51KBzxXHR1XVDkcETOrSP6qWaNLmdo0zVEaOewCOUvSw05lNBKVJZGMMHmu3nI6zf2xaUpWp7l5g537eRjICoxWOv00NsKOshw3';
?>



<?php 
error_reporting(1|0);

define ("DB_HOST", "localhost"); // set database hoster
define ("DB_USER", "root"); // set database user for the system
define ("DB_PASS",""); // set database password
define ("DB_NAME","medepay"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db($link,DB_NAME) or die("Couldn't select database");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.printme{ background-color:#CCC;}
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#096;
  color: #FFFFFF;
  text-align: center;
  font-size: 36px;
  padding: 10px;
  width: 200px;
  height: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '>>';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button1 {
	
  border:hidden;
  display: inline-block;
  border-radius: 4px;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 4px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 1px;
  background-image:url(img/print-button.png);
  background-repeat:no-repeat;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.6s;
}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:16px; padding-left:30px;  font-size:16px;}
</style>
</head>
<body>

<center>
<strong><h2>PAYMENT METHOD</h2></strong>
<br><br><br><br><br>
<table>
  <tr>
    <td>
      <!-- <form action="#" method="POST">
      <button class="button">MoMo for payMENT</button>

      </form> -->
    </td>
    <td>
<!-- <form action="order_process.php?amount=<?php echo $amount; ?>" method="POST">
      <button class="button">credit card for paying</button>
      
      </form> -->

<?php
include("link.php");

if(isset($_POST['pay']))
{
 $customer_name=$_POST['customer_name'];
 $customer_address=$_POST['customer_address'];
 $customer_city=$_POST['customer_city'];
 $customer_zip=$_POST['customer_zip'];
 $customer_state=$_POST['customer_state'];
 $customer_country=$_POST['customer_country'];

$query ="INSERT INTO payment_card (customer_name,customer_address,customer_city,customer_zip,customer_state,customer_country,amount) VALUES('$customer_name','$customer_address','$customer_city','$customer_zip','$customer_state','$customer_country','$amount')";
$result = $link->query($query);
        
        }
      ?>                   
            

<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $Publishablekey ?>"
    data-amount="<?php echo $amount; ?>"
   data-name="<?php echo $cname; ?>"
    data-description="Py MedeSYST"
   //data-image=""
    data-currency="RFW"
    >
    </script>



    </td>
  </tr>
</table>
</center>

</body>
</html>