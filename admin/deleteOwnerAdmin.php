<?php
include_once '../includes/dbh.inc.php';

if (isset($_GET['delete'])) {


    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM hostels WHERE hostelId = '$id';");


    header('location:ownerAdmin.php?error=none_deleteDone');
} else {
    header('location:ownerAdmin.php?error=deleteError');
}
