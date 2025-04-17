<?php
include_once "header.php";
?>

<link rel="stylesheet" href="login.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="error-handling">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'none_reg') {
    ?>
            <script>
                Swal.fire({
                    title: "Registation Done!",
                    text: "Login using your credentials.",
                    icon: "success"
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'stmtfaild') {
        ?>
            <script>
                Swal.fire({
                    title: "Somthing went wrong!",
                    text: "Please contact the developers.",
                    icon: "error",
                });
            </script>

        <?php
        } else if ($_GET['error'] == 'invalidCredentials') {
            ?>
                <script>
                    Swal.fire({
                        title: "Sorry!",
                        text: "Username or password is incorrect.",
                        icon: "error",
                    });
                </script>
    
            <?php
            } 
    }
    ?>
</div>

<section class="vh-100 section1">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">

                    <div class="col-md-6 col-lg-7 d-flex align-items-center outterContainer">
                        <div class="card-body p-4 p-lg-5 text-black">

                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0" style="margin: auto;">Best Hostel Login</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                            <form action="includes/login.inc.php" method="POST">
                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="email" required />
                                            <label class="form-label" for="form2Example17">Email</label>
                                        </div>


                                    </div>
                                </div>
                                <div class="inputContainer">
                                    <div class="inputContainerSection">
                                        <div class="form-outline mb-4 signUpInput">
                                            <input type="password" id="form2Example17" class="form-control form-control-lg" name="password" required />
                                            <label class="form-label" for="form2Example17">Password</label>
                                        </div>


                                    </div>
                                </div>
                                

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit"  style="background-color: #155576; width: 100%;">Login</button>
                                </div>
                            </form>
                            <p class="pb-lg-2" style="color: #393f81; cursor: pointer;">Don't have an account? <a href="signupStudent.php" style="color: #393f81;">Sign up</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>


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