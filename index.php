<?php
require("header.php");

$nameErr = $ageErr = $sexErr = $tempErr = $houseErr = $roadErr = $thanaErr = $districtErr =  "";
$name = $age = $sex = $temp = $house = $road = $thana = $district = "";
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
    if (empty($_POST["house"])) {
        $houseErr = "House NO. is required";
        $has_error = true;
    } else {
        $house = test_input($_POST["house"]);
    }
    if (empty($_POST["road"])) {
        $roadErr = "Road NO./Area is required";
        $has_error = true;
    } else {
        $road = test_input($_POST["road"]);
    }
    if (empty($_POST["thana"])) {
        $thanaErr = "Thana/Ward is required";
        $has_error = true;
    } else {
        $thana = test_input($_POST["thana"]);
    }
    if (empty($_POST["district"])) {
        $districtErr = "District/City is required";
        $has_error = true;
    } else {
        $district = test_input($_POST["district"]);
    }

    if ($temp > 99.5) {
        $score = 2;
    } else {
        $score = 0;
    }

    $_SESSION['score'] = $score;

    if (!$has_error) {
        $user_id = save_user($name, $age, $sex, $temp, $house, $road, $thana, $district);
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
            <div class="form-group form-row">
                <div class="col-auto">
                    <label><b>Address: </b></label>
                    <input class="form-control address" type="text" name="house" placeholder="House NO.">
                    <span class="text-danger"><?php echo $houseErr; ?></span>
                    <input class="form-control address" type="text" name="road" placeholder="Road/Area">
                    <span class="text-danger"><?php echo $roadErr; ?></span>
                    <input class="form-control address" type="text" name="thana" placeholder="Thana/Ward">
                    <span class="text-danger"><?php echo $thanaErr; ?></span>
                    <select class="form-control" name="district" id="exampleFormControlSelect1">
                        <option value="0">-Please select district-</option>
                        <?php
                        // $result = get_districts();
                        // while ($row = $result->fetch_assoc()) {
                        //     $district = $row["name"];
                        //     echo '<option value=" ' . $district . '"  >' . $district . '</option>';
                        // } 
                        writeOptionList("district", $district_id, 'name')
                        ?>
                    </select>

                    <span class="text-danger"><?php echo $districtErr; ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>

        </div>
    </div>
</form>
<?php require_once("footer.php"); ?>