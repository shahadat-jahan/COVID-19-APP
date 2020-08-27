<?php
require("database.php");
require("header.php");
?>


<div class="p-3 mb-2 bg-light text-dark">
    <h2>Assessment records</h2>

    <?php
    $result = report();

    echo '<div class="table-responsive"><table class="table" ><thead class="thead-dark"><tr><th scope="col">SI No.</th><th scope="col">Full Name</th>
            <th scope="col">Age</th><th>Sex</th><th scope="col">Temperature</th><th scope="col">Assessment Date</th>
            <th scope="col">Assessment Score</th><th scope="col">COVID-19 Result</th></tr></thead><tbody>';

    while ($row = $result->fetch_assoc()) {
        if ($row['score'] < 5) {
            $report = "<span class='text-success'>Negative</span>";
        } else {
            $report = "<span class='text-danger'>Positive</span>";
        }

        echo '<tr><th scope="row">' . $row['id'] . '</th><td>' . $row['name'] . '</td><td>' . $row['age'] . '</td><td>' . $row['sex'] . '</td>
            <td>' . $row['temp'] . '</td><td>' . (date("Y-m-d", $row['date'])) . '</td><td>' . $row['score'] . '</td>
            <td>' . $report . '</td></tr>';
    }
    echo '</tbody></table></div>';
    ?>
</div>

<?php require_once("footer.php"); ?>