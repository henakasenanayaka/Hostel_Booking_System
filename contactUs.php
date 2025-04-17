<?php
ob_start();
include_once "header.php";
include_once 'includes/dbh.inc.php';

if (isset($_SESSION["userid"])) {
} else if($_SESSION["adminId"]){
    header("location:index.php?error=logstd");
} else {
    header("location:login.php");
}

if (isset($_GET['hostel'])) {
    $id = $_GET['hostel'];
} else {
    header("location:index.php");
}

$select = mysqli_query($conn, "SELECT * FROM hostels WHERE hostelId = '$id';");
$row = mysqli_fetch_assoc($select);

?>

<link rel="stylesheet" href="contactUs.css">

<div class="container" style="margin-top: 90px;">
    <div style="text-align:center">
        <h2>Contact <?php echo $row['hostelName']; ?></h2>
        <p><?php echo $row['ownerEmail']; ?> &nbsp; || &nbsp; <?php echo $row['scale']; ?> hostel</p>
    </div>
    <div class="row">
        <div class="column">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/uploaded/main/<?php echo $row['mainImagePath']; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/uploaded/main/<?php echo $row['cardImagePath1']; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/uploaded/main/<?php echo $row['cardImagePath2']; ?>" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div>
            <div style="padding: 20px;">
                <p style="margin-bottom: 0px;">Description</p>
                <p style="font-size: 20px;">Hostels offer budget-friendly accommodations, fostering a
                    vibrant communityatmosphere ideal for
                    travelers and students alike.</p>
                <p style="margin-bottom: 0px;">Address</p>
                <p style="font-size: 20px;">School junction,pitipana,Homagama</p>
            </div>
        </div>
        <div class="column">
            <form action="hostels.php?error=none_contact_done" method="POST">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name.." value='<?php echo $_SESSION["username"] ?>' required>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name.." value='<?php echo $_SESSION["usernamelast"] ?>' required>
                <label for="lname">Contact Number</label>
                <input type="text" id="cNum" name="contactNumber" placeholder="Contact number.." value='<?php echo $_SESSION["cnum"] ?>' required>
                <label for="country">University</label>
                <select id="country" name="country" required>
                    <option value="NSBM">NSBM</option>
                    <option value="UOJ">UOJ</option>
                    <option value="SLIIT">SLIIT</option>
                    <option value="Other">Other</option>
                </select>
                <label for="subject">Questions</label>
                <textarea id="subject" name="questions" placeholder="Write something.." style="height:100px"></textarea>
                <input type="submit" value="Submit" style="width: 100%;">
            </form>
        </div>
    </div>
</div>
<div style="margin-left: 158px; margin-right: 158px;">
    <div style="width: fit-content; margin: auto; ">
        <?php echo $row['gMapLink']; ?>
    </div>


</div>

<?php
include_once "footer.php";
?>