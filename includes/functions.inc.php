<?php

function invalidUid($username)
{
    $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createStudent($conn, $fname, $lname, $email, $contactNum, $password)
{
    $sql = "INSERT INTO students (studentFirstName, studentLastName, studentEmail, contactNumber, studentPassword) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../login.php?error=stmtfaild");
        exit();
    }

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $contactNum, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none_reg");
    exit();
}

function createOwner($conn, $fname, $lname, $userName, $email, $password, $address, $contactNumber, $description)
{
    $sql = "INSERT INTO owners (ownerName, ownerFirstName, ownerLastName, ownerEmail, hostelAddress, contactNumber, ownerPassword, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../login.php?error=stmtfaild");
        exit();
    }

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssss", $userName, $fname, $lname, $email,  $address, $contactNumber, $password, $description);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none_reg");
    exit();
}

function emptyInputsLogin($username, $password)
{
    $result = "";
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function studentExcist($conn, $email)
{
    $sql = "SELECT * FROM students WHERE studentEmail = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../login.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function ownerExcist($conn, $email)
{
    $sqlOwner = "SELECT * FROM owners WHERE ownerEmail = ?;";

    $stmtOwner = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtOwner, $sqlOwner)) {
        header("Location:../login.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmtOwner, "s", $email);
    mysqli_stmt_execute($stmtOwner);
    $resultData = mysqli_stmt_get_result($stmtOwner);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmtOwner);
}

function adminExcist($conn, $email)
{
    $sql = "SELECT * FROM admins WHERE adminEmail = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../login.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function LoginUser($conn, $email, $password)
{

    $studentExcist = studentExcist($conn, $email);
    $ownerExcist = ownerExcist($conn, $email);
    $adminExcist = adminExcist($conn, $email);

    if ($studentExcist === false && $ownerExcist === false && $adminExcist === false) {
        header("Location:../login.php?error=invalidCredentials");
        exit();
    }

    $passwordHashedStudent = $studentExcist['studentPassword'];
    $passwordHashedOwner = $ownerExcist['ownerPassword'];
    $passwordHashedAdmin = $adminExcist['adminPassword'];

    // $chkPassword = password_verify($password, $passwordHashed);
    if ($passwordHashedStudent !== $password && $passwordHashedOwner !== $password && $passwordHashedAdmin !== $password) {
        header("Location:../login.php?error=invalidCredentials");
        exit();
    } else if ($passwordHashedStudent == $password) {
        session_start();
        $_SESSION["userid"] = $studentExcist["studentId"];
        $_SESSION["username"] = $studentExcist["studentFirstName"];
        $_SESSION["usernamelast"] = $studentExcist["studentLastName"];
        $_SESSION["email"] = $studentExcist["studentEmail"];
        $_SESSION["cnum"] = $studentExcist["contactNumber"];
        header("Location:../index.php?error=none_student");
        exit();
    } else if ($passwordHashedOwner == $password) {
        session_start();
        $_SESSION["adminId"] = $ownerExcist["ownerId"];
        $_SESSION["adminName"] = $ownerExcist["ownerName"];
        $_SESSION["adminEmail"] = $ownerExcist["ownerEmail"];
        $_SESSION["adminFirstName"] = $ownerExcist["ownerFirstName"];
        header("Location:../index.php?error=none_owner");
        exit();
    } else if ($passwordHashedAdmin == $password) {
        session_start();
        $_SESSION["adminMainId"] = $adminExcist["adminId"];
        $_SESSION["adminMainName"] = $adminExcist["adminName"];
        $_SESSION["adminMainEmail"] = $adminExcist["adminEmail"];
        header("Location:../admin/adminHome.php?error=none_admin");
        exit();
    }
}
