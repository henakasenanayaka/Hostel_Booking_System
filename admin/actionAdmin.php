<?php
include_once '../includes/dbh.inc.php';

if (isset($_GET['delete'])) {

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                
                });

                <?php

                $id = $_GET['delete'];
                mysqli_query($conn, "DELETE FROM hostels WHERE hostelId = '$id';");

                ?>
            }
        });
    </script>

<?php


    header('location:adminMangeHostels.php?error=none_deleteDone');
} else {
    header('location:adminMangeHostels.php?error=deleteError');
}

?>