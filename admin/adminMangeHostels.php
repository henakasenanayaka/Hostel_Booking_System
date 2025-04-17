<?php
ob_start();
include_once "headerAdmin.php";
include_once "../includes/dbh.inc.php";
$select = mysqli_query($conn, "SELECT * FROM hostels ORDER BY hostelId DESC;");

?>

<link rel="stylesheet" href="ownerAdmin.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function howTo() {
        Swal.fire({
            imageUrl: "../assets/gmap_guid.png",
            imageHeight: 1500,
            imageAlt: "Google Map Guid",
            showCancelButton: true,
            showConfirmButton: false,
        });
    }

    function getMap(mapCode) {
        console.log(mapCode);
        Swal.fire({
            title: "<strong>Current Map</strong>",

            html: `<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.64159766627!2d80.03365777466092!3d6.813373993184241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24dd1caf3e667%3A0x54a8b535a21aaee5!2z4La04LeU4Lav4LeP4Lac4LeZIOC2tuC3neC2qeC3kuC2uA!5e0!3m2!1sen!2slk!4v1710916686365!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>`,

        });
    }
</script>


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


<center>
    <h2 style="color: white; background-color: #155576; margin-bottom: -10px; padding-bottom: 20px; padding-top: 100px;"><b>Active Hostels</b></h2>
</center>

<section class="section2">

    <table class="section2Table" border="1">
        <tr style="height: 100px; background-color: #1478aa;">
            <th style="min-width: 150px;">Main Image</th>
            <th style="min-width: 150px;">Card Image1</th>
            <th style="min-width: 150px;">Card Image2</th>
            <th style="min-width: 250px;">Owner Email</th>
            <th style="min-width: 150px;">Scale</th>
            <th style="min-width: 250px;">Address</th>
            <th style="min-width: 75px;">Rooms</th>
            <th style="min-width: 75px;">Students</th>
            <th style="min-width: 300px;">Map Link</th>
            <th style="min-width: 500px;">Description</th>
            <th style="min-width: 150px;">Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($select)) {
        ?>

            <tr class="dataRows" style="border: solid 5px #ffffff;">
                <td class="product-image">
                    <img src="../assets/uploaded/main/<?php echo $row['mainImagePath']; ?>" class="image-front productImg-link" style="height: 150px;">
                </td>
                <td class="product-image" ><img src="../assets/uploaded/card1/<?php echo $row['cardImagePath1']; ?>" class="image-front productImg-link"></td>
                <td class="product-image"><img src="../assets/uploaded/card2/<?php echo $row['cardImagePath2']; ?>" class="image-front productImg-link"></td>
                <td class="product-des" ><?php echo $row['ownerEmail']; ?></td>
                <td class="product-des"><?php echo $row['scale']; ?></td>
                <td class="product-des"><?php echo $row['address']; ?></td>
                <td class="product-des"><?php echo $row['roomCount']; ?></td>
                <td class="product-des"><?php echo $row['studentsPerRoom']; ?></td>
                <td class="product-name" style="text-align: center !important;"><button onclick="getMap()" class="btn btn-secondary">View Map</button></a></td>
                <td class="product-des"><?php echo $row['description']; ?></td>
                <td class="product-action" style="text-align: center !important;">
                    <div class="action-inner">
                        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
                        <a href="actionAdmin.php?delete=<?php echo $row['hostelId']; ?>" class="icon-link"><iconify-icon icon="ic:outline-delete" width="30" class="delete-icon" style="color: #ff6219 !important;"></iconify-icon></a>
                    </div>

                </td>
            </tr>
        <?php } ?>
    </table>
</section>
