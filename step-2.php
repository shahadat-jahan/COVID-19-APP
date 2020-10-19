<?php

require("header.php");
if (empty($_SESSION['user_id'])) {
    header('location: ' . $site_url);
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (count($_POST["symptoms"]) > 0) {
        $score = 3 + (count($_POST["symptoms"]) - 1);
    } else {
        $score = 0;
    }
    user_symptom($_SESSION["user_id"], $_POST["symptoms_id"]);
    $_SESSION['score'] = $_SESSION['score'] + $score;
    header('location: ' . $site_url . 'step-3.php');
    exit;
}

$symptoms = get_symptoms('step1');

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <div class="p-3 mb-2 bg-light text-dark">
            <h2>Please select symptoms following</h2>
            <div class="form-group">
                <?php while ($row = $symptoms->fetch_assoc()) {
                    // print_r($row);
                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                        <label class="form-check-label"><?php echo $row['symptom']; ?></label>
                    </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>

        </div>
    </div>
</form>

<?php require_once("footer.php"); ?>