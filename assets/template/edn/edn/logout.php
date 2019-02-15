<?php
session_start();
$_SESSION = array();
session_destroy();
//$home_url = "http://localhost/edn/";
//echo "<script> window.location='http://localhost/edn/'; </script>";
//header('Location: ' . $home_url);
?>