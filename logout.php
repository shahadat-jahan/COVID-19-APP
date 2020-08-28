<?php
require("database.php");
$_SESSION["admin_id"] = ""; ///destroy session
unset($_SESSION["admin_id"]);
session_destroy();
header('location: ' . $site_url . ' admin_login.php');
exit;
