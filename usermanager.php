<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::users manager</title>

<?php 
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>

</head>
<body>
<div  style=" width:99%; box-shadow: 0px 0px 1px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 0px; top: 35px;">
<?php
include('link.php');

if(isset($_POST['mid']))
{
$mid=$_POST['mid']; 
mysqli_query ($link,"DELETE FROM users WHERE id='$mid'");
}

if(isset($_POST['pid']))
{
$pid=$_POST['pid']; 
$status=$_POST['status']; 
mysqli_query ($link,"UPDATE users SET status ='$status' WHERE id =$pid");
}
?>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">    
  <tr bgcolor="#AAD5FF">
    <th colspan="7">EXISTING USERS</th>   
  </tr>
  <tr bgcolor="#CCCCCC">
    <td><b>No</b></td>
    <td><b>NAMES</b></td>
    <td><b>ROLES</td>
    <td colspan=""><b>USERNAMES</b></td>
    <!-- <td colspan="3"><b>STATUS</b></td> -->
  </tr>
<?php 
$i=0;
$med = "SELECT * FROM users ORDER BY fullname ASC";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link));   }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {					 
					 $i++;					 
					 if($i%2==0)
					 echo'<tr height="15" bgcolor="#D8D8D8">';
					 else
					 echo'<tr>';					 
					 echo '<form  action="usermanager.php" method="post">';
					 echo '<td width="8">'.$i.'</td>';
					 echo '<td width="250">'.$rowmed['fullname'].'</td>';
           echo '<td width="150" bgcolor="">'.$rowmed['post'].'</td>';
					 echo '<td width="110" bgcolor="">'.$rowmed['username'].'</td>';
					 // echo '<td width="30" bgcolor="">'.$rowmed['status'].'</td>';
					 // echo '<input type="hidden" name="pid" value="'.$rowmed['id'].'">';
      //      if ($_SESSION['post']=='titulaire'){
      //       //echo '<td><input type="text" style=" width:30px;" name="level"></td>';/*to-set-user's-level*/
      //       echo '<td width="120"><select style=" width:80px;height:25px;" name="status">
      //             <option value="0"></option>
      //            <option value="active">Active</option>
      //            <option value="activated">Activated</option>                 
      //           ';/*to-set-user's-level*/           
					 // echo '&nbsp;&nbsp;<input type="submit" value="" style="background-image:url(img/upd.jpg);width:20px;height:18px;border:0px;mix-blend-mode:multiply;"/>&nbsp;&nbsp;</td>';
      //      }
					 echo '</form>';
					//  echo '<td><form action="usermanager.php" method="post">';
					//  echo '<input type="hidden" name="mid" value="'.$rowmed['id'].'">';
					//  if ($_SESSION['post']=='titulaire'){
					// //  echo'<input type="submit" value="" style="background-image:url(img/del.png); background-repeat:no-repeat;" />';
     //       }
					//  echo'</form>
					//  </td>';
					 echo'</tr>';
				 }	
?>  
</table>
<br />
</div>
<br />
</div>
</div>
</div>
</body>
</html>