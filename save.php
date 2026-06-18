<?php

$con = mysqli_connect('localhost','root','','travel');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['fname'];
$password  = $_POST['password'];
$email     = $_POST['email'];
$city      = $_POST['city'];
$phone     = $_POST['phone'];

$sql = "INSERT INTO customer(id, fname, password, email, city, phone)
        VALUES (0, '$firstname', '$password', '$email', '$city', '$phone')";

$result = mysqli_query($con, $sql);

if ($result) {

    if ($firstname == "admin" && $password == "ad123") {
        header("Location: admin.php");
        exit();
    } else {
        header("Location: mainPage.html");
        exit();
    }

} else {

    $que = "SELECT fname FROM customer WHERE fname='$firstname'";
    $check = mysqli_query($con, $que);

    if ($check) {
        echo "<script>alert('Username already taken');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);

?>