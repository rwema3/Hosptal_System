<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM drugs WHERE drug_name like '" . $_POST["keyword"] . "%'  ORDER BY drug_name LIMIT 0,10";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["drug_name"]; ?>');"><?php echo $country["drug_name"].'</strong>'; ?></li>
<?php } ?>
</ul>
<?php } } ?>