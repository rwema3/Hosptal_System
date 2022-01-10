<?php
$msg=$_GET['msg'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>        
<title>Med E-Pay</title>
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
.back{background-color:#999;position:absolute;left:50%;height:;width:300px;top:300px;opacity:1.8;border-radius:10px;box-shadow:10px 10px 10px 10px #111;}
</style>
</head>
<body>

<div class="all_container">
   <div class="show">
      <div style="position:absolute;">                         
         <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 1650px; top: -13px; " src="img/home.png" /></a></div>        
      </div>  
   </div>
   <div class="back">     
      <!-- <form action="details2.php" method="POST">       -->
      <form action="Authentication.php" method="POST">      
      <center>
      <br><br><u>USER'S PORTAL</u><br><br><br>
      <input type="text" name="code" placeholder="Enter your Code ..." required><br><br>
      <input type="text" name="dob" placeholder="Enter your D.O.B (Y/M/D)..." required><br><br>
      <button class="button">Send</button><br><font color="red"><?php echo $msg; ?></font><br>
      </center>      
      </form>
   </div>
</div>
</body>
</html>