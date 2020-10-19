<?php
session_start();
$server = "localhost";
$db_name = "covid-19";
$db_user = "root";
$db_pass = "";

//create connection
$conn = new mysqli($server, $db_user, $db_pass, $db_name);
//check connection
if ($conn->connect_error) {
    die("connection failed:" . $conn->connect_error);
}

function save_user($name, $age, $sex, $temp, $house, $road, $thana, $district)
{
    global $conn;
    $name = $conn->real_escape_string($name);
    $age = $conn->real_escape_string($age);
    $sex = $conn->real_escape_string($sex);
    $temp = $conn->real_escape_string($temp);
    $house = $conn->real_escape_string($house);
    $road = $conn->real_escape_string($road);
    $thana = $conn->real_escape_string($thana);
    $district = $conn->real_escape_string($district);
    echo  $sql = "INSERT INTO survey (name, age, sex, temp, house, road, thana, district)
       VALUE ('$name', '$age', '$sex', '$temp', '$house', '$road', '$thana', '$district')";

    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id;
    } else {
        return false;
    }
    $conn->close();
}

function update_result($id, $total_score)
{
    global $conn;

    $sql = "UPDATE survey SET score='$total_score'  WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function report()
{
    global $conn;
    $sql = "SELECT * FROM survey ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function avg_age()
{
    global $conn;
    $sql = "SELECT AVG(age) AS average_age FROM survey";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["average_age"];
    } else {
        return false;
    }
    $conn->close();
}

function avg_age_total_sex($sex)
{
    global $conn;
    $sql = "SELECT AVG(age) AS average_age FROM survey WHERE sex= '$sex'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["average_age"];
    } else {
        return false;
    }
    $conn->close();
}

function total_sex($sex)
{
    global $conn;
    $sql = "SELECT COUNT(sex) AS total_sex FROM survey WHERE sex= '$sex'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["total_sex"];
    } else {
        return false;
    }
    $conn->close();
}

function total_positive()
{
    global $conn;
    $sql = "SELECT COUNT(score) AS total_positive FROM survey WHERE score >= 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["total_positive"];
    } else {
        return false;
    }
    $conn->close();
}

function total_negative()
{
    global $conn;
    $sql = "SELECT COUNT(score) AS total_negative FROM survey WHERE score < 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["total_negative"];
    } else {
        return false;
    }
    $conn->close();
}

function total_positive_sex($sex)
{
    global $conn;
    $sql = "SELECT COUNT(score) AS total_positive FROM survey WHERE sex = '$sex' AND score >= 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["total_positive"];
    } else {
        return false;
    }
    $conn->close();
}

function total_negative_sex($sex)
{
    global $conn;
    $sql = "SELECT COUNT(score) AS total_negative FROM survey WHERE sex = '$sex' AND score < 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row["total_negative"];
    } else {
        return false;
    }
    $conn->close();
}

function get_total_affected($year)
{
    global $conn;
    $sql = "SELECT count(*) as total, month(date) as month, year(date) as year FROM `survey` where year(date) = '$year' group by year,month ORDER BY year desc, `month` ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function get_total_affected_by_date($year, $monthNum)
{
    global $conn;
    $sql = "SELECT count(*) as total, day(date) as day, month(date) as month, year(date) as year FROM `survey` where year(date) = '$year' AND month(date) = '$monthNum' group by day ORDER BY day desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function total_affected_zone()
{
    global $conn;
    $sql = "SELECT count(*) as total, district as district FROM `survey` group by district ORDER BY total DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function get_symptoms($step)
{
    global $conn;
    $sql = "SELECT * FROM symptoms WHERE  display_in = '$step' ORDER BY symptom ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function get_districts()
{
    global $conn;
    $sql = "SELECT * FROM district ORDER BY name ASC ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
    $conn->close();
}

function writeOptionList($table, $fld)
{
    global $conn;
    $sql = "SELECT * FROM $table ORDER BY $fld ASC";
    $result = $conn->query($sql);
    if (!$result) {
        echo "failed to open $table<p>";
        return false;
    }
    //If data exist
    while ($a_row = $result->fetch_assoc()) {
        if ($id == $a_row["id"])
            $selected = "SELECTED";
        else
            $selected = "";
        echo "<option $selected value='" . $a_row["id"] . "'>" . $a_row[$fld] . "</option>";
    }
}

function user_symptom($user_id, $symptoms_id)
{
    global $conn;
    $sql = "INSERT INTO user_symptom (survey_id, symptoms_id)
    VALUES ('$user_id','$symptoms_id')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}

function login($name, $password)
{
    global $conn;

    $sql = "SELECT id FROM users WHERE name='" . $name . "' AND password='" . md5($password) . "' limit 1";
    $result = $conn->query($sql);
    if ($result) {
        return $result->fetch_array();
    } else {
        return false;
    }
    $conn->close();
}
