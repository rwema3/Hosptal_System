<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM clients WHERE name like '%" . $_POST["keyword"] . "%'  ORDER BY name LIMIT 0,10";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>

<li onClick="selectCountry('<?php echo $country["client_id"]; ?>');"><?php echo '<strong>'.$country["name"].'</strong>'.'___#'.$country["client_id"].'______Age:'.$country["dob"].''.'_____('.$country["insurance"].')'; ?></li>
<?php } ?>
</ul>
<?php } } ?>