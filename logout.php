<?php
require_once('./includes/clases.php');
$auth->logout();
header("Location:index.php");
exit;
?>
