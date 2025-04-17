<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $address= $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $description = $_POST['description'];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $invalidUid = invalidUid($userName);
    $ownerExcist = ownerExcist($conn, $email);
    $studentsExcist = studentExcist($conn, $email);

    if($invalidUid !== false){
        header("Location: ../signupOwner.php?error=invalidusername");
        exit();
    }

    if($ownerExcist !== false || $studentsExcist !== false){
        header("Location: ../signupOwner.php?error=userExcists");
        exit();
    }

    createOwner($conn, $fname, $lname, $userName, $email, $password, $address, $contactNumber, $description);

}
else{
    header('Location:../signupStudent.php');
}
