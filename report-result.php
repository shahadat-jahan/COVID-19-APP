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
            $positive = total_positive();
            $negative = total_negative();
            $positive_male = total_positive_sex("male");
            $positive_female = total_positive_sex("female");
            $negative_male = total_negative_sex("male");
            $negative_female = total_negative_sex("female");
            ?>
            <h2>Reports by result</h2>
            <div class="clearfix">
                <div class="box" style="background-color:#ddd">
                    <p><b>Total positive:</b> <?php echo $positive; ?></p>
                    <p><b>Total positive male:</b> <?php echo $positive_male; ?></p>
                    <p><b>Total positive female:</b> <?php echo $positive_female; ?></p>
                </div>
                <div class="box" style="background-color:#ddd">
                    <p><b>Total negative:</b> <?php echo $negative; ?></p>
                    <p><b>Total negative male:</b> <?php echo $negative_male; ?></p>
                    <p><b>Total negative female:</b> <?php echo $negative_female; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>