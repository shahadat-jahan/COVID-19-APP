<?php
require("header.php");

if (empty($_SESSION['admin_id'])) {
    header('location: ' . $site_url . 'admin_login.php');
    exit;
}
$year = date("Y");
$monthNum = $_GET['month'];
$monthName = date('F', mktime(0, 0, 0, $monthNum));
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if ($_GET["year"]) {
        $year = $_GET["year"];
    }
}
?>

<div class="p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col-3">
            <?php require("nav.php"); ?>
        </div>
        <div class="col-9">

            <div class="clearfix">



                <div>
                    <?php
                    $result = get_total_affected_by_date($year, $monthNum);

                    echo '<div class="table-responsive"><h4>Reports ' . $year . '-' . $monthName . ' by day</h4><table class="table" >
                    <tr><th>Day</th><th>Total</th><tr>';

                    while ($row = $result->fetch_assoc()) {
                        $monthNum  = $row['month'];

                        echo '<tr><td>' . $year . '-' . $monthNum . '-' . $row['day'] . '</td><td>' . $row['total'] . '</td></tr>';
                    }
                    echo '</table></div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>