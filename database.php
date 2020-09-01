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

function save_user($name, $age, $sex, $temp)
{
    global $conn;

    $sql = "INSERT INTO survey (name, age, sex, temp)
       VALUE ('$name', '$age', '$sex', '$temp')";

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

    $sql = "UPDATE survey SET score='$total_score', date=" . time() . " WHERE id=" . $id;
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
