<?php include('connection/connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

    <!-- Login  -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login-source/css/style.css">
    <!-- End  -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="#">Contact</a></li>
                            <li class="active"><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
                            </li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Login Section Begin -->
    <section class="pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-4 p-md-5 mx-auto">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <!-- Check newly created account  -->
                            <?php
                            if (isset($_SESSION['create'])) {
                                echo $_SESSION['create'];
                                unset($_SESSION['create']);
                            }
                            ?>

                            <form action="" method="POST" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" name="Email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="Password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>

                                <!-- Wrong Email or Password Message  -->
                                <?php
                                if (isset($_SESSION['try'])) {
                                    echo $_SESSION['try'];
                                    unset($_SESSION['try']);
                                }
                                ?>

                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    <!-- Match login details to the database  -->

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['Email'];
        $password = md5($_POST['Password']);
        $sql = "SELECT * FROM customer WHERE C_EMAIL='$email' AND C_PASS ='$password'";
        //3. Execute the Query
        $res = mysqli_query($conn, $sql);
        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['C_FIRSTNAME'];
            $cid = $row['C_ID'];
            $_SESSION['login'] = $name;
            $_SESSION['customer_id'] = $cid;
    ?>
            <script>
                window.location.href = "<?php echo SITEURL; ?>";
            </script>
        <?php
        } else {

            //User not Available and Login FAil
            $_SESSION['try'] = "<div class='error text-center'>Email and Password did not match.</div>";
        ?>
            <script>
                window.location.href = "<?php echo SITEURL; ?>login.php";
            </script>
    <?php
        }
    }
    ?>

    <!-- Footer Section Begin -->
    <?php include('footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <!-- For login  -->
    <script src="login-source/js/jquery.min.js"></script>
    <script src="login-source/js/popper.js"></script>
    <script src="login-source/js/bootstrap.min.js"></script>
    <script src="login-source/js/main.js"></script>
    <!-- End  -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/custom/left-product-type.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/custom/filter.js"></script>
</body>

</html>