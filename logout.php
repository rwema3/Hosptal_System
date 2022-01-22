<?php
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

</head>
<body>

<?php
// remove all session variables
session_unset();


session_destroy();

    header("Location: login.php");
    exit;?>

</body>
</html> 