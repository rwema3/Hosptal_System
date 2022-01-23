<?php //include('head.php'); ?>
<?php include('link.php'); ?>
<!-- <title>.::RECORDS::.</title> -->
<?php //include('navbar.php'); ?>
<!-- <div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:92vh;overflow:auto;">
      <div style="position:absolute;border: 0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:700px;">
        <div  style="width:99.5%;height:90%;box-shadow:0px 0px 5px 0px #000;border:1px solid #09F;position:relative;background-color:#FFF;left:4px;top:60px;overflow:auto;"> -->
        <div style="position:absolute;border-radius:0px 200px 10px 10px;width:250px;border:1px solid #09F;height:25px;background-color:#BDF;left:-2px;top:-27px;color:#000;"><b>CLIENTS RECORDS</b></div><br>
          <table bgcolor="#CCC">
            <form action="records.php" method="post">
              <tr>
                <!-- <td clalinktd>
                <td><input class="form-control" type="text" style="padding-left:30px;  font-size:16px;" name="client" size="30" /></td>
                <td></td>
                <td><button class="button" ><span>Ok </span></button></td> -->
              </tr>
            </form>
          </table>
          <hr />

            <?php
                  // if (isset($_POST["order"])) 
                  // {
                  // $deletet=$_POST['order'];
                  // $code=$_POST['client2'];
                  // if ($_SESSION['post']=='accountant')
                  // {
                  // mysqli_query ($link,"DELETE FROM orders WHERE order_id=$deletet");
                  // echo  '<h2 style="background-color:#F00;" > Suprimé!<h2/>';
                  // }
                  // else
                  // { echo  '<h2 style="background-color:#F00;" > Pas autorisé à faire cette operation!<h2/>'; }
                  // }

                  if(isset($_GET['id']))
                  {
                  $code=$_GET['id'];
                  $defper = "SELECT DISTINCT * FROM clients WHERE client_id='$code' ";
                          $retvalper = mysqli_query($link,$defper);
                          if(! $retvalper )
                            {  die('Could not get data: ' . mysqli_error($link));   }                         
                          while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                  {
                            $id=$defrowper['client_id'];
                  echo '<b style="text-transform:uppercase;color:#000;"><center>'.$defrowper['name'].' - '.$defrowper['dob'].' - ['.$defrowper['insurance'].'] - #'.$id.'</center></b>';
                            echo'<hr>';				   
                                  echo'<center><table width="98%" class="table table-striped table-hover table-sm table-bordered text-dark" cellspacing="0" cellpadding="0">
                                            <thead bgcolor="#000" style="color:#FFF;">
                                            <th style="text-align:left;">Designation</th>
                                            <th style="text-align:left;">Qty</th>					
                                            <th colspan="" style="text-align:left;">Date</th>                                            
                                            </thead>';						   

                                            echo '<form action="records.php" method="post">';	                                        
                                            
                                            // if($typ=='med')
                                            //     {
                      $defpe = "SELECT * FROM prescription, drugs WHERE prescription.drug_id=drugs.drug_id AND client_id=$id AND tip!='consultation' ORDER BY date DESC ";
                      $retvalpe = mysqli_query($link,$defpe);
                                                  if(! $retvalpe ){  die('Could not get data: ' . mysqli_error($link));   }                         
                                                      while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                                                                {
                                            echo'<tr>';
                                            echo '<td>'.$defrowpe['drug_name'].'</td>';
                                            echo'<td class="cent">'.$defrowpe['qtty'].'</td>';                                            
                                            echo'<td class="cent">'.$defrowpe['date'].'</td>';                                            
                                            echo'</form>';
                                            echo '</tr>';	
                                            }

                      $defpe = "SELECT * FROM prescription, consultation WHERE prescription.drug_id=consultation.cons_id AND client_id=$id AND tip='consultation' ORDER BY date DESC ";
                      $retvalpe = mysqli_query($link,$defpe);
                                                  if(! $retvalpe ){  die('Could not get data: ' . mysqli_error($link));   }                         
                                                      while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                                                                {
                                            echo'<tr>';
                                            echo '<td>'.$defrowpe['name'].'</td>';
                                            echo'<td class="cent">'.$defrowpe['qtty'].'</td>';                                            
                                            echo'<td class="cent">'.$defrowpe['date'].'</td>';                                            
                                            echo'</form>';
                                            echo '</tr>';	
                                            }


                      $defpe = "SELECT * FROM lab_results WHERE client_id=$id ORDER BY date DESC ";
                      $retvalpe = mysqli_query($link,$defpe);
                                                  if(! $retvalpe ){  die('Could not get data: ' . mysqli_error($link));   }                         
                                                      while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                                                                {
                                            echo'<tr>';
                                            echo '<td>'.$defrowpe['act'].'</td>';
                                            echo'<td class="cent">1</td>';                                            
                                            echo'<td class="cent">'.$defrowpe['date'].'</td>';                                            
                                            echo'</form>';
                                            echo '</tr>';	
                                            }                                            

                                                // }
                              $defper = "SELECT * FROM orders WHERE client_id=$id ORDER BY time DESC ";
                                              $retvalper = mysqli_query($link,$defper);
                                              if(! $retvalper )
                                                {  die('Could not get data: ' . mysqli_error($link));   }                         
                                                  while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                                            {
                                          $typ=$defrowper['type'];
                                          $it=$defrowper['item_id'];
                                          $oid=$defrowper['order_id'];		
                                       
                                            
                  //                       if($typ=='soins' || $typ=='ambulance' || $typ=='consultation' || $typ=='laboratoire' || $typ=='hospitalisation')
                  //                                         {
                  // $defpe = "SELECT act,orders.quantity,orders.unityp,order_id,orders.date,orders.time FROM orders,acts WHERE orders.client_id=$id AND orders.item=acts.act_id AND orders.item='$it' AND orders.order_id='$oid' ORDER BY orders.time DESC ";
                  // $retvalpe = mysqli_query($link,$defpe);
                  //                             if(! $retvalpe )
                  //                               {   die('Could not get data: ' . mysqli_error($link));    }                         
                  //                                 while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                  //                                           {		
                  //                       echo'<tr>';
                  //                       echo '<td>'.$defrowpe['act'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['quantity'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['unityp'].'</td>';
                  //                       $t=$defrowpe['quantity']*$defrowpe['unityp'];
                  //                       echo'<td class="cent">'.$t.'</td>'; 
                  //                       echo '<input input types="hidden" name="order" value="'.$defrowpe['order_id'].'">';
                  //                             echo '<input type="hidden" name="client2" value="'.$id.'">';
                  //                         echo'<td class="cent">'.$defrowpe['date'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['time'].'</td>';
                  //                       echo'</form>';
                  //                       echo '</tr>';	
                  //                       }
                  //                           }
                                            
                  //                       if($typ=='link one')
                  //                                       {
                  // $defpe = "SELECT * FROM orders WHERE client_id=$id AND item='$it' AND order_id='$oid' ORDER BY time DESC ";
                  // $retvalpe = mysqli_query($link,$defpe);
                  //                             if(! $retvalpe )
                  //                               {    die('Could not get data: ' . mysqli_error($link));    }                         
                  //                                 while($defrowpe = mysqli_fetch_array($retvalpe, MYSQLI_ASSOC))
                  //                                           {
                  //                       echo'<tr>';
                  //                       echo '<td>'.$defrowpe['item'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['quantity'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['unityp'].'</td>';
                  //                       $t=$defrowpe['quantity']*$defrowpe['unityp'];
                  //                       echo'<td class="cent">'.$t.'</td>'; 
                  //                       echo '<input type="hidden" name="order" value="'.$defrowpe['order_id'].'">';
                  //                             echo '<input type="hidden" name="client2" value="'.$id.'">';
                  //                         echo'<td class="cent">'.$defrowpe['date'].'</td>';
                  //                       echo'<td class="cent">'.$defrowpe['time'].'</td>';
                  //                       echo'</form>';
                  //                       echo '</tr>';	
                  //                       }
                  //                         }
                                                            }
                                        echo'</table></center>';
                                }				 				
                    }				 
                ?>
            <br />
        </div>
      </div>
    </div>
  </div>
</div>  
<?php include('foot.php'); ?>