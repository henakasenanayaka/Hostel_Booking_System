<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$select1 = mysqli_query($conn, "SELECT * FROM hostels ORDER BY hostelId DESC;");

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="error-handling">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'none_contact_done') {
    ?>
            <script>
                Swal.fire({
                    title: "Request Send.",
                    text: "Hostel owner will contact you soon.",
                    icon: "success"
                });
            </script>

    <?php
        }
    }
    ?>
</div>

<link rel="stylesheet" href="hostels.css">

<h1 class="t-shirt-heading" style="margin-top: 70px; padding: 20px;">HOSTELS</h1>
<div class="card-holder">

    <?php while ($row = mysqli_fetch_assoc($select1)) { ?>

        <div class="card mb-3" style="max-width: 1000px; height: 300px;">
            <div class="row no-gutters" style="height: 100% !important;">
                <div class="col-md-4">
                    <img src="assets/uploaded/main/<?php echo $row['mainImagePath']; ?>" style="width: 100%; height: 100%;" class="card-img" alt="hostel_image">
                </div>
                <div class="col-md-8" style="text-align: left !important;">
                    <div class="card-body">
                        <b>
                            <h4 class="card-title"><?php echo $row['hostelName']; ?></h4>
                        </b>
                        <p class="card-text"><?php echo $row['address']; ?></p>
                        <p class="card-text"><?php echo $row['scale']; ?> Hostel</p>
                        <p class="card-text"><?php echo $row['ownerEmail']; ?></p>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <p><a href="contactUs.php?hostel=<?php echo $row['hostelId']; ?>"><button>Contact Owner</button></a></p>
                    </div>

                </div>

            </div>
        </div>

    <?php } ?>

</div>


<?php
include_once 'footer.php';
?>