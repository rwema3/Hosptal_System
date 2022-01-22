<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<!-- <link rel="shortcut icon" href="img/link.ico" type="image/x-icon"/> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<!--popup iframe settings -->
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>         
<title>.::Details::.</title>

<?php 
session_start();
// if(!$_SESSION['valid_user']){
//     header("Location: connection.php");
//     exit;
// } 
?>
<?php
error_reporting(E_ERROR | E_PARSE);
include('link.php');

$user=$_SESSION['user'];


$_SESSION['period']=$period;
$_SESSION['date']=$date;

?>
</head> 
<body>
<div class="all_container">
   <div class="show">
      <div style="position:absolute;">         
         <div style="position: absolute; width: 700px; border:0px; top:10px; height: 66px; left:20px;"> 
            <!-- <a style="color:white;" href="orderdelete.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
               <img src="img/edit1.png" width="20" height="1354" />Modify 
            </a>  -->
         </div>
         
         <!-- <div class="menu1"><a href="home.php"><img style="position:absolute; left: 1620px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div> -->
         <div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 1650px; top: -13px; " src="img/logout.png" /></a></div>        
      </div>  
   </div>

   <div style="width:99.5%;opacity:0.9;background-color:#FFF;position:absolute;top:54px;padding:2px;margin:1px 0;border: 1px solid #000; -webkit-border-radius:5px; box-shadow: 0px 0px 20px #000; height: 780px; overflow:auto;">
      <div style="background-color:#FFF;border-radius:10px 10px 10px 10px;border:1px solid #FFF;font-size:20px;width:99%;height:43px;position:absolute;left:4px;top:27px;text-align:center;">
      <img src="img/patient.png" width="51" height="43">
         <?php
            if(isset($_POST['code']))
            {
               $code=$_POST['code'];
               $dob=$_POST['dob'];
               $date=date('Y-m-d');
               $period=date("F-Y", strtotime($date));
               $_SESSION['period']=$period;

               $last = "SELECT DISTINCT *  FROM clients WHERE client_id='$code'";
                     $retval_last = mysqli_query($link, $last);
                     if(! $retval_last ){ die('Could not get data: ' . mysqli_error($link)); }                         
                        while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                           {
                           $id=$rowlast['client_id'];					 
                           $insu=$rowlast['insurance'];
                           $percentage=$rowlast['percentage'];
                           $cname=$rowlast['name'];
                           echo '<b>'.$rowlast['name'].'</b>&nbsp;-&nbsp;&nbsp;D.O.B:&nbsp;<b>'.$rowlast['dob'].'</b>&nbsp;-&nbsp;&nbsp;SEX:&nbsp;<b>'.$rowlast['sex'].'</b>&nbsp;-&nbsp;&nbsp;(<strong>'.$rowlast['insurance'].'-'.$percentage.'%</strong>)&nbsp;-';
                           echo '&nbsp;CODE:<b><font color="#FF0000">'.$id.' </font>';            
                           break;		         
                           }
                              if (empty($id))
                              {
                              header("Location: home.php");
                                 exit;
                              }
            }
         ?> 
      </div>
         <br /><br /><br />
      <div  style="width: 99%; height: 690px; border: 0px solid #09F; position: absolute; background-color: #fff; left: 5px; top: 77px;">        
         <br />
         <iframe style="position:absolute;border:0px;background-color:#FFF;left:-1px;top:7px;width:100%;height:670px;" src="tabs2.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
      </div>

   </div>
</div>

 <?php 
 $_SESSION['id']=$id;
 $_SESSION['date']=$date;
  $_SESSION['cname']=$cname;
  $_SESSION['insurance']=$insu; 
 ?>
</body>
</html>