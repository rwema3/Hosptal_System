<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="10" >
<title>Untitled Document</title>
</head>
<body bgcolor="#777">
<?php
error_reporting(E_ERROR | E_PARSE);
include ('link.php');
session_start();

if (isset($_POST["order"])) 
{
$prod=$_POST['pro'];
$qtty=$_POST['qtty'];
$deletet=$_POST['order'];
$code=$_POST['client2'];
$med = "SELECT qtty  FROM products WHERE description='$prod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 { $prev=$rowmed['qtty']; }
$newq=$prev+$qtty;//new qtty		
mysqli_query ($link,"UPDATE products SET qtty ='$newq'  WHERE description ='$prod'");//update the stock qtty
mysqli_query ($link,"UPDATE orders SET active=0 WHERE order_id=$deletet");
}

$id=$_SESSION['id'];
$date=$_SESSION['date'];

if (isset($_POST["namec"])) 
{
$corr_code=$_POST['codec']; 
$corr_ben=$_POST['namec'];
$cl=$_POST['cl_id'];
mysqli_query ($link,"UPDATE clients SET tel ='$corr_code', name='$corr_ben'  WHERE client_id =$cl");
echo ' <img src="img/yes.png"';

}
//$code=$_POST['client'];
$defper = "SELECT DISTINCT client_id, insurance, tel, name FROM clients WHERE client_id=$id ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link)); }                        
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   echo'<form action="orderdelete.php" method="post">';
               echo '<p style="font-size:30px; text-transform:uppercase;"><input type="text" style=" font-size:16px;" name="namec" size="50" value="'.$defrowper['name'].'"> <input type="hidden" name="cl_id" value="'.$id.'">-<input type="text" style=" font-size:16px;" name="codec" value="'.$defrowper['tel'].'">['.$defrowper['insurance'].']<input type="submit" value="CORRECTION"></p>';
				   echo'</form><hr>';				   
				        echo'<table width="0"  border="1" cellspacing="0" cellpadding="0">
                         <tr bgcolor="#CCCCCC" >
                         <td>Items</td>
						       <td>Qty</td>						
                         <td>Unit Price</td>
                         <td colspan="0">Total</td>
						       <td colspan="2">Date</td>';						   
						$defper = "SELECT* FROM acts,orders WHERE acts.act_id=orders.item_id AND client_id=$id AND orders.date='$date' AND orders.active=1 ORDER BY time DESC ";
                        $retvalper = mysqli_query($link, $defper);
                        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link)); }                         
                           while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                    {
                           echo'<form action="orderdelete.php" method="post">';										
                           echo'<tr bgcolor="#FFFFFF">';
                           echo'<td>'.$defrowper['act'].'</td>';
                           echo'<input type="hidden" name="pro" value="'.$defrowper['item'].'">';
                           echo'<td>'.$defrowper['quantity'].'</td>';
                           echo'<input type="hidden" name="qtty" value="'.$defrowper['quantity'].'">';
                           echo'<td>'.$defrowper['unityp'].'</td>';
                           $t=$defrowper['quantity']*$defrowper['unityp'];
                           echo'<td>'.$t.'</td>'; 
                           echo'<input type="hidden" name="order" value="'.$defrowper['order_id'].'">';
                           echo'<input type="hidden" name="client2" value="'.$id.'">';
                           echo'<td>'.$defrowper['time'].'</td>';
                           echo'<td><input style="background-color:#F00;opacity:0.8;color:#fff;border-radius:50%;" type="submit" value="X"></td>';
                           echo'</form>';
                           echo'</tr>';
                                    }
                           echo'</table>';
	             }
?>
</body>
</html>