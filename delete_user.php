<?php
require("header.php");

if (empty($_SESSION['admin_id'])) {
    header('location: ' . $site_url . 'admin_login.php');
    exit;
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET["id"];

    DeleteUser($id);
}

require_once("footer.php");
