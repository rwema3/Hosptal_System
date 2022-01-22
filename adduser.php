<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#111;
  color: #FFFFFF;
  text-align: center;
  font-size: 17px;
  padding: 8px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.6s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 1;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 26px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<?php 
include('link.php');
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<body>  
    <br /><br /><br />
    <div  style="width: 548px; height: 560px; box-shadow: 0px 0px 0px 0px #000; border: 0px solid #09F; overflow: auto; position: absolute; background-color: #777; left: 1px; top: 11px;">
    <center>
    <br><br><br><br>
      <table width="0" border="0" cellspacing="10" cellpadding="0">
      <form action="adduser.php" method="post">
        <tr>
          <td>Fullname</td>
          <td><input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="nom" size="30" /></td>
        </tr>
        <tr>
          <td>Role</td>
          <td>
            <select style="border:1px solid #069; height:30px; padding-left:30px; font-size:16px; width:310px;" name="post">
              <option value="Director">Director</option>
              <option value="Doctor (Specialist)">Doctor (Specialist)</option>
              <option value="Doctor (Generalist)">Doctor (Generalist)</option>
              <option value="Doctor (Dentist)">Dentist</option>
              <option value="Nurse A0">Nurse A0</option>
              <option value="Nurse A1">Nurse A1</option>
              <option value="Lab Technician">Lab</option>
              <option value="Other paramedical staff">Other paramedical staff</option>
              <option value="accountant">Accountant</option>
              <option value="reception">Reception</option>
              <option value="cashier">Cashier</option>
              <option value="other">Other</option>
            </select>    
          </td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="user" size="30" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="pw" size="30" /></td>
        </tr>
        <tr>
          <td>Confirm Password </td>
          <td><input type="password" style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" name="pw2" size="30" /></td>
        </tr>
        <tr>
        <td></td>  
        <td> 
            <button class="button" ><span>Create </span></button>
        </tr>
        </form>
      </table>
        </center>
      <?php 
        if(isset($_POST['user'])&&($_POST['pw']))
        {
          $fname=$_POST['nom'];
          $post=$_POST['post'];
          $user=$_POST['user'];	
          $hpw=md5($_POST['pw']);
          
        if($_POST['pw']==$_POST['pw2'])
          {
            mysqli_query ($link,"INSERT INTO users (fullname, post, username, password) VALUES ('$fname', '$post','$user','$hpw')"); 
              echo '<center><p style="background-color:green;width:300px;text-align:center;"><strong>User created successfully !</strong><p/></center>';
          }
          else
            echo '<center><p style="background-color:red;width:300px;text-align:center;"><strong>Passwords don\'t match !</strong><p/></center>';
        }
      ?>
    <br />
    </div>
</body>
</html>