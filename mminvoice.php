<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MMI INVOICE</title>
</head>
<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 30000);
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
include('link.php');
$period=$_GET['p'];
?>
<body>
<br />
<table style="font-size:13px; border-collapse: collapse;" width ="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" colspan="20">SUMMARY OF VOUCHERS FOR MMI</th>
  </tr>
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
    <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <td  scope="col">CLIENT'S DOB</td >
    <!-- <td  scope="col">AFFILIATION NUMBER</td >
    <td  scope="col">NOM ET PRENOM ADHERENT </td > -->
    <td  scope="col">BENEFICIAIRY NAME </td >
    <!-- <td  scope="col">COST FOR CONSULTATION</td > -->
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <!-- <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td >
    <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td >
    <td  scope="col">COST FOR AMBULANCE</td >
    <td  scope="col">COST FOR OTHER CONSUMABLES</td > -->
    <td  scope="col">COST FOR MEDECINES</td >
    <td  scope="col">TOTAL AMOUNT</td >
    <td  scope="col">50%</td >
    <td  scope="col">50%</td >
  </tr>  
  <?php
  $i=0;
  // $gtcons=0;
  $gtlab=0;
  // $gtimg=0;
  // $gthosp=0;
  // $gtacts=0;
  // $gtambu=0;
  // $gtconso=0;
  $gtmed=0;
  $ggt=0;
  $gass1=0;
  $gass=0;
$med = "SELECT DISTINCT date FROM orders ORDER BY date ASC";// get the date 
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           {  die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					$dat=$rowmed['date'];																  
   $facture1 = "SELECT DISTINCT client_id, date FROM orders WHERE period='$period' AND date='$dat' AND insured=1 ";
                                             $retvalfac1 = mysqli_query($link,$facture1);
                                             if(! $retvalfac1 )
                                              {  die('Could not get data: ' . mysqli_error($link));   }                         
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {														
											 $cid=$rowfac1['client_id'];
											 $odate=$rowfac1['date'];											                      																					
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='MMI' ";
                                             $retvalfac2 = mysqli_query($link,$facture2);
                                             if(! $retvalfac2 )
                                              {  die('Could not get data: ' . mysqli_error($link));     }                        
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {																																																								
															$i++;
															$code=$rowfac2['client_id'];
															$percentage=$rowfac2['percentage'];															
													       echo'<td>'.$i.'</td>';
														   echo'<td>'.$cid.'</td>';
											         echo'<td>'.$odate.'</td>';
												       echo'<td>'.$rowfac2['dob'].'&nbsp</td>';
														   echo'<td>'.$rowfac2['name'].'&nbsp</td>';
														  //  echo'<td>'.$rowfac2['adherent'].'&nbsp</td>';
														  //  echo'<td>'.$rowfac2['beneficiary'].'</td>';
														          
																  $lab=0;
																  $med=0;																  
																  $tlab=0;
																  $tmed=0;
																  $gt=0;
																  $ass=0;
																  $assurance=0;									
$facture = "SELECT DISTINCT * FROM orders WHERE client_id=$code AND period='$period' AND date='$dat' AND insured=1";
$retvalfac = mysqli_query($link,$facture);
if(! $retvalfac )	{ die('Could not get data: ' . mysqli_error($link)); }    
while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
		{						
		// if ($rowfac['type']=='laboratoire')	
		// 	  {
				$lab=$rowfac['quantity']*$rowfac['unityp'];  
				$tlab+=$lab; 				
			  // }							  
		}		

    $facture = "SELECT DISTINCT prescription.qtty,drugs.unityp FROM prescription,drugs WHERE client_id=$code AND prescription.date='$dat' AND drugs.drug_id=prescription.drug_id";
    $retvalfac = mysqli_query($link,$facture);
    if(! $retvalfac ){ die('Could not get data: ' . mysqli_error($link));  }    
        while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                {                                                                             
                    $med=$rowfac['qtty']*$rowfac['unityp'];  
                    $tmed+=$med;                                   			
                } 
    
$gt=$tlab+$tmed;
$ass=$gt*50/100;	
$ass1=$gt*50/100;//TM
if($percentage>0)
{
$assurance=100-$percentage;
$ass=$gt*$assurance/100;
}
$gtlab+=$tlab;
$gtmed+=$tmed;
$ggt+=$gt;
$gass+=$ass;
$gass1+=$ass1;//TM
echo'<td>'.$tlab.'</td>';
echo'<td>'.$tmed.'</td>';
echo'<td>'.$gt.'</td>';
//echo'<td>='.$tcons.'+'.$tlab.'+'.$timg.'+'.$thosp.'+'.$tacts.'+'.$tconso.'+'.$tmed.'</td>';
echo'<td>'.$ass1.'</td>';//TM
echo'<td>'.$ass.'</td></tr>';																										
}
}
}    
  ?>      
  <tr>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <!-- <td bgcolor="SKYBLUE">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >-->
    <td bgcolor="#CCCCCC">&nbsp;</td > 
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>        
    <td><?php echo $gtlab ?></td>    
    <td><?php echo $gtmed ?></td>
    <td><?php echo $ggt ?></td>
    <td><?php echo $gass1 ?></td><!--TM-->
    <td> <?php echo $gass ?></td>
  </tr>
   <?php $grand=$gtlab; $grandmed=$gtmed;  ?>
</table>
</body>
</html>