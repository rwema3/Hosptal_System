<?php 
	$print=0;
	if(isset($_POST['print']))
	  { $print=$_POST['print']; }
		
$client = "SELECT name, percentage FROM clients WHERE client_id=$id";
        $retvalclient = mysqli_query($link, $client);
        if(! $retvalclient ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($rowc = mysqli_fetch_array($retvalclient, MYSQLI_ASSOC))
          {					 
					 $fullname=$rowc['name'];
					 $percentage=$rowc['percentage'];					 			 								
				  }	
				
//check--						   
	$products1 = "SELECT status FROM orders WHERE client_id=$id  AND date='$date'  ORDER BY order_id DESC LIMIT 1";
        $retval1 = mysqli_query($link, $products1);
        if(! $retval1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
          {	$status= $row1['status'];	 }				   									   
//end of check									   									   
?>

<?php 
//get the number
$no=0;
if ($status!='1')
{ $number = "SELECT receipt_id  FROM receipt ORDER BY receipt_id DESC LIMIT 1"; }
elseif ($status='1')
{ $number = "SELECT receipt_id  FROM receipt WHERE client_id=$id  ORDER BY receipt_id DESC LIMIT 1"; }
    $retvalmed1 = mysqli_query($link, $number);
      if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
      while($row = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
        { $no=$row['receipt_id'];  }

        if ($status!='1')
          { $no=$no+1; }									  
									  
//$no=$no+1;				                       
//generate the number	
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
  font-size: 16px;
  padding: 10px;
  width: auto;
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
<script>
		function printDiv(printme){
			var printContents = document.getElementById(printme).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
</head>
<body>
<center>

<?php 
if ($status=='1')
{}
?>
<?php
$i=0;
$tot_amount=0;
$tot_amount_not=0;
$ass=1;
 $products = "SELECT act,order_id,unityp,quantity,status,orders.insured FROM acts, orders WHERE  acts.act_id=orders.item_id AND client_id=$id AND orders.date='$date' AND orders.active=1  ORDER BY time ASC ";
        $retval = mysqli_query($link, $products);
        if(! $retval ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				  $insured=$row['insured'];
				  $order_id=$row['order_id'];
				  $item=$row['act'];
				  $unitp=$row['unityp'];
				  $qtty=$row['quantity'];
				  $status1=$row['status'];
				  if ($insured==0)
				    $ass=0;					
				    $i++;
					$tot=$row['unityp']*$row['quantity'];				   
				   $tot_amount+=$tot;
				   if ($insured==0)
				      $tot_amount_not+=$tot;
					  
					if ($print==1 && $status1==0)
				       {
						   if ($insured==0)
						   {
			        	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name,order_id, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$fullname',$order_id, '$item' , '$unitp', '$qtty', '$date', '$name')");
						   }
						   
						   if ($insu=='PRIVE')
						   {
			        	mysqli_query ($link,"INSERT INTO receipt (receipt_id, client_id, client_name,order_id, item, unitp, qtty, date, user) 
                               VALUES ('$no', '$id', '$fullname',$order_id, '$item' , '$unitp', '$qtty', '$date', '$name')");
						   }
				       }				   			      
				 }
				 
$total_due=$tot_amount-$tot_amount_not;
$patient1=$total_due*$percentage/100;
$patient=$patient1+$tot_amount_not;
$insurance=$total_due-$patient1;
?>
<!--TOTAL:      <?php echo $tot_amount ?> FRW<br />
INSURANCE(<?php echo 100-$percentage ?>%):   <?php echo $insurance ?>FRW<br />
AMOUNT DUE(<?php echo $percentage ?>%): <?php echo $patient ?> FRW<br />-->
</b>
</center>
<br />
</body>
</html>