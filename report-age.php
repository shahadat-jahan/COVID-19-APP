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
            <?php
            $average_age = avg_age();
            $total_male = total_sex("male");
            $total_female = total_sex("female");
            $average_age_male = avg_age_total_sex("male");
            $average_age_female = avg_age_total_sex("female");
            ?>
            <h2>Reports by age</h2>
            <div class="clearfix">
                <div class="box3" style="background-color:#ddd">
                    <p><b>Average age:</b> <?php echo ceil($average_age); ?></p>
                    <p><b>Average age male:</b> <?php echo ceil($average_age_male); ?></p>
                    <p><b>Average age female:</b> <?php echo ceil($average_age_female); ?></p>
                </div>
                <div class="box3" style="background-color:#ddd">
                    <p><b>Total male:</b> <?php echo $total_male; ?></p>
                </div>
                <div class="box3" style="background-color:#ddd">
                    <p><b>Total female:</b> <?php echo $total_female; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>