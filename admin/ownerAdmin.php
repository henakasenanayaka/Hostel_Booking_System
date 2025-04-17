<?php
ob_start();
include_once "headerAdmin.php";
include_once "../includes/dbh.inc.php";
$ownerEmail = $_SESSION["adminEmail"];
$select = mysqli_query($conn, "SELECT * FROM hostels WHERE ownerEmail = '$ownerEmail' ORDER BY hostelId DESC;");

if (isset($_POST['submit'])) {

    $hostelName = $_POST['hostelName'];
    $scale = $_POST['scale'];
    $address = $_POST['address'];
    $gMapLink = $_POST['gMapLink'];
    $roomsCount = $_POST['roomsCount'];
    $studentsPerRoom = $_POST['studentsPerRoom'];
    $description = $_POST['description'];


    $mainImage = $_FILES['mainImage']['name'];
    $img1 = $_FILES['cardImage1']['name'];
    $img2 = $_FILES['cardImage2']['name'];
    $mainImage_tmp_name = $_FILES['mainImage']['tmp_name'];
    $img1_tmp_name = $_FILES['cardImage1']['tmp_name'];
    $img2_tmp_name = $_FILES['cardImage2']['tmp_name'];
    $mainImage_folder = '../assets/uploaded/main/' . $mainImage;
    $img1_folder = '../assets/uploaded/card1/' . $img1;
    $img2_folder = '../assets/uploaded/card2/' . $img2;

    $hostelNameChecked = $conn->real_escape_string($hostelName);
    $addressChecked = $conn->real_escape_string($address);
    $gMapLinkChecked = $conn->real_escape_string($gMapLink);
    $roomsCountChecked = $conn->real_escape_string($roomsCount);
    $studentsPerRoomChecked = $conn->real_escape_string($studentsPerRoom);
    $descriptionChecked = $conn->real_escape_string($description);

    $insert = "INSERT INTO hostels(ownerEmail, hostelName, scale, address, gMapLink, roomCount, studentsPerRoom, description, mainImagePath, cardImagePath1, cardImagePath2) VALUES('$ownerEmail', '$hostelNameChecked','$scale','$addressChecked', '$gMapLinkChecked', '$roomsCountChecked', '$studentsPerRoomChecked', '$descriptionChecked', '$mainImage', '$img1', '$img2');";
    // $upload = mysqli_query($conn,$insert);

    if ($conn->query($insert) === false) {
        header('location: ownerAdmin.php?error=productError');
    } else {
        move_uploaded_file($mainImage_tmp_name, $mainImage_folder);
        move_uploaded_file($img1_tmp_name, $img1_folder);
        move_uploaded_file($img2_tmp_name, $img2_folder);
        header('location: ownerAdmin.php?error=none_productUploaded');
    }
}
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

<section class="vh-100 section1">
    <div class="container py-5 h-100 mainContainer">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">

                    <div class="col-md-6 col-lg-7 d-flex align-items-center outterContainer">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">Manage Hostels</span>
                            </div>

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Add new hostel</h3>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="hostelName" required />
                                            <label class="form-label" for="form2Example17">Hostel Name</label>
                                        </div>
                                        <div class="form-group signUpInput">
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="scale" required>
                                                <option value=""></option>
                                                <option value="Small">Small</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Large">Large</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <label for="exampleFormControlSelect1">Select Scale</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="address" required />
                                            <label class="form-label" for="form2Example17">Address</label>
                                        </div>
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" name="gMapLink" required />
                                            <label class="form-label" for="form2Example27">Google map embred link </label>&nbsp <a onclick="howTo()" style="cursor: pointer; color: #1e90ff;">( How to get the link )</a>

                                        </div>
                                    </div>

                                    <div class="inputContainer">
                                        <div class="inputContainerSection">
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="roomsCount" required />
                                                <label class="form-label" for="form2Example17">No of rooms</label>
                                            </div>
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example27" class="form-control form-control-lg" name="studentsPerRoom" required />
                                                <label class="form-label" for="form2Example27">Students per room</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="inputContainer">
                                        <div class="inputContainerSection">
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="description" required />
                                                <label class="form-label" for="form2Example17">Description</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Add main image (Pleace add image less than 1MB)</label>
                                        <input class="mb-2 form-control" type="file" id="formFile" name="mainImage" required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Add detail images (Pleace add images less than 1MB)</label>
                                        <input class="mb-2 form-control" type="file" id="formFile" name="cardImage1" required>
                                        <input class="mb-2 form-control" type="file" id="formFile" name="cardImage2" required>

                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" style="width: 100% !important; background-color: #155576;" type="submit" name="submit">Add Hostel</button>
                                    </div>
                            </form>
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
<center>
    <h2 style="color: white; background-color: #155576; margin-bottom: -10px; padding-bottom: 20px;"><b>Current Hostels</b></h2>
</center>

<section class="section2">

    <table class="section2Table" border="1">
        <tr style="height: 100px; background-color: #1478aa;">
            <th style="min-width: 150px;">Main Image</th>
            <th style="min-width: 150px;">Card Image1</th>
            <th style="min-width: 150px;">Card Image2</th>
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

            <tr class="dataRows">
                <td class="product-image">
                    <img src="../assets/uploaded/main/<?php echo $row['mainImagePath']; ?>" class="image-front productImg-link" style="height: 150px;">
                </td>
                <td class="product-image"><img src="../assets/uploaded/card1/<?php echo $row['cardImagePath1']; ?>" class="image-front productImg-link"></td>
                <td class="product-image"><img src="../assets/uploaded/card2/<?php echo $row['cardImagePath2']; ?>" class="image-front productImg-link"></td>
                <td class="product-des"><?php echo $row['scale']; ?></td>
                <td class="product-des"><?php echo $row['address']; ?></td>
                <td class="product-des"><?php echo $row['roomCount']; ?></td>
                <td class="product-des"><?php echo $row['studentsPerRoom']; ?></td>
                <td class="product-name" style="text-align: center !important;"><button onclick="getMap()" class="btn btn-secondary">View Map</button></a></td>
                <td class="product-des"><?php echo $row['description']; ?></td>
                <td class="product-action" style="text-align: center !important;">
                    <div class="action-inner">
                        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
                        <a href="editOwnerAdmin.php?edit=<?php echo $row['hostelId']; ?>" class="icon-link"><iconify-icon icon="tabler:edit" width="30" class="edit-icon"></iconify-icon></a>
                        <a href="deleteOwnerAdmin.php?delete=<?php echo $row['hostelId']; ?>" class="icon-link"><iconify-icon icon="ic:outline-delete" width="30" class="delete-icon" style="color: #ff6219 !important;"></iconify-icon></a>
                        <!-- <a href="#" class="btn-edit"> Edit </a> -->
                        <!-- <a href="#" class="btn-delete"> Delete </a> -->
                    </div>

                </td>
            </tr>
        <?php } ?>
    </table>
</section>


<?php
include_once "footerAdmin.php";
?>