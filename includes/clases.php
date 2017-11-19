<?php
session_start();
require_once("clases/validator.php");
require_once("clases/auth.php");
require_once("clases/json.php");
require_once("clases/mysql.php");

$db = new Mysql();
$auth = new Auth();
$validator = new Validator();
?>
