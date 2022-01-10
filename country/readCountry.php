<?php
include('link.php');
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM acts WHERE act like '" . $_POST["keyword"] . "%' ORDER BY act LIMIT 0,6";
$result = $link->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["act"]; ?>');"><?php echo $country["act"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>