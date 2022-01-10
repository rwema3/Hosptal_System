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
<iframe style="position:absolute;background-color:#FFF;left:30%;top:130px;width:733px;height:700px;border-radius:10px;" src="tabs-user.php"></iframe>
</body>
</html>