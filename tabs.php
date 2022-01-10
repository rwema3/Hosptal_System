  <?php 
    include('link.php');
    $id=$_GET['id'];
    $insu=$_GET['insu'];
    $date=$_GET['date'];
    
    session_start();
    if(!$_SESSION['valid_user']){
        header("Location: login.php");
        exit;
    } 
	?>
<html>
<head>
  <title>EasyTabs Demo</title>
  <script src="vendor/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="vendor/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="lib/jquery.easytabs.min.js" type="text/javascript"></script>
  <style>    
    /* Example Styles  */
    .etabs { margin: 0; padding: 0; }
    .tab { display: inline-block; zoom:1; text-decoration; *display:inline; background:#eee; border: solid 1px #06F; color:#000; border-bottom: none; -moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0;width:310px; }
    .tab a { font-size: 22px; text-decoration:none; color:#000; line-height: 2em; display: block; padding: 0 10px; outline: none; width:310px; text-align:center;}
    .tab a:hover { text-decoration: none; }
	.tab:hover { background-color:#CAE4FF; }
    .tab.active { background: #fff; box-shadow: 0px 0px 5px 0px #000; padding-top: 6px; position: relative; top: 1px; border: 3px solid #111; }
    .tab a.active { font-weight: bold; }
    .tab-container .panel-container { background: #fff; border: solid #666 1px; padding: 10px; -moz-border-radius: 0 4px 4px 4px; -webkit-border-radius: 0 4px 4px 4px; height:570px;}
    .panel-container { margin-bottom: 10px; height:325px; }
  </style>
  <script type="text/javascript">
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
  </script>
</head>
<body>
  
<?php $post=$_SESSION['post'];    ?>

<div id="tab-container" class='tab-container'>
  <ul class='etabs'>  
    <li class='tab'><a href="#cons"><strong><img src="img/labo.png" width="24" height="24">Consultation</strong></a></li> 
    <li class='tab'><a href="#lab"><strong><img src="img/labo.png" width="24" height="24">Laboratory</strong></a></li> 
    <li class='tab'><a href="#med"><strong><img src="img/pres.png" width="24" height="24">Prescription</strong></a></li>
    <li class='tab'><a href="#bill"><strong><img src="img/bill.png" width="24" height="24">Bill</strong></a></li>  
    <li class='tab'><a href="#hist"><strong><img src="img/bill.png" width="24" height="24">Records</strong></a></li>  
  </ul>
<div class='panel-container'>
      
      <div id="cons">  
        <iframe style="position:absolute;  border: 0px solid #F00; width: 1000px; height: 520px;" src="cons.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>">
        </iframe>
      </div>

      <div id="lab">  
        <iframe style="position:absolute;  border: 0px solid #F00; width: 1000px; height: 520px;" src="lab.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>">
        </iframe>
      </div>
        
      <div id="med">
        <iframe style="position:absolute; border: 0px solid #F00; width: 1200px; height: 520px;" src="presc.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
      </div>
      
      <div id="bill">
        <iframe style="position: absolute; border: 0px solid #F00; width: 1000px; height: 520px; " src="bill.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
      </div>

      <div id="hist">
        <iframe style="position: absolute; border: 0px solid #F00; width: 1000px; height: 520px; " src="records.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
      </div>

 </div>
</div>
</body>
</html>
