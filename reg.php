<?php
require "Connection.php";

//collects given data
$user = $_POST["username"];
$pass = $_POST["pass"];
$confpass = $_POST["confpass"];
$num = $_POST["stdnum"] + 0;
$name = $_POST["name"];
$school = $_POST["school"];

//checks for used usernames
$stmt = $conn->prepare("SELECT * FROM student WHERE Username=?");
$stmt->bind_param('s', $user);
$stmt->execute();
$result = $stmt->get_result();

//when username has been used
if ($result->num_rows != 0){
    echo "3";
}

//when password and confirm password are not the same
else if ($pass != $confpass){
    echo "1";
}

//when school has no data, high chance of not happening
else if ($school == NULL){
    echo "2";
}

//when every variable has a value
else {
    //checks if school is in DB
    $stmt = $conn->prepare("SELECT * FROM school WHERE School_Name=? LIMIT 1");
    $stmt->bind_param('s', $school);
    $stmt->execute();
    $result = $stmt->get_result();

    //if school is found
    if ($result->num_rows == 1){
        $row = $result->fetch_array();
        $school = $row[0] + 0;

        //registers user and sends "0"
        $pass = password_hash($confpass, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO student (Username, Password, Std_Num, Std_Name, School) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssisi", $user, $pass, $num, $name, $school);
        $stmt->execute();

        echo "0";
    }
    //if school is not found
    else {
        //inserts school into DB
        $stmt = $conn->prepare("INSERT INTO school (School_Name) VALUES (?)");
        $stmt->bind_param('s', $school);
        $stmt->execute();

        //gets index of school
        $stmt = $conn->prepare("SELECT * FROM school WHERE School_Name=? LIMIT 1");
        $stmt->bind_param('s', $school);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_array();
        $school = $row[0] + 0;

        //registers user and sends "0"
        $pass = password_hash($confpass, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO student (Username, Password, Std_Num, Std_Name, School) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssisi", $user, $pass, $num, $name, $school);
        $stmt->execute();

        echo "0";
    }

    
}
?>