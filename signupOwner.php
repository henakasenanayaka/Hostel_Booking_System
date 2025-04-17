<?php
include_once "header.php";
?>

<link rel="stylesheet" href="signup.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="error-handling">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'invalidusername') {
    ?>
            <script>
                Swal.fire({
                    title: "Invalid username",
                    text: "Make sure that user name is valid",
                    icon: "warning"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'userExcists') {
        ?>
            <script>
                Swal.fire({
                    title: "User Excists",
                    text: "Please sign up with different email addresses",
                    icon: "warning",
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
                                <span class="h1 fw-bold mb-0">MyHostel ( Hostel Owner )</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign-up as a Owner</h5>
                            <form action="includes/signupOwner.inc.php" method="POST">
                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="fname" required />
                                            <label class="form-label" for="form2Example17">First name</label>
                                        </div>
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" name="lname" required />
                                            <label class="form-label" for="form2Example27">Last name</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" name="username" />
                                            <label class="form-label" for="form2Example27">User Name</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="address" />
                                            <label class="form-label" for="form2Example17">Address</label>
                                        </div>
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example27" class="form-control form-control-lg" name="contactNumber" />
                                            <label class="form-label" for="form2Example27">Contact Number</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="password" id="form2Example17" class="form-control form-control-lg" name="password" />
                                            <label class="form-label" for="form2Example17">Password</label>
                                        </div>
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="confirmPassword" />
                                            <label class="form-label" for="form2Example27">Confirm Password</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="text" id="form2Example17" class="form-control form-control-lg" name="description" />
                                            <label class="form-label" for="form2Example17">Discription</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit" style="background-color: #155576; width: 100%;">Register</button>
                                </div>
                            </form>
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;">Login</a></p>
                            <div class="termsSection" style="margin-top: -40px;">
                                <a href="#!" class="small text-muted">Terms of use.</a>
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
include_once "footer.php";
?>