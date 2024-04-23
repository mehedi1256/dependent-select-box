<?php

$conn = mysqli_connect("localhost", "root", "", "dependent_select_box") or die("Could not connect to MySQL: " . mysqli_connect_error());

if ($_POST['type'] == "") {
    $sql = "SELECT * FROM country";
    $query = mysqli_query($conn, $sql) or die("Could not execute");

    $str = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }
}elseif($_POST['type'] == "stateData") {
    $sql = "SELECT * FROM state WHERE country_id = {$_POST['id']}";
    $query = mysqli_query($conn, $sql) or die("Could not execute");

    $str = "";
    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['id']}'>{$row['state_name']}</option>";
    }
}

echo $str;
