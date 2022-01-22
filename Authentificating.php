<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include"link.php";

$username=$_POST['username'];
$password=$_POST['password'];
$hash=md5($password);

if($username!=NULL && $password!=NULL)
{
$query=mysqli_query($link,"SELECT * FROM users WHERE username='$username' AND password='$hash'");
				while($result=mysqli_fetch_array($query))
				{
					$user_id=$result['id'];
					$name=$result['fullname'];
					$post=$result['post'];
					$status=$result['status'];
					$user2=$result['username'];
				}
										
				if($user2==NULL)
				{
					$null='yes';
					header("Location: login.php"); // - to go to the page you would like
                    exit;					
				}
				
				if($user2!=NULL)
				{
					$_SESSION['uid']=$user_id;
					$_SESSION['valid_user']=$user2;
					$_SESSION['name']=$name;
					$_SESSION['post']=$post;
					$_SESSION['status']=$status;
					
					if ($_SESSION['post']=='Verification')
					{
					$_SESSION['veri']='Verification';
					}															
					header("Location: home.php"); // Modify to go to the page you would like
                    exit; 										
				}																									
}
else
{
	include"login.php";
}


?>