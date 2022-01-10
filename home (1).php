<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>::.New Client.::</title>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/> -->
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="script.js"></script>
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />

<?php 
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

include('link.php');

if(isset($_POST['client_id']))
{	
$client_id=$_POST['client_id']; 
$fullname=$_POST['fullname']; 
$tel=$_POST['tel'];
$sex=$_POST['sex'];
$dob=$_POST['dob'];
$date=$_POST['date'];
$insurance=$_POST['insurance'];
$percentage=$_POST['percentage'];
}
else
{
$client_id=0;
$fullname=''; 
$tel='';
$sex='';
$dob='';
$insurance='';
$percentage='';
$date=date('Y-m-d');
}
?>

<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#111;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 7px;
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
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}
.button:hover span:after { opacity: 1; right: 0;}
input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
.content4
{
	width: 985px;
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
</head>
<body>
<div class="all_container1">
  <div class="show">
    <div style="position:absolute;">  
      <div class="menu1"><a href="home.php"><img  style="position:absolute; left: 1580px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>
      <div class="menu1"><a href="user.php"><img  style="position:absolute;left:1610px;top:-19px;height:35px;" src="img/user.png"  alt="Saisie"  /></a></div>
      <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 1650px; top: -13px; " src="img/logout.png" /></a></div>    
    </div>  
  </div>

  <div class="content4">
  <div style="width:231px;height:24px;position:absolute;background-color:#999;border-radius:10px 10px 0px 0px;left:746px;top:27px;text-align:center;"> &nbsp;&nbsp;<b>NEW CLIENT</b></div>
<div style="background-color:#777;border:1px solid #09F;box-shadow:0px 0px 5px 0px #000;border-radius:5px 5px 5px 5px;width:982px;height:452px; position:absolute;left:2px;top:53px;">
<center>
<br /><br /><br /><br /><br />
<form  method="POST"  action="details.php" >
<table>
 <tr>
   <td align="right">DATE</td><td><input type="text" size="50"  value="<?php echo $date ?>" placeholder="" name="date" /></td>
   </tr>
    <tr>
   <td><strong>PATIENT NAME</strong></td><td><input type="text" size="50" placeholder="Full Name ...." name="name" value="<?php echo $fullname; ?>" /></td>
   </tr>
   
   <tr>
   <td align="right">DATE OF BIRTH</td><td> 
   <input type="date" style="width:436px;" name="dob" value="<?php echo $dob; ?>"/>
   </td>
   </tr>   
   <tr>
   <td align="right"><strong>SEX</strong></td><td><select style="width:468px;" name="sex"><option value="<?php echo $sex ?>"><?php echo $sex ?></option><option value="F">Female</option><option value="M">Male</option></select></td>
   </tr>         
   <tr>
   <td align="right">TELEPHONE</td><td><input autocomplete="off" type="text" size="50" value="<?php echo $tel ?>" placeholder="" name="tel" /></td>
   </tr>    
   <tr>
   <td align="right"><strong>INSURANCE</strong></td><td>
   <select style="font-size:20px;width:468px;" name="insurance">
   <option value="<?php echo $insurance ?>"><?php echo $insurance ?></option>
   <option value="RSSB">RSSB</option>
   <option value="UAP">UAP</option>
   <option value="SANLAM">SANLAM</option>
   <option value="PRIVATE">PRIVATE</option>
   <option value="MMI">MMI</option>
   <option value="RADIANT">RADIANT</option>
   </select>   
   <input  type="hidden" value="<?php echo $client_id ?>"  name="code" />   
   </td>
   </tr>
   <!-- <tr>
   <td align="right">Percentage</td><td>
      <select style="font-size:20px;width:468px;" name="percentage">
      <option value="<?php echo $percentage ?>"><?php echo $percentage ?>%</option>
      <option value="0" >0%</option>
      <option value="5" >5%</option>
      <option value="10">10%</option>
      <option value="15">15%</option>
      <option value="20">20%</option>
      <option value="25">25%</option>   
      </select>      
   </td>
   </tr> -->
  <tr>
  <td></td>
  <td>    
  <button class="button" ><span>NEXT</span></button>
  </td>
  </tr>
</table>
</form>
<font size="+5">
<?php if ($client_id>0)echo '#'.$client_id ?>
</font>
</center>
</div>
<br /><br /><br />
<h3></h3>
</div>
<div id="overv2" style=" background-color:#FFF; background-image:none;left:23%;">
<h3><font color="#222">&nbsp;&nbsp;Find a client</font></h3>
<iframe src="find.php" style="width:1000px; height:440px; border:0px solid #aaa; top:0px;"></iframe>
</div>  
</div>
<!-- <iframe style="position:absolute;background-color:#FFF;left:1020px;top:130px;width:733px;height:500px;border-radius:10px;" src="tabs-user.php"></iframe> -->
</body>
</html>