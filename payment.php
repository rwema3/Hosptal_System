<?php
//require ('stripe/link01.php');
$amount=$_GET['amount'];
$Publishablekey='pk_test_51KBzxXHR1XVDkcETOrSP6qWaNLmdo0zVEaOewCOUvSw05lNBKVJZGMMHmu3nI6zf2xaUpWp7l5g537eRjICoxWOv00NsKOshw3';
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
  background-color: #000000;
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
  padding: 3px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
  background-image:url(img/print-button.png);
  background-repeat:no-repeat;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:17px; padding-left:30px;  font-size:16px;}
</style>
</head>
<body>

<center>
<strong><h2>PAYMENT METHOD</h2></strong>
<br><br><br><br><br>
<table>
  <tr>
    <td>
      <form action="formpay.php?amount=<?php echo $amount; ?>" method="POST">
      <button class="button">MoMo</button>

      </form>
    </td>
    <td>
<form action="order_process.php?amount=<?php echo $amount; ?>" method="POST">
      <button class="button">credit card</button> 
      </form>

    

 

<!-- <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $Publishablekey ?>"
    data-amount="6000"
   data-name="GISAGARA Sabine"
    data-description="medEpay bill"
   //data-image=""
    data-currency="Rwf"
    >
    </script> -->


</form>
    </td>
  </tr>
</table>
</center>

</body>
</html>