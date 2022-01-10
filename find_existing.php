<?php	
	echo'<table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                         <tr bgcolor="#CCCCCC" >
                         <td>FULLNAME&nbsp;</td>
						 <td>CODE&nbsp;</td>						
                         <td>INSURANCE&nbsp;</td>                         			 
						 <td colspan="">D.O.B&nbsp;</td>
						 <td colspan="">SEX&nbsp;</td>
						 <td colspan="4">REGISTRATION DATE&nbsp;</td>						   						   						   
						   ';
						   
$code=$_POST['client'];
$i=0;
$defper = "SELECT * FROM clients WHERE client_id='$code' OR name LIKE'%$code%'  ORDER BY client_id DESC LIMIT 1000 ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   $status=$defrowper['status'];				   
				   $fullname=$defrowper['name'];				   
				   $date=$defrowper['date'];
				   $tel=$defrowper['tel'];				   
				   $insurance=$defrowper['insurance'];
				   $percentage=$defrowper['percentage'];
				   $sex=$defrowper['sex'];
				   $dob=$defrowper['dob'];

				    $i++;
					 					 
					 if ($i%2==0)
					 { echo'<tr bgcolor="#D9FFD9">'; }					
					 else
					 { echo'<tr>'; }
				   
				   echo'<td>'.$defrowper['name'].'</td>';
				   echo'<td><strong>'.$id.'</strong></td>';
				   echo'<td>'.$defrowper['insurance'].'</td>';				   
				   echo'<td>'.$defrowper['dob'].'</td>';
				   echo'<td>'.$defrowper['sex'].'</td>';
				   echo'<td>'.$defrowper['date'].'</td>';				   				   
				   
				   if ($status==1)
				   {
				   echo'<form action="details.php" method="post" target="_parent">';
				   echo'<td><input type="hidden" name="code" value="'.$id.'"><input type="hidden" name="date" size="8" value="'.date('Y-m-d').'"></td>';
				   echo'<td><button class="button" ><span>OK </span></button></td>';
				   echo'</form>';				   				   
				   echo'
				   <form action="home.php" method="post" target="_parent">
		            <input type="hidden" name="client_id" value="'.$id.'">
					<input type="hidden" name="date" size="8" value="'.date('Y-m-d').'">					
					<input type="hidden" name="fullname" value="'.$fullname.'">					
					<input type="hidden" name="tel" value="'.$tel.'">
					<input type="hidden" name="sex" value="'.$sex.'">
					<input type="hidden" name="dob" value="'.$dob.'">
					<input type="hidden" name="insurance" value="'.$insurance.'">
					<input type="hidden" name="percentage" value="'.$percentage.'">
		           <td> <button class="button" ><span>Update</span></button></td>
		           </form> ';				   				   
				   }
				   				   				   
				   if ($status==0)
				   {
				   echo'
				   <form action="home.php" method="post" target="_parent">
				    <td><input type="text" name="date" size="8" value="'.date('Y-m-d').'"></td>
		            <input type="hidden" name="client_id" value="'.$id.'">					
					<input type="hidden" name="fullname" value="'.$fullname.'">					
					<input type="hidden" name="tel" value="'.$tel.'">
					<input type="hidden" name="sex" value="'.$sex.'">
					<input type="hidden" name="dob" value="'.$dob.'">
					<input type="hidden" name="insurance" value="'.$insurance.'">
					<input type="hidden" name="percentage" value="'.$percentage.'">
		           <td> <button class="button" ><span>Update</span></button></td>
		           </form>';
				   }				   				   				  
				   echo'</tr>';		   				        						   																  
	             }
		 echo'</table>';			 
    ?>