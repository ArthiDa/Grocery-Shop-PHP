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
                            <li><a href="login.php">Login</a></li>
                            <li class="active"><a href="signup.php">Signup</a></li>
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
                    <h2 class="heading-section">Create Account</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="login-wrap p-4 p-md-5 mx-auto">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="" method="POST" class="signup-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="firstName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="lastName">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="address">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="mobileNumber">Mobile Number</label>
                                    <input type="number" name="mobileNumber" class="form-control" placeholder="Mobile Number" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="create" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                                </div>
                                <div class="form-group d-md-flex">
                                </div>
                            </form>
                            <p class="text-center">Already a member? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    <!-- Insert New Customer Details in Database  -->
    <?php
    if (isset($_POST['create'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $address = $_POST['address'];
        $mbl = $_POST['mobileNumber'];
        $date = date('Y-m-d');
        try {
            $sql = "INSERT INTO customer SET
        C_FIRSTNAME = '$firstName',
        C_LASTNAME = '$lastName',
        C_ADDRESS = '$address',
        C_MOBILE = '$mbl',
        C_EMAIL = '$email',
        C_PASS = '$password',
        JOIN_DATE = '$date'";
            $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $_SESSION['create'] =  "<div class='success text-center'>Account Created Successfully...</div>";
    ?>
                <script>
                    window.location.href = "<?php echo SITEURL; ?>login.php";
                </script>
            <?php
            }
        } catch (mysqli_sql_exception $e) {
            $_SESSION['failed'] = "Email ID Already Exist...";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL; ?>signup.php";
            </script>
    <?php
        }
    }
    ?>
    <!-- End  -->


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