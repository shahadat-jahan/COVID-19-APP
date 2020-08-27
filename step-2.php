<?php
require("database.php");
$_SESSION['user_id'];
if (empty($_SESSION['user_id'])) {
    header('location: ' . $site_url);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (count($_POST["symptoms"]) > 0) {
        $score = 3 + (count($_POST["symptoms"]) - 1);
    } else {
        $score = 0;
    }
    $_SESSION['score'] = $_SESSION['score'] + $score;
    header('location: ' . $site_url . 'step-3.php');
    exit;
}
require("header.php");
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <div class="p-3 mb-2 bg-light text-dark">
            <h2>Please select symptoms following</h2>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                    <label class="form-check-label">Breathing problem</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                    <label class="form-check-label">Dry cough</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                    <label class="form-check-label">Sore throat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                    <label class="form-check-label">Weakness</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="symptoms[]" value="yes">
                    <label class="form-check-label">Runny nose</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>

        </div>
    </div>
</form>

<?php require_once("footer.php"); ?>