<?php
require 'config.php';
error_reporting(0);

// insert
$error = array();

//state
if (empty($_POST['state_id'])) {
    $error[] = "State is Required";
} else {
    $state = $_POST['state_id'];
}

//city
if (empty($_POST['city_name'])) {

    $error[] = "City Name is Required";
} else {
    
        $city_name = $_POST['city_name'];

        if (!preg_match("/^[A-Z][a-z]*$/", $city_name)) {
            $error[] = "Only First Character Capital and Alphabets and Whitespace are allowed.";
        } else {
            $city_name = $_POST['city_name'];
        }
}

echo "<center>";

$count = count($error);
if ($count > 0) {
    foreach ($error as $value) {
        echo "<span class='error'>" . $value . "</span><br>";
    }
} else {

    $checkCity = "select * from city where city_name = '$city_name'";
    $result = mysqli_query($con,$checkCity);
    $row= mysqli_fetch_array($result,MYSQLI_NUM);

    if($row[0] > 0){
        echo "<span class='error'>City Already Exist...!</span>";
        exit();
    }else{
        $city_name = $_POST['city_name'];
        $state_id = $_POST['state_id'];

        $insert = "insert into city values(NULL,'$city_name','$state_id');";
        $result = mysqli_query($con, $insert);

        if ($result) {

            echo "<span class='success'>Inserted Data..!</span>";
        }
    }
}

echo "</center>";
