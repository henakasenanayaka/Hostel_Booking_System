<?php
include_once "header.php";
include_once 'includes/dbh.inc.php';
$select1 = mysqli_query($conn, "SELECT * FROM hostels ORDER BY hostelId DESC;");
$cardCount = 3;
$currentCount = 0;
?>

<link rel="stylesheet" href="index.css" />

<style>
  .sectin1Headding {
    color: rgb(255, 255, 255);
  }

  .buttonStyle {
    margin-top: 250px !important;
  }

  @media (max-width: 1500px) {
    .sectin1Headding {
      left: 5%;
    }

    .section1Vector2 {
      right: 6%;
    }

    .section1Vector1 {
      right: 10%;
    }
  }

  @media (max-width: 1300px) {
    .sectin1Headding {
      top: 35%;
      width: 500px;
    }
  }

  @media (max-width: 1050px) {
    .sectin1Headding {
      top: 25%;
      width: 300px;
    }
  }

  @media (max-width: 850px) {
    .sectin1Headding {
      display: none !important;
    }

    .section1Vector1 {
      position: relative;
      width: 80%;
      right: 0%;
      margin: auto;
    }

    .section1Vector2 {
      width: 80%;
      margin: auto;
    }

  }

  @media (max-width: 500px) {}
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<div class="error-handling">
  <?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 'none_logout') {
  ?>
      <script>
        swal({
          title: "Logout Successfully",
          buttons: ["Done", false],
        });
      </script>

    <?php
    } else if ($_GET['error'] == 'logstd') {
    ?>
      <script>
        swal({
          title: "Sorry!",
          text: "For contact hostel log as a student",
          icon: "warning",
        })
      </script>

  <?php
    } else if ($_GET['error'] == 'admTMissing') {
      ?>
        <script>
          swal({
            title: "Error!",
            text: "Please login as a admin to access admin panel.",
            icon: "error",
            dangerMode: true,
          })
        </script>
  
    <?php
      }
  }
  ?>
</div>

<section class="section1">
  <div class="sectin1Headding">
    “Unlock the perfect student living experience with our hostel”
  </div>
  <?php
  if (isset($_SESSION["userid"])) {
    echo '<div class="sectin1Headding" style="margin-top: 60px !important;">Hello ' . $_SESSION["username"] . '!</div>';
  } elseif (isset($_SESSION["adminId"])) {
    echo '<div class="sectin1Headding" style="margin-top: 60px !important;">Hello ' . $_SESSION["adminFirstName"] . '!</div>';
  }

  ?>
  <div class="buttonSection">
    <?php
    if (isset($_SESSION["userid"])) {
      echo '<center><a href="hostels.php"><button class=" section1Vector1Button buttonStyle">View Hostels</button></a></center> 
      <div class="section1Vector1SubHead">Need a Help?</div>
      <a href="">
        <div clas </div>
          <div class="section1Vector1Link">Help Section</div>
      </a>';
    } elseif (isset($_SESSION["adminId"])) {
      echo '<center><a href="admin/ownerAdmin.php"><button class=" section1Vector1Button buttonStyle">Owner Panel</button></a></center>
      <div class="section1Vector1SubHead">Need a Help?</div>
      <a href="">
        <div clas </div>
          <div class="section1Vector1Link">Help Section</div>
      </a>';
    } elseif (isset($_SESSION["adminMainId"])) {
      echo '<center><a href="admin/adminHome.php"><button class=" section1Vector1Button buttonStyle">Admin Panel</button></a></center>
      <div class="section1Vector1SubHead">Need a Help?</div>
      <a href="">
        <div clas </div>
          <div class="section1Vector1Link">Help Section</div>
      </a>';
    } else{
      echo '<center><a href="login.php"><button class=" section1Vector1Button buttonStyle">Login</button></a></center>
    <div class="section1Vector1SubHead">Need an account?</div>
    <a href="signupStudent.php">
      <div clas </div>
        <div class="section1Vector1Link">Create Account</div>
    </a>';
    }
    ?>
    
</section>

<section class="section2" style="height: 1200px !important;">
  <link rel="stylesheet" href="index2.css">
  <h1 class="t-shirt-heading" style="padding: 20px;">New Hostels</h1>
  <h4 class="t-shirt-heading2" style="padding: 20px;">Transforming Campus Living, Elevating Student Experience in Hostel Communities</h4>
  <div class="card-holder">

    <?php while ($row = mysqli_fetch_assoc($select1)) {
      if ($cardCount == $currentCount) {
        break;
      }
      $currentCount++
    ?>

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

    <?php  } ?>

  </div>

</section>

<section class="section3" style="margin-top: -100px !important;">
  <link rel="stylesheet" href="index3.css">
  <h1 class="t-shirt-heading" style="padding: 20px;">About Us</h1>
  <div class="aboutTextContainer">
    <h4 class="about-heading2" style="padding-left: 200px; padding-right: 200px; padding-top: 20px; padding-bottom: 20px; margin-top: 50px;">Whether you're a first-year student embarking on your college
      journey or a seasoned senior looking for a supportive living
      environment, we invite you to become a part of the community.
      Explore our website to learn more about our accommodation options,
      facilities, and how you can reserve your spot in our vibrant student hostel.
    </h4>
  </div>
  <?php
  include_once "profile_card_section.php"
  ?>
</section>

<section>
  <?php
  include_once "footer.php";
  ?>
</section>