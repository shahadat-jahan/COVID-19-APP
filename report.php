<?php
require("header.php");

if (empty($_SESSION['admin_id'])) {
    header('location: ' . $site_url . 'admin_login.php');
    exit;
}

?>

<div class="p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col-3">
            <?php require("nav.php"); ?>
        </div>
        <div class="col-9">
            <h2>Reports</h2>
            <div class="clearfix">
                <div class="box">
                    <a href="report-age.php" role="button">Reports by age</a>
                </div>
                <div class="box">
                    <a href="report-result.php" role="button">Reports by result</a>
                </div>
                <div class="box">
                    <a href="report-date.php" role="button">Reports by date</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>