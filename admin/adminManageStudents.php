<?php
ob_start();
include_once "headerAdmin.php";
include_once "../includes/dbh.inc.php";
$select = mysqli_query($conn, "SELECT * FROM students ORDER BY studentId DESC;");

?>

<link rel="stylesheet" href="ownerAdmin.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="error-handling">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'none_deleteDone2') {
        ?>
            <script>
                Swal.fire({
                    title: "Done!",
                    text: "Student deleted successfully!",
                    icon: "success"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'deleteError') {
        ?>
            <script>
                Swal.fire({
                    title: "Error!",
                    text: "Deleting failed. Please try again!",
                    icon: "error"
                });
            </script>

    <?php
        }
    }
    ?>
</div>


<center>
    <h2 style="color: white; background-color: #155576; margin-bottom: -10px; padding-bottom: 20px; padding-top: 100px;"><b>Active Students</b></h2>
</center>

<section class="section2">

    <table class="section2Table" style="width: fit-content; margin: auto;" border="1">
        <tr style="height: 100px; width: fit-content; background-color: #1478aa; margin: auto !important;">
            <th style="min-width: 50px;">Student ID</th>
            <th style="min-width: 150px;">First Name</th>
            <th style="min-width: 150px;">Last Name</th>
            <th style="min-width: 250px;">Student Email</th>
            <th style="min-width: 250px;">Contact Number</th>
            <th style="min-width: 150px;">Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($select)) {
        ?>

            <tr class="dataRows" style="height: 60px;">
                <td class="product-des"><?php echo $row['studentId']; ?></td>
                <td class="product-des"><?php echo $row['studentFirstName']; ?></td>
                <td class="product-des"><?php echo $row['studentLastName']; ?></td>
                <td class="product-des"><?php echo $row['studentEmail']; ?></td>
                <td class="product-name"><?php echo $row['contactNumber']; ?></td>
                <td class="product-action" style="text-align: center !important;">
                    <div class="action-inner">
                        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
                        <a href="actionAdmin2.php?delete=<?php echo $row['studentId']; ?>" class="icon-link"><iconify-icon icon="ic:outline-delete" width="30" class="delete-icon" style="color: #ff6219 !important;"></iconify-icon></a>
                    </div>

                </td>
            </tr>
        <?php } ?>
    </table>
</section>
