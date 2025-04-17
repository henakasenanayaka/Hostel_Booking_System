<?php
include_once '../includes/dbh.inc.php';

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM owners WHERE ownerId = '$id';");



    header('location:adminManageOwners.php?error=none_deleteDone3');
} else {
    header('location:adminManageOwners.php?error=deleteError');
}
