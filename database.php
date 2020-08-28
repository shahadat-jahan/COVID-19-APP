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

function login($name, $pass)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE name='" . $name . "' AND pass='" . $pass . "' limit 1";
    $result = $conn->query($sql);
    if ($result) {
        return $result->fetch_array();
    } else {
        return false;
    }
    $conn->close();
}
