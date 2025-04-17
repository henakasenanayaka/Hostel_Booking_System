<?php
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    LoginUser($conn, $email, $password);
}
else{
    header('Location:../login.php');
}
