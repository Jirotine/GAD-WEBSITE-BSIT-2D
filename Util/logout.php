<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: ../PHP/home.php");

exit;
?>