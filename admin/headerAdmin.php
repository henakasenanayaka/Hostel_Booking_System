<?php
session_start();

if (isset($_SESSION["adminId"])) {
}else if(isset($_SESSION["adminMainId"])){

}else{
    header("Location:../index.php?error=admTMissing");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MyHostel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    </style>
    <link rel="stylesheet" href="headerAdmin.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary userNavbar">
        <div class="container-fluid">
            <a class="navbar-brand userNavLogo" href="../index.php">Best Hotel</a>
            <button class="navbar-toggler userToggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ulContainer" id="navbarSupportedContent">
                <!-- <div style="width: 75%;"></div> -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ulHolder" style="justify-content: right; margin-right: 40px !important;">
                    <li class="nav-item">
                        <a class="nav-link active userNavLink" aria-current="page" href="../index.php" style="width: 100px;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link userNavLink" aria-current="page" href="../hostels.php" style="width: 100px;">Hostels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link userNavLink" aria-current="page" href="#" style="width: 100px;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION["userid"])) {
                            echo '<a class="nav-link userNavLink" aria-current="page" href="../includes/logout.inc.php" style="width: 100px;">Logout</a>';
                        } elseif (isset($_SESSION["adminId"])) {
                            echo '<a class="nav-link userNavLink" aria-current="page" href="../includes/logout.inc.php" style="width: 100px;">Logout</a>';
                        } elseif (isset($_SESSION["adminMainId"])) {
                            echo '<a class="nav-link userNavLink" aria-current="page" href="../includes/logout.inc.php" style="width: 100px;">Logout</a>';
                        }
                        ?>

                    </li>


                </ul>
                <!-- <div class="social-logo-container">
                    <ul class="social-logo-container-ul">
                        <li>
                            <a href="https://www.facebook.com/sryncloth/">
                                <svg class="sociallogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="https://commercialbankleap.globallinker.com/network/profile/rohan-bulegoda/510913">
                                <svg class="sociallogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z" />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <a href="https://lk.linkedin.com/in/rohan-shantha-bulegoda-7468669" style="padding-right: 20px">
                                <svg class="sociallogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 .4C4.698.4.4 4.698.4 10s4.298 9.6 9.6 9.6s9.6-4.298 9.6-9.6S15.302.4 10 .4zM7.65 13.979H5.706V7.723H7.65v6.256zm-.984-7.024c-.614 0-1.011-.435-1.011-.973c0-.549.409-.971 1.036-.971s1.011.422 1.023.971c0 .538-.396.973-1.048.973zm8.084 7.024h-1.944v-3.467c0-.807-.282-1.355-.985-1.355c-.537 0-.856.371-.997.728c-.052.127-.065.307-.065.486v3.607H8.814v-4.26c0-.781-.025-1.434-.051-1.996h1.689l.089.869h.039c.256-.408.883-1.01 1.932-1.01c1.279 0 2.238.857 2.238 2.699v3.699z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </nav>