<?php
require("header.php");

if (empty($_SESSION['admin_id'])) {
    header('location: ' . $site_url . 'admin_login.php');
    exit;
}
$year = date("Y");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["year"]) {
        $year = $_POST["year"];
    }
}
?>

<div class="p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col-3">
            <?php require("nav.php"); ?>
        </div>
        <div class="col-9">
            <h3>Select year</h3>
            <div class="clearfix">

                <form class="form-inline" action="report-date.php" method="post">

                    <select name="year" class="custom-select form-control mb-2 mr-sm-2">
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                    </select>

                    <button type="submit" class="btn btn-primary mb-2">Generate report</button>

                </form>

                <div>
                    <?php
                    $result = get_total_affected($year);

                    echo '<div class="table-responsive"><h4>Reports per month</h4><table class="table" >
                    <tr><th>Year</th><th>Month</th><th>Total</th><tr>';

                    while ($row = $result->fetch_assoc()) {
                        $monthNum  = $row['month'];
                        $monthName = date('F', mktime(0, 0, 0, $monthNum));
                        echo '<tr><td>' . $row['year'] . '</td><td>' . $monthName . '</td>
                        <td>' . $row['total'] . '</td></tr>';
                    }
                    echo '</table></div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require("footer.php"); ?>