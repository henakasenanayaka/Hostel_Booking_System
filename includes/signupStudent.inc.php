<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contactNum = $_POST['contactNum'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $invalidUid = invalidUid($fname);
    $studentExcist = studentExcist($conn, $email);
    $ownerExcist = ownerExcist($conn, $email);

    if($invalidUid !== false){
        header("Location: ../signupStudent.php?error=invalidusername");
        exit();
    }

    if($studentExcist !== false || $ownerExcist !== false){
        header("Location: ../signupStudent.php?error=userExcists");
        exit();
    }

    createStudent($conn, $fname, $lname, $email, $contactNum, $password);
    
}
else{
    header('Location:../signupStudent.php');
}
