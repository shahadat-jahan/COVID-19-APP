<?php
require("database.php");

if (empty($_SESSION['user_id'])) {
    header('location: ' . $site_url);
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (count($_POST["additional_symptoms"]) > 0) {
        $score =  (count($_POST["additional_symptoms"]) * 2);
    } else {
        $score = 0;
    }
    $_SESSION['score'] = $_SESSION['score'] + $score;
    $result = update_result($_SESSION['user_id'], $_SESSION['score']);
    if ($result) {
        header('location: ' . $site_url . 'advice.php');
        exit;
    }
}
require("header.php");
$symptoms = get_symptoms('step2');
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <div class="p-3 mb-2 bg-light text-dark">
            <h2>Please select additional symptoms from following</h2>
            <div class="form-group">
                <?php
                while ($row = $symptoms->fetch_assoc()) {

                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="additional_symptoms[]" value="yes">
                        <label class="form-check-label"><?php echo $row['symptom']; ?></label>
                    </div>
                <?php
                }
                ?>


                <button type="submit" class="btn btn-primary">Finish</button>

            </div>
        </div>
</form>

<?php require_once("footer.php"); ?>