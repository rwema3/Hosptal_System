<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MedEpay</title>

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
  opacity: 1.8;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1.8;
  right: 0;
}
body{ background-image:url(img/medepay0.jpg); background-repeat:no-repeat;background-size:cover;min-height: 720px;background-attachment: fixed;}
</style>

</head>

<body bgcolor="#0080C0">
<center>

<br /><br /><br /><br /><br><br>
<strong><h1><font color="#000">MEDICAL E-PAYMENT SYSTEM</font></h1></strong>

<br /><br /><br />
<div style="position: sticky; border-radius: 0px 200px 10px 10px; width: 166px; border: 1px solid #111; height: 25px; background-color: #ccc; left: 890px; top: 214px;"><strong>LOGIN</strong>
  <div style="position:absolute;overflow:hidden;box-shadow:0px 0px 10px 0px #000;border:1px solid #111;border-radius:10px;background-color:#777;left:-6px;top:23px;width:500px;height:290px;">
  <br><br><br><br>
<table width="" border="0" cellspacing="0" cellpadding="0">
<form action="authentificating.php" method="post">
  <tr>
    <th style="box-shadow: 0px 0px 5px 0px #000;" bgcolor="#999999" scope="col">Username</th>
    <th scope="col"><input style="border: 1px solid #069;  background-image:url(img/user.png); background-repeat:no-repeat; background-size:30px 30px; height:30px; width:300px; padding-left:30px; background-color:#EAF4FF; font-size:16px;" size="30" type="text" name="username"></th>
  </tr>
   <tr>
    <th scope="col"><br></th>
    <th scope="col"></th>
  </tr>
  <tr>  
    <th style="box-shadow: 0px 0px 5px 0px #000;" bgcolor="#999999">Password</td>
    <td><input style="border: 1px solid #069; background-image:url(img/key.png); background-repeat:no-repeat; background-size:30px 30px; height:30px; width:300px; padding-left:30px; background-color:#EAF4FF; font-size:16px;" size="30" type="password" name="password"></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><button class="button" ><span>Login </span></button></td>
  </tr>
  </form>
</table>

</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<strong><h3><i>&nbsp;</i></h3></strong><br />
</div>
</center>
</body>
</html>