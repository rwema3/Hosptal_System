<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body{width:610px;}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-4px;padding:0;width:550px;position: absolute;}
#country-list li{padding: 11px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}

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
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}
tr:hover{ border:5px solid #F00;}

</style>

<script src="search/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "search/clients.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php include('link.php'); ?>

<div  style=" width:100% overflow:auto; box-shadow: 0px 0px 0px 0px #000; border: 0px solid #09F; position:absolute; background-color:#FFF; left: 4px; top: 35px;">
<form action="find.php" method="post">
<input  type="text" id="search-box" placeholder="Client id, name, ..." style="border: 1px solid #069;  height:30px; padding-left:30px;  font-size:16px;" autocomplete="off" name="client" size="30" />
<button class="button"  >Search</button>
<div id="suggesstion-box"></div>

</form>
<?php

if(isset($_POST['client']))
{					   
$code=$_POST['client'];
$defper = "SELECT * FROM clients WHERE client_id='$code' OR name LIKE'%$code%' LIMIT 1";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link)); }                         
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
            { $id=$defrowper['client_id']; }
		
				if(!empty($id))				
				{ include('find_existing.php');	}				
   }
				 
    ?>

<br />
</div>
</body>
</html>