<?php
ob_start();

include_once "headerAdmin.php";
include_once "../includes/dbh.inc.php";
if (isset($_SESSION["adminMainId"])) {
} else {
    header("Location:../index.php?error=admTMissing");
}
?>

<link rel="stylesheet" href="ownerAdmin.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="error-handling">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'none_productUploaded') {
    ?>
            <script>
                Swal.fire({
                    title: "Done",
                    text: "Hostel added successfully!",
                    icon: "success"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'productError') {
        ?>
            <script>
                Swal.fire({
                    title: "Error",
                    text: "Contact developers!",
                    icon: "error"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'none_productEdditedSuccessfully') {
        ?>
            <script>
                Swal.fire({
                    title: "Done!",
                    text: "Hostel details updated successfully!",
                    icon: "success"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'none_deleteDone') {
        ?>
            <script>
                Swal.fire({
                    title: "Done!",
                    text: "Hostel deleted successfully!",
                    icon: "success"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'productEditError') {
        ?>
            <script>
                Swal.fire({
                    title: "Error!",
                    text: "Updating failed. Please try again!",
                    icon: "error"
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

<section class="vh-100 section1">
    <div class="container py-5 h-100 mainContainer">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">

                    <div class="col-md-6 col-lg-7 d-flex align-items-center outterContainer">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">Welcome Admin</span>
                            </div>

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Name: <?php echo $_SESSION["adminMainName"] ?></h3>
                            <div class="pt-1 mb-4">
                                <a href="adminManageStudents.php"><button class="btn btn-dark btn-lg btn-block" style="width: 100% !important; background-color: #155576;" type="submit" name="submit">Manage Students</button></a>
                            </div>
                            <div class="pt-1 mb-4">
                                <a href="adminManageOwners.php"><button class="btn btn-dark btn-lg btn-block" style="width: 100% !important; background-color: #155576;" type="submit" name="submit">Manage Hostel Owners</button></a>
                            </div>
                            <div class="pt-1 mb-4">
                                <a href="adminMangeHostels.php"><button class="btn btn-dark btn-lg btn-block" style="width: 100% !important; background-color: #155576;" type="submit" name="submit">Manage Hostels</button></a>
                            </div>
                            <div class="termsSection">
                                <a href="#!" class="small text-muted ">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


<?php
include_once "footerAdmin.php";
?>