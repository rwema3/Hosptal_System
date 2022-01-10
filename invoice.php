<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3" >
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<title>Untitled Document</title>
</head>

<body>
<center>
<?php
include ('link.php');
session_start();
error_reporting(E_ERROR | E_PARSE);
$id=$_GET['id'];
$insu=$_GET['insu'];
$date=$_GET['date'];
$period=$_GET['period'];
$percentage=$_GET['percentage'];
$today=date('Y-m-d');

include('bill2.php');
?>

<div style="position: absolute; -webkit-border-radius: 4px; height: 46px; width: 224px; color: #FFF; background-color: #0080C0; left: 51px; font-size: 22px; top: 14px;" >Total
  <div style="position: absolute; height: 34px; width: 150px; border: solid 1px #0080C0; color: #333; background-color: #FFF; left: 199px; border-right:solid 5px #0080C0;
   -webkit-border-radius: 4px; top: 5px;" >
  <?php echo $tot_amount ?> FRW</div>
</div>


<div style="position: absolute; -webkit-border-radius: 4px; height: 46px; width: 224px; color: #FFF; background-color:#096; left: 462px; font-size: 22px; top: 14px;" ><?php echo $insu; ?>(<?php echo 100-$percentage ?>%)
  <div style="position: absolute; height: 34px; width: 150px; border: solid 1px #096; color: #333; background-color: #FFF; left: 199px; border-right:solid 5px #096;
   -webkit-border-radius: 4px; top: 5px;" >
  <?php echo $insurance ?>FRW</div>
</div>


<div style="position: absolute; -webkit-border-radius: 4px; height: 46px; width: 224px; color: #FFF; background-color:#F03; left: 863px; font-size: 22px; top: 14px;" >Patient(<?php echo $percentage ?>%)
  <div style="position: absolute; height: 34px; width: 150px; border: solid 1px #F03; color: #333; background-color: #FFF; left: 199px; border-right:solid 5px #F03;
   -webkit-border-radius: 4px; top: 5px;" >
  <?php echo $patient ?> FRW</div>
</div></center>
<br /><br />

<?php 
if ($ass==0 &&$insu!='PRIVE')
echo'<font color="#FF0000"><b>*NB: Quelques elements ne sont pas couverts par assurance!</b></font>';
?>

</body>
</html>