<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<title>.::ALL INVOICES</title>
<style>
	.content4
{
	width: 1005px;
	opacity: 1;
	background-image: url(images/content2.png);
	background-repeat: no-repeat;
	background-color: #FFF;
	position: absolute;
	left: 23%;
	top: 114px;
	box-shadow: 0px 0px 0px #888888;
	padding: 2px;
	margin: 1px 0;
	border: 0px solid #000;
	box-shadow: inset 5px 5px 5px rgba(0,0,0,.2);
	border-radius: 0px 0px 0px 0px;
	-webkit-box-shadow: inset 0 1px 4px rgba(0,0,0,.2);
	-webkit-border-radius: 10px;
	border-color: #000;
	box-shadow: 0px 0px 5px #000;
	height: 506px;
	overflow: auto;
}
</style>
<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 300000);
include('link.php');
session_start();
if(!$_SESSION['name']){
         header("Location: login.php");
         exit;
   } 
   $name=$_SESSION['name'];
   $usr=$_SESSION['name'];
   $select_query = "SELECT * FROM users WHERE fullname='$usr'";
   $select_query_run = mysqli_query($link,$select_query);         
         if($select_query_run)
         {
         if(mysqli_num_rows($select_query_run) > 0)
         {
            $row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);            
            $use_id=$row['id'];
            $fullname=$row['fullname'];
            $post=$row['post'];
            $username=$row['username'];
            $password=$row['password'];
            $levels=$row['levels'];
         }
         else
         {  die('Error in the SELECT query' . mysqli_error($link));    }
         }
?>
</head>
<body>
<div class="all_container1">
<!-- <div class="show"></div> -->
<!-- <div class="liguini"> -->
<!-- <div class="img1"></div> -->
<div class="show">
    <div style="position:absolute;">  
      <div class="menu1"><a href="home.php"><img style="position:absolute;left:1580px; top: -13px;" src="img/home.png" alt="Saisie"  /></a></div>
	  <div class="menu1"><a href="user.php"><img style="position:absolute; left: 1610px;top:-19px;height:35px;" src="img/user.png"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 1650px; top: -13px; " src="img/logout.png" /></a></div>
    </div>       
</div>
<!-- </div> -->
<div class="content4" style="top:60px; height:600px;"><br /><br /><br />
<h3></h3>
<div  style="box-shadow: 0px 0px 0px 0px #000; border: 1px solid #09F; position:absolute; background-color:#FFF;left:4px;top:35px;width:99%;">
<div style="position:absolute;border-radius:0px 200px 10px 10px;width:250px;border:1px solid #09F;height:25px;background-color:#BDF;left:1px; top:-27px;"><b>INVOICES<a href="factures_gihogwe.php"><!--....--></a></b></div>
<center><br>
<table width="30%" bgcolor="#CCCCCC" border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
 <form action="releve.php" method="post" target="_blank">
  <tr>
    <td>
    <input style="width:300px;font-size:15px;padding-left:10px;" type="hidden" name="releve" value="releve">                
    </td>
    
    
    <td>Enter a Date</td>
    
    
    
    
    <td><input type="text" size="10" value="<?php echo date('Y-m-d') ?>" name="date">
    
    
    </td>
    <td><button class="button" ><span>OK</span></button></td>
  </tr>
 </form>
</table>
		</center>
<br />
</div>
</div>
</div>
</body>
</html>