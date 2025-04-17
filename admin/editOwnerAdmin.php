<?php
ob_start();
include_once "headerAdmin.php";
include_once "../includes/dbh.inc.php";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    if (isset($_POST['submit'])) {
        $newHostelName = $_POST['hostelName'];
        $newScale = $_POST['scale'];
        $newAddress = $_POST['address'];
        $newRoomCount = $_POST['roomCount'];
        $newStudentsPerRoom = $_POST['studentsPerRoom'];
        $newDescription = $_POST['description'];

        $hostelNameChecked = $conn->real_escape_string($newHostelName);
        $addressChecked = $conn->real_escape_string($newAddress);
        $roomsCountChecked = $conn->real_escape_string($newRoomCount);
        $studentsPerRoomChecked = $conn->real_escape_string($newStudentsPerRoom);
        $descriptionChecked = $conn->real_escape_string($newDescription);

        $query = "UPDATE `hostels` SET hostelName='$hostelNameChecked', scale='$newScale', address='$addressChecked', roomCount='$roomsCountChecked', studentsPerRoom='$studentsPerRoomChecked', description='$descriptionChecked' WHERE hostelId='$id';";
        $upload = mysqli_query($conn, $query);

        if ($upload) {
            header('location:ownerAdmin.php?error=none_productEdditedSuccessfully');
        } else {
            header('location:ownerAdmin.php?error=productEditError');
        }
    }
}
?>

<link rel="stylesheet" href="ownerAdmin.css">
<?php
$select = mysqli_query($conn, "SELECT * FROM hostels WHERE hostelId = '$id';");
$row = mysqli_fetch_assoc($select);
?>

<section class="vh-100 section1">
    <div class="container py-5 h-100 mainContainer">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">

                    <div class="col-md-6 col-lg-7 d-flex align-items-center outterContainer">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Manage Hostels</span>
                            </div>

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit hostel details</h3>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="hostelName" value="<?php echo $row['hostelName'] ?>" required />
                                            <label class="form-label" for="form2Example17">Hostel Name</label>
                                        </div>
                                        <div class="form-group signUpInput">
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="scale" required>
                                                <option value="<?php echo $row['scale'] ?>"><?php echo $row['scale'] ?></option>
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
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="address" value="<?php echo $row['address'] ?>" required />
                                            <label class="form-label" for="form2Example17">Address</label>
                                        </div>
                                    </div>

                                    <div class="inputContainer">
                                        <div class="inputContainerSection">
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="roomCount" value="<?php echo $row['roomCount'] ?>" required />
                                                <label class="form-label" for="form2Example17">No of rooms</label>
                                            </div>
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example27" class="form-control form-control-lg" name="studentsPerRoom" value="<?php echo $row['studentsPerRoom'] ?>" required />
                                                <label class="form-label" for="form2Example27">Students per room</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="inputContainer">
                                        <div class="inputContainerSection">
                                            <div class="form-outline mb-4 signUpInput">
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="description" value="<?php echo $row['description'] ?>" required />
                                                <label class="form-label" for="form2Example17">Description</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" style="width: 100% !important; background-color: #155576;" type="submit" name="submit">Update Hostel details</button>
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