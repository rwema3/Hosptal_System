<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include"link.php";

$code1=$_POST['code'];
$dob1=$_POST['dob'];
// $hash=md5($password);

if($code1!=NULL && $dob1!=NULL)
{
$query=mysqli_query($link,"SELECT * FROM clients WHERE client_id='$code1' AND dob='$dob1'");
	if(mysqli_num_rows($query)>0){
		while($result=mysqli_fetch_array($query))
				{
					$code=$result['client_id'];
					$dob=$result['dob'];	
					include"details2.php";
				}		
	}else{		
		header("Location: index.php?msg=Wrong Inputs"); 
	}
				// while($result=mysqli_fetch_array($query))
				// {
				// 	$code=$result['client_id'];
				// 	$dob=$result['dob'];					
				// }
										
				// if($code==NULL)
				// {
				// 	$null='yes';
				// 	header("Location: index.php"); // Modify to go to the page you would like
                //     exit;					
				// }																													
}
// else
// {
// 	include"index.php";
// }


?>