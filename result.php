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
            $result = report();

            echo '<div class="table-responsive"><h2>Assessment records</h2><table class="table" ><thead class="thead-dark"><tr><th scope="col">SI No.</th><th scope="col">Full Name</th>
            <th scope="col">Age</th><th>Sex</th><th scope="col">Temperature</th><th scope="col">Assessment Date</th>
            <th scope="col">Assessment Score</th><th scope="col">COVID-19 Result</th></tr></thead><tbody>';

            while ($row = $result->fetch_assoc()) {
                if ($row['score'] < 5) {
                    $report = "<span class='text-success'>Negative</span>";
                } else {
                    $report = "<span class='text-danger'>Positive</span>";
                }

                echo '<tr><th scope="row">' . $row['id'] . '</th><td>' . $row['name'] . '</td><td>' . $row['age'] . '</td><td>' . $row['sex'] . '</td>
            <td>' . $row['temp'] . '</td><td>' . $row['date'] . '</td><td>' . $row['score'] . '</td>
            <td>' . $report . '</td></tr>';
            }
            echo '</tbody></table></div>';
            ?>
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>