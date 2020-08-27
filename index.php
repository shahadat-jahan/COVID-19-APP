<?php
require("database.php");

$nameErr = $ageErr = $sexErr = $tempErr = "";
$name = $age = $sex = $temp = "";
$has_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Full name is required";
        $has_error = true;
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $has_error = true;
    } else {
        $age = test_input($_POST["age"]);
    }
    if (empty($_POST["sex"])) {
        $sexErr = "Sex is required";
        $has_error = true;
    } else {
        $sex = test_input($_POST["sex"]);
    }
    if (empty($_POST["temp"])) {
        $tempErr = "Body temperature is required";
        $has_error = true;
    } else {
        $temp = test_input($_POST["temp"]);
    }


    if ($temp > 99.5) {
        $score = 2;
    } else {
        $score = 0;
    }

    $_SESSION['score'] = $score;

    if (!$has_error) {
        $user_id = save_user($name, $age, $sex, $temp);
        if ($user_id > 0) {
            $_SESSION['user_id'] = $user_id;
            header('location: ' . $site_url . 'step-2.php?id=' . $user_id);
            // echo "Data save successfully!";
            exit;
        } else {
            echo "User save failed!";
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
require("header.php");
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
    <div class="form-group">
        <div class="p-3 mb-2 bg-light text-dark">
            <h2>User Info</h2>

            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Full Name: </b></label>
                    <input class="form-control" type="text" name="name">
                    <span class="text-danger"><?php echo $nameErr; ?></span>
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Age: </b></label>
                    <input class="form-control" type="text" name="age">
                    <span class="text-danger"><?php echo $ageErr; ?></span>
                </div>
            </div>
            <div class="form-group">
                <label><b>Sex: </b></label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="Male">
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="Female">
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sex" value="Other">
                    <label class="form-check-label">Other</label>
                </div>
                <span class="text-danger"><?php echo $sexErr; ?></span>
            </div>
            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Body temperature: (F) </b></label>
                    <input class="form-control" type="text" name="temp">
                    <span class="text-danger"><?php echo $tempErr; ?></span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Next</button>

        </div>
    </div>
</form>
<?php require_once("footer.php"); ?>