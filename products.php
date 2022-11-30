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

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css -->
    <style>
        .product-title {
            color: black;
        }

        .product-title:hover {
            color: blue;
        }

        .cart-button {
            background-color: #fff;
            border: 1px solid #ebebeb;
            padding: 6px;
            text-align: center;
            transition: all ease-in-out .5s;
        }
        .cart-button:hover{
            transform: scale(1.6,1.5);
            color: white;
            background-color: mediumorchid;
        }
    </style>
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
                            <li class="active"><a href="products.php">Products</a></li>
                            <li><a href="#">Contact</a></li>
                            <?php
                            if (isset($_SESSION['login'])) {
                            ?>
                                <li><a href="#"><?php echo $_SESSION['login']; ?></a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="signup.php">Signup</a></li>
                            <?php
                            }
                            ?>
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul id="hero-product-type">
                            <!-- Get All Product Type From Database -->
                            <?php
                            $sql = "SELECT * FROM producttype";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $productTypeId = $row["PRODUCTTYPE_ID"];
                                    $productTypeTitle = $row["TITLE"];
                            ?>
                                    <li><a href="products.php?product_type=<?php echo $productTypeId; ?>"><?php echo $productTypeTitle ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    <?php
                                    $catagory = "All Categories";
                                    if (isset($_GET["product_type"])) {
                                        $id = $_GET["product_type"];
                                        $sql = "SELECT * FROM producttype WHERE PRODUCTTYPE_ID = $id";
                                        $res = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($res);
                                        $catagory = $row["TITLE"];
                                    }
                                    echo $catagory;
                                    ?>
                                </div>
                                <input type="text" placeholder="What do yo u need?" />
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                    <!-- Show Products  -->
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php
                        if (isset($_GET["product_type"])) {
                            $id = $_GET["product_type"];
                            $sql = "SELECT product.PRODUCT_ID, product.PRODUCT_NAME,stock.TOTAL_PRODUCTS,product.PRODUCT_BRAND,product.PRODUCT_IMG,product.PRICE
                            FROM product
                            INNER JOIN stock
                            ON stock.STOCK_ID = product.STOCK_ID WHERE PRODUCTTYPE_ID = $id";
                        } else {
                            $sql = "SELECT product.PRODUCT_ID, product.PRODUCT_NAME,stock.TOTAL_PRODUCTS,product.PRODUCT_BRAND,product.PRODUCT_IMG,product.PRICE
                            FROM product
                            INNER JOIN stock
                            ON stock.STOCK_ID = product.STOCK_ID";
                        }
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $productID = $row["PRODUCT_ID"];
                            $productName = $row["PRODUCT_NAME"];
                            $productPrice = $row["PRICE"];
                            $productBrand = $row["PRODUCT_BRAND"];
                            $productImg = $row["PRODUCT_IMG"];
                            $totalStock = $row["TOTAL_PRODUCTS"];
                        ?>
                            <div class="col pb-2">
                                <div class="card h-100 ">
                                    <a href="single-product.php?product-id=<?php echo $productID;?>"><img src="img/product/<?php echo $productImg; ?>" class="card-img-top" alt="..."></a>

                                    <div class="card-body">
                                        <h3><a class="product-title" href="single-product.php?product-id=<?php echo $productID;?>"><?php echo $productName; ?></a></h3>
                                        <div>
                                            <p>Brand: <?php echo $productBrand; ?><br>
                                                Price: <?php echo $productPrice; ?>৳<br>
                                                <?php if ($totalStock) {
                                                    echo "IN-STOCK (" . $totalStock . ")";
                                                } else {
                                                    echo "OUT-STOCK";
                                                } ?>
                                            </p>
                                            <div class="d-flex justify-content-center">
                                                <button class="cart-button">Add To Cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- End  -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    <?php include('footer.php') ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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