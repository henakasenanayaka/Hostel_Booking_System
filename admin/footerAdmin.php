<link href="footerAdmin.css" rel="stylesheet" type="text/css">
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.lordicon.com/lordicon-1.2.0.js"></script>

<section >
    <style>
        .contactBarContainer {
            display: flex;
            margin-top: 20px !important;

            justify-content: space-around;
            width: 100%;
        }

        .contactBarCall1 {
            display: flex;
            cursor: pointer;
        }

        .contactBarCall2 {
            display: flex;
            cursor: pointer;
        }

        .contactBarEmail {
            display: flex;
            cursor: pointer;
        }

        .emailContact {
            margin-right: 10px;
            transition: 0.3s ease;
        }

        .callContact1 {
            transition: 0.3s ease;
        }

        .callContact2 {
            transition: 0.3s ease;
        }

        .footer1 {
            background-color: #155576;
        }

        .footer-logo {
            display: block;
            margin: auto;
            margin-top: 5%;
            width: 70% !important;
        }

        @media (max-width: 950px) {
            .contactBarContainer {
                display: block;
                width: fit-content;
                /* margin-left: auto;
      margin-right: auto; */
            }
        }

        .footerLogo{
            color: #ffffff;
            text-align: left;
            padding-left: 20px;
            margin-top: 50px;
        }
        .sub-button:hover{
            background-color: #155576 !important;
        }
    </style>

    <footer class="footer1">
        <div class="footer-div1">
            <div class="subscribe-feild">
                <h1 class="footer-div1-heading1" style="color: white;"><strong>Follow Us on</strong></h1>
                <ul class="sociallogo-container-footer">
                    <a href="https://www.facebook.com/sryncloth/">
                        <li class="logo-li"><svg class="sociallogo-footer" style="fill: #ffffff;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
                            </svg></li>
                    </a>
                    <a href="https://commercialbankleap.globallinker.com/network/profile/rohan-bulegoda/510913">
                        <li class="logo-li"><svg class="sociallogo-footer" style="fill: #ffffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4c0 146.8-111.8 315.9-316.1 315.9c-63 0-121.4-18.3-170.6-49.8c9 1 17.6 1.4 26.8 1.4c52 0 99.8-17.6 137.9-47.4c-48.8-1-89.8-33-103.8-77c17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35c25.1-4.7 49.1-14.1 70.5-26.7c-8.3 25.7-25.7 47.4-48.8 61.1c22.4-2.4 44-8.6 64-17.3c-15.1 22.2-34 41.9-55.7 57.6z" />
                            </svg></li>
                    </a>
                    <a href="https://lk.linkedin.com/in/rohan-shantha-bulegoda-7468669">
                        <li class="logo-li"><svg class="sociallogo-footer" style="fill: #ffffff;"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 .4C4.698.4.4 4.698.4 10s4.298 9.6 9.6 9.6s9.6-4.298 9.6-9.6S15.302.4 10 .4zM7.65 13.979H5.706V7.723H7.65v6.256zm-.984-7.024c-.614 0-1.011-.435-1.011-.973c0-.549.409-.971 1.036-.971s1.011.422 1.023.971c0 .538-.396.973-1.048.973zm8.084 7.024h-1.944v-3.467c0-.807-.282-1.355-.985-1.355c-.537 0-.856.371-.997.728c-.052.127-.065.307-.065.486v3.607H8.814v-4.26c0-.781-.025-1.434-.051-1.996h1.689l.089.869h.039c.256-.408.883-1.01 1.932-1.01c1.279 0 2.238.857 2.238 2.699v3.699z" />
                        </li></svg>
                    </a>

                </ul>
            </div>


            <div class="menu-feild">
                <h3 class="footer-div1-heading2" style="color: #ffffff;">Menu</h3>
                <ul class="footer-ul">
                    <li class="footer-item"><a href="home.php" class="footer-link">Home</a></li>
                    <li class="footer-item"><a href="home.php" class="footer-link">Hostel</a></li>
                    <li class="footer-item"><a href="home.php" class="footer-link">AboutUs</a></li>

                </ul>
            </div>

            <h1 class="footerLogo">Best Hostel</h1>
        </div>
        <div class="footer-div2">
            <div class="contactBarContainer">
                <div class="contactBarCall1">
                    <iconify-icon icon="fluent:call-20-filled" class="callContact1" width="25" height="25" style="color: #ffffff;"></iconify-icon>
                    <p class="callContact1" style="color: #ffffff;">+94 75 707 0 707</p>
                </div>
                <div class="contactBarCall2">
                    <iconify-icon icon="fluent:call-20-filled" class="callContact2" width="25" height="25" style="color: #ffffff;"></iconify-icon>
                    <p class="callContact2" style="color: #ffffff;">+94 112 84 30 84</p>
                </div>
                <div class="contactBarEmail">
                    <iconify-icon icon="ic:round-email" class="emailContact" width="25" height="25" style="color: #ffffff;"></iconify-icon>
                    <p class="emailContact" style="color: #ffffff;">info@myhostel.lk</p>
                </div>
            </div>
            <h1 class="footer-div2-heading1" style="color: #ffffff;" >Subscribe Us</h1>



            <p class="footer-div2-paragraph" style="color: #ffffff;" >Browse through our carefully selected range of stylish apparel, where
                you'll find the latest trends, timeless classics, and everything in between.
                Our team of fashion experts has handpicked each item to ensure quality,
                comfort, and effortless style.</p>
            <div class="subscribe-input-container">
                <input class="sub-input" type="text" name="sub-email" placeholder="Enter valid email">
                <li class="sub-button-li"><a class="sub-button" href="#home">Submit</a></li>
            </div>


            <div class="copyright-feild">
                <p class="paragraph-copy" style="color: #ffffff;">Copyright © 2024, Best Hostel.</p>
            </div>
        </div>
    </footer>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>