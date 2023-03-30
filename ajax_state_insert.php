<?php
require 'config.php';
error_reporting(0);
// insert
$error = array();
if (empty($_POST['state_name'])) {

    $error[] = "State Name is Required";
} else {
    $state_name = $_POST['state_name'];

    if (!preg_match("/^[A-Z][a-z]*$/", $state_name)) {
        $error[] = "Only First Character Capital and Alphabets and Whitespace are allowed.";
    } else {
        $state_name = $_POST['state_name'];
    }
}

echo "<center>";

$count = count($error);
if ($count > 0) {
    foreach ($error as $value) {
        echo "<span class='error'>" . $value . "</span><br>";
    }
} else {
    $checkState = "select * from state where state_name = '$state_name'";
    $result = mysqli_query($con, $checkState);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    if ($row[0] > 0) {
        echo "<span class='error'>State Already Exist...!</span>";
        exit();
    } else {

        $state_name = $_POST['state_name'];
        $insert = "insert into state values(NULL,'$state_name');";
        $result = mysqli_query($con, $insert);

        if ($result) {

            echo "<span class='success'>Inserted Data..!</span>";
        }
    }
}


echo "</center>";
