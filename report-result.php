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
            $negative = total_negative();
            $positive = total_positive();


            echo '<div class="table-responsive"><h2>Reports by result</h2><table class="table" ><thead class="thead-dark"><tr>
            <th scope="col">Total positive</th><th>Total negative</th></tr></thead><tbody>';


            echo '<tr><td>' . $positive . '</td><td>' . $negative . '</td></tr>';

            echo '</tbody></table></div>';
            ?>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>