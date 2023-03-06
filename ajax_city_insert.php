<?php
require 'config.php';

// insert
$error = array();
if (empty($_POST['city_name'])) {

    $error[] = "City Name is Required";
} else {
    $city_name = $_POST['city_name'];

    if (!preg_match("/^[a-zA-z]*$/", $city_name)) {
        $error[] = "Only alphabets and whitespace are allowed.";
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
}else{

    $city_name = $_POST['city_name'];
    $insert = "insert into city values(NULL,'$city_name',0);";
    $result = mysqli_query($con, $insert);
    
    if ($result) {
        
        echo "<span class='success'>Inserted Data..!</span>";
    }
}

echo "</center>";