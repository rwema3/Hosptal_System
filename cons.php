<?php 
error_reporting(E_ERROR | E_PARSE);
	session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<?php include('link.php');
	$id=$_GET['id'];
	$insu=$_GET['insu'];
	$date=$_GET['date'];

	if(isset($_POST['presc_id']))
	{
		$presc_id=$_POST['presc_id'];
		mysqli_query($link,"DELETE FROM prescription WHERE presc_id=$presc_id");
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:550px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
.button {border:hidden;display: inline-block; border-radius: 4px;background-color:#096;color: #FFFFFF;text-align: center;font-size: 16px;padding: 10px;  width: auto;transition: all 0.5s;cursor: pointer;margin: 2px;}
.button span {cursor: pointer;display: inline-block;position: relative;transition: 0.5s;}
.button span:after {content: 'ADD';position: absolute;opacity: 0;top: 0;right: -20px; transition: 0.5s;}
/* .button:hover span { padding-right: 25px;} */
.button1 {border:hidden;display: inline-block;border-radius: 4px;color:#FFFFFF;text-align:center;font-size:16px;padding:3px;width:auto;transition: all 0.5s;
cursor: pointer; margin: 2px;background-image:url(img/print-button.png); background-repeat:no-repeat;}
.button1 span {cursor: pointer;display: inline-block;position: relative;transition: 0.5s;}
.button:hover span:after { opacity: 1; right: 0;}
.test:hover{ background-color:#F4F4F4;}
input, select{border: 1px solid #069;  height:25px; padding-left:30px;  font-size:16px;}
</style>
<script src="search/jquery.js" type="text/javascript"></script>

</head>
<body>
 <?php 
if(isset($_POST['date']))
{
	$drug=$_POST['drug'];
	$price = "SELECT cons_id  FROM consultation WHERE name='$drug' LIMIT 1";
        $retvalprice = mysqli_query($link, $price);
        if(! $retvalprice ){  die('Could not get data: ' . mysqli_error($link));  }                        
         while($rowp = mysqli_fetch_array($retvalprice, MYSQLI_ASSOC))
                 { $drug_id=$rowp['cons_id']; }	
	$qtty=$_POST['qtty'];
	$dosage=$_POST['dosage'];
	$tip=$_POST['tip'];
	$id=$_POST['id'];
	$date=$_POST['date'];
	$user=$_SESSION['name'];	
	mysqli_query($link,"INSERT INTO prescription(client_id,drug_id,qtty,dosage,tip,date,user) VALUES ($id,$drug_id,$qtty,'','CONSULTATION','$date','$user')");	
}
  ?>

<div style="position: absolute; height: 1000px; overflow: auto; height: 242px; background-color: #EAF4F4; width: 508px; left: 462px; top: 10px;";>
<?php
echo'<form action="cons.php?id='.$id.'&insu='.$insu.'&date='.$date.'" method="post">';
$last=0;
 $products = "SELECT * FROM prescription, consultation WHERE  prescription.drug_id=consultation.cons_id AND client_id=$id ORDER BY date DESC ";
        $retval = mysqli_query($link, $products);
        if(! $retval ){  die('Could not get data: ' . mysqli_error($link));   }                         
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				   if($row['date']!=$last)
				   {
				   echo '<table><tr><td><strong><br>'.$row['date'].'</strong><br>---------------<br>';
				   }
				   echo '* '.$row['name'];
				   echo '<strong>('.$row['qtty'].')</strong>&nbsp;/&nbsp;';
			    //    echo $row['dosage'].'&nbsp;//  ';
				//    echo $row['tip'];
				   echo'<input type="hidden" name="presc_id" value="'.$row['presc_id'].'">';
				   echo'<input type="image" src="img/del.png" height="10" style="border:0px solid #FFF;">';
				   echo'</form></td></tr></table><br>';
				   $last=$row['date'];
				 }
?>
</div>
<form action="cons.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>" method="POST">
<table>
<tr>
    <td align="right">Consultation</td>
    <!-- <td><input type="text" id="search-box" size="30" autocomplete="off" name="drug" placeholder="Drugs" /><div id="suggesstion-box"></div></td> -->
    <td>
		<select name="drug">
			<option value="Normal consultation">Normal consultation</option>
			<option value="weekend consultation">weekend consultation</option>
		</select>
   <input type="hidden" style="height:17px;" size="3" placeholder='' name="qtty" value="1"/>
   <input type="hidden" size="30" autocomplete="" name="dosage" placeholder="" />
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <input type="hidden" value="<?php echo $insu; ?>" name="insu" />
      <input type="hidden" value="<?php echo $date; ?>" name="date" />
	  <button class="button" ><span>ADD</span></button></td>
</tr>  
</table>
</form>
</body>
</html>