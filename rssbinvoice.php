<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INVOICE RSSB</title>
</head>
<?php
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);
?>

<?php 

session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 

?>

<?php
include('link.php');
$period=$_GET['p'];


?>
<body>
<!--<table width="0" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="222" scope="col"><b>PROVINCE/MVK</b></td>
    <th width="17" scope="col">&nbsp;</th>
    <th width="188" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td scope="row"><b>ADMINISTRATIVE DISTRICT</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td scope="row"><b>HEALTH FACILITY<b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td scope="row"><b>CODE/HEALTH FACILITY</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
-->
<br />





<table style="font-size:13px; border-collapse:collapse;"  width ="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <th  bgcolor="#CCCCCC" colspan="21">SUMMARY OF VOUCHERS FOR RWANDA SOCIAL SECURITY BOARD (RSSB)</th>
  </tr>
  
  
  
  <tr bgcolor="#E5E5E5">
    <td  scope="col">No</td >
     <td  scope="col">CODE</td >
    <td  scope="col">DATE</td >
    <!-- <td  scope="col">VOUCHER IDENTIFICATION</td >
    <td  scope="col">BENEFICIARY AFFILIATION NUMBER</td > -->
    <td  scope="col">BENEFIFICIARY'S DOB</td >
    <td  scope="col">BENEFICIARY'S SEX</td >
    <td  scope="col">BENEFICIARY'S NAMES </td >
    <!-- <td  scope="col">AFFILIATE'S NAME</td >
    <td  scope="col">AFFILIATE'S AFFECTATION</td > -->
    <!-- <td  scope="col">COST FOR CONSULTATION</td > -->
    <td  scope="col">COST FOR LABORATORY TESTS</td >
    <!-- <td  scope="col">COST FOR MEDICAL IMAGING</td >
    <td  scope="col">COST FOR HOSPITALISATION</td > -->
    <!-- <td  scope="col">COST FOR PROCEDURES AND MATERIALS</td > -->
    <!-- <td  scope="col">COST FOR AMBULANCE</td > -->
    <!-- <td  scope="col">COST FOR OTHER CONSUMABLES</td > -->
    <td  scope="col">COST FOR MEDEDECINES</td >
    <td  scope="col">TOTAL AMOUNT</td >
    <td  scope="col">10% OF TOTAL AMOUNT</td >
    <td  scope="col">90% OF TOTAL AMOUNT</td >
  </tr>
  <tr >
    <td  scope="row">&nbsp;</td >
    <td>&nbsp;</td>
    <!-- <td>&nbsp;</td>
    <td>&nbsp;</td> -->
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#EFEFEF">100%</td>
    <!-- <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td> -->
    <!-- <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td> -->
    <!-- <td bgcolor="#EFEFEF">100%</td>
    <td bgcolor="#EFEFEF">100%</td> -->
    <td bgcolor="#EFEFEF">10%</td>
    <td bgcolor="#EFEFEF">90%</td>
  </tr>
  
  
  <?php
  $i=0;                                                                  
																  $gtlab=0;																  
																  $gtmed=0;
																  $ggt=0;
																  $gass=0;
  
  $med = "SELECT DISTINCT date FROM orders ORDER BY date ASC";// get the date 
        $retvalmed = mysqli_query($link,$med);
        if(! $retvalmed )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
									$dat=$rowmed['date'];
                                                                  
																  
   $facture1 = "SELECT DISTINCT client_id, date FROM orders WHERE period='$period' AND date='$dat' AND insured=1 ";
                                             $retvalfac1 = mysqli_query($link,$facture1);
                                             if(! $retvalfac1 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac1 = mysqli_fetch_array($retvalfac1, MYSQLI_ASSOC))
                                                        {
														
											 $cid=$rowfac1['client_id'];
											 $odate=$rowfac1['date'];
											                      
											                      
											 
											 
											 $facture2 = "SELECT* FROM clients WHERE client_id=$cid AND insurance='RSSB' ";
                                             $retvalfac2 = mysqli_query($link,$facture2);
                                             if(! $retvalfac2 )
                                              {
                                               die('Could not get data: ' . mysqli_error($link));
                                              }    
          
           
                                                 while($rowfac2 = mysqli_fetch_array($retvalfac2, MYSQLI_ASSOC))
                                                        {
														
													
														
															$i++;
															$code=$rowfac2['client_id'];
															
													       echo'<td>'.$i.'</td>';
														   echo'<td>'.$cid.'</td>';
											         echo'<td>'.$odate.'</td>';
												      //  echo'<td>'.$rowfac2['serie'].'&nbsp</td>';
														  //  echo'<td>'.$rowfac2['insurance_code'].'&nbsp</td>';
														   echo'<td>'.$rowfac2['dob'].'</td>';
														   echo'<td>'.$rowfac2['sex'].'</td>';
														   echo'<td>'.$rowfac2['name'].'</td>';
														  //  echo'<td>'.$rowfac2['adherent'].'</td>';
														  //  echo'<td>'.$rowfac2['department_aff'].'</td>';
														          
																  
																  														   
														   
														   
														   
														          // $cons=0;
																  $lab=0;
																  // $img=0;
																  // $hosp=0;
																  // $acts=0;
																  // $ambu=0;
																  // $conso=0;
																  $med=0;
																  
																  // $tcons=0;
																  $tlab=0;
																  // $timg=0;
																  // $thosp=0;
																  // $tacts=0;
																  // $tambu=0;
																  // $tconso=0;
																  $tmed=0;
																  $gt=0;
																  $ass=0;
																  
																  
																  
																  
																  
                  $facture = "SELECT DISTINCT * FROM orders,acts WHERE client_id=$code AND period='$period' AND orders.date='$dat' AND orders.insured=1 AND acts.act_id=orders.item_id";
                        $retvalfac = mysqli_query($link,$facture);
                        if(! $retvalfac ){ die('Could not get data: ' . mysqli_error($link));  }    
                            while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                                    {                              																																																														
																				    // if ($rowfac['type']=='laboratoire')	
															              //                 {
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
																 $ass=$gt*90/100;																	 

																  $gtlab+=$tlab;																  
																  $gtmed+=$tmed;
																  $ggt+=$gt;
																  $gass+=$ass;																  																
																echo'<td>'.$tlab.'</td>';																		
																echo'<td>'.$tmed.'</td>';	
																echo'<td>'.$gt.'</td>';
																echo'<td>'.$gt*0.1.'</td>';
																echo'<td>'.$ass.'</td></tr>';
																																																																																	
														}														          																  																  																  
												}
				 }				 
  ?>  
  
  <tr>
    <!-- <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td> -->
    <!-- <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC"><strong>SUB-TOTAL</strong></td> -->
    <!-- <td><?php echo $gtcons ?></td> -->
    <!-- <td><?php echo $gtlab ?></td> -->
    <!-- <td><?php echo $gtimg ?></td>
    <td><?php echo $gthosp ?></td>
    <td><?php echo $gtacts ?></td>
    <td><?php echo $gtambu ?></td>
    <td><?php echo $gtconso ?></td> -->
    <!-- <td><?php echo $gtmed ?></td>
    <td><?php echo $ggt ?></td>
    <td> <?php echo $ggt*0.10; ?></td>
    <td> <?php echo $gass ?></td> -->
  </tr>
   <?php $grand=$gtlab; $grandmed=$gtmed;  ?>
  <tr>
    <!-- <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td >
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td> -->
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC">&nbsp;</td>
    
    <td bgcolor="#CCCCCC">&nbsp;</td>
    <td bgcolor="#CCCCCC"><strong>TOTAL</strong></td>
    <td><?php echo $grand ?></td>
    <!-- <td></td> -->
    <!-- <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td> -->
    <td><?php echo $grandmed ?></td>
    <td><?php echo ($grand+$grandmed)?></td>
    <td><?php echo ($grand+$grandmed)*10/100 ?></td>
    <td><?php echo ($grand+$grandmed)*90/100 ?></td>
  </tr>
</table>

</body>
</html>