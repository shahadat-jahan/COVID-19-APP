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
            <div>
                <?php
                $result = total_affected_zone();

                echo '<div class="table-responsive"><h4>Reports by district</h4><table class="table" >
                    <tr><th>District</th><th>Total</th><tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr><td>' . $row['district'] . '</td><td>' . $row['total'] . '</td></tr>';
                }
                echo '</table></div>';
                ?>
            </div>
        </div>
    </div>
</div>

<?php require("footer.php"); ?>