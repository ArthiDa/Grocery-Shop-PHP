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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="products.php">Products</a></li>
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
                  All Categories
                </div>
                <input type="text" placeholder="What do yo u need?" />
                <button type="submit" class="site-btn">SEARCH</button>
              </form>
            </div>
          </div>
          <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
            <div class="hero__text">
              <span>FRUIT FRESH</span>
              <h2>Vegetable <br />100% Organic</h2>
              <p>Free Pickup and Delivery Available</p>
              <a href="products.php" class="primary-btn">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Featured Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Featured Product</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <?php

              ?>
              <li class="active list" data-filter="*">All</li>
              <li class="list" data-filter="dairy">Dairy</li>
              <li class="list" data-filter="fresh-meat">Fresh Meats</li>
              <li class="list" data-filter="dry-goods">Dry Goods</li>
              <li class="list" data-filter="fruits">Fruits</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
        <!-- Get 6 Dairy Products From Database  -->
        <?php
        $sql = "SELECT * FROM product WHERE PRODUCTTYPE_ID = 4 LIMIT 6";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
          while ($row = mysqli_fetch_assoc($res)) {
            $productID = $row["PRODUCT_ID"];
            $productName = $row["PRODUCT_NAME"];
            $productPrice = $row["PRICE"];
            $productImg = $row["PRODUCT_IMG"];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 dairy item-box">

              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/product/<?php echo $productImg?>">
                  <ul class="featured__item__pic__hover">
                    <li>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </li>
                    <li>
                      <a href="single-product.php?product-id=<?php echo $productID;?>"><i class="fa fa-eye"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="featured__item__text">
                  <h6>
                    <a href="single-product.php?product-id=<?php echo $productID;?>"><?php echo $productName ?></a>
                  </h6>
                  <h5><?php echo $productPrice ?>৳</h5>
                </div>
              </div>

            </div>
        <?php
          }
        }
        ?>
        <!-- Get 6 Fresh Meats From Database  -->
        <?php
        $sql = "SELECT * FROM product WHERE PRODUCTTYPE_ID = 2 LIMIT 6";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
          while ($row = mysqli_fetch_assoc($res)) {
            $productID = $row["PRODUCT_ID"];
            $productName = $row["PRODUCT_NAME"];
            $productPrice = $row["PRICE"];
            $productImg = $row["PRODUCT_IMG"];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 fresh-meat item-box">

              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/product/<?php echo $productImg?>">
                  <ul class="featured__item__pic__hover">
                    <li>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </li>
                    <li>
                      <a href="single-product.php?product-id=<?php echo $productID;?>"><i class="fa fa-eye"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="featured__item__text">
                  <h6>
                    <a href="single-product.php?product-id=<?php echo $productID;?>"><?php echo $productName ?></a>
                  </h6>
                  <h5><?php echo $productPrice ?>৳</h5>
                </div>
              </div>

            </div>
        <?php
          }
        }
        ?>
        <!-- Get 6 Dry-Goods From Database -->
        <?php
        $sql = "SELECT * FROM product WHERE PRODUCTTYPE_ID = 8 LIMIT 6";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
          while ($row = mysqli_fetch_assoc($res)) {
            $productID = $row["PRODUCT_ID"];
            $productName = $row["PRODUCT_NAME"];
            $productPrice = $row["PRICE"];
            $productImg = $row["PRODUCT_IMG"];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 dry-goods item-box">

              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/product/<?php echo $productImg?>">
                  <ul class="featured__item__pic__hover">
                    <li>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </li>
                    <li>
                      <a href="single-product.php?product-id=<?php echo $productID;?>"><i class="fa fa-eye"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="featured__item__text">
                  <h6>
                    <a href="single-product.php?product-id=<?php echo $productID;?>"><?php echo $productName ?></a>
                  </h6>
                  <h5><?php echo $productPrice ?>৳</h5>
                </div>
              </div>

            </div>
        <?php
          }
        }
        ?>
        <!-- Get 6 Fruits From Database  -->
        <?php
        $sql = "SELECT * FROM product WHERE PRODUCTTYPE_ID = 6 LIMIT 6";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
          while ($row = mysqli_fetch_assoc($res)) {
            $productID = $row["PRODUCT_ID"];
            $productName = $row["PRODUCT_NAME"];
            $productPrice = $row["PRICE"];
            $productImg = $row["PRODUCT_IMG"];
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 fruits item-box">

              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/product/<?php echo $productImg?>">
                  <ul class="featured__item__pic__hover">
                    <li>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </li>
                    <li>
                      <a href="single-product.php?product-id=<?php echo $productID;?>"><i class="fa fa-eye"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-shopping-cart"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="featured__item__text">
                  <h6>
                    <a href="single-product.php?product-id=<?php echo $productID;?>"><?php echo $productName ?></a>
                  </h6>
                  <h5><?php echo $productPrice ?>৳</h5>
                </div>
              </div>

            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </section>
  <!-- Featured Section End -->

  <!-- Latest Product Section Begin -->
  <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
              <!-- Get 3 Latest Product  -->
              <?php
              $sql = "SELECT * FROM product ORDER BY PRODUCT_ID DESC LIMIT 3";
              $res = mysqli_query($conn, $sql);
              if (mysqli_num_rows($res)) {
                while ($row = mysqli_fetch_assoc($res)) {
                  $productName = $row["PRODUCT_NAME"];
                  $productPrice = $row["PRICE"];
                  $productImg = $row["PRODUCT_IMG"];
              ?>
                  <div class="latest-prdouct__slider__item">
                    <a href="#" class="latest-product__item">
                      <div class="latest-product__item__pic">
                        <img src="img/product/<?php echo $productImg?>" alt="" />
                      </div>
                      <div class="latest-product__item__text">
                        <h6><?php echo $productName ?></h6>
                        <span><?php echo $productPrice ?></span>
                      </div>
                    </a>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="latest-product__text">
            <h4>Top Rated Products</h4>
            <div class="latest-product__slider owl-carousel">
              <!-- Get 3 Rated Product  -->
              <?php
              $sql = "SELECT product.PRODUCT_NAME,product.PRICE,orders.ORDER_QUANTITY,product.PRODUCT_IMG
              FROM orders
              INNER JOIN product
              ON orders.PRODUCT_ID = product.PRODUCT_ID ORDER BY ORDER_QUANTITY DESC LIMIT 3";
              $res = mysqli_query($conn, $sql);
              if (mysqli_num_rows($res)) {
                while ($row = mysqli_fetch_assoc($res)) {
                  $productName = $row["PRODUCT_NAME"];
                  $productPrice = $row["PRICE"];
                  $productImg = $row["PRODUCT_IMG"];
              ?>
                  <div class="latest-prdouct__slider__item">
                    <a href="#" class="latest-product__item">
                      <div class="latest-product__item__pic">
                        <img src="img/product/<?php echo $productImg?>" alt="" />
                      </div>
                      <div class="latest-product__item__text">
                        <h6><?php echo $productName ?></h6>
                        <span><?php echo $productPrice ?></span>
                      </div>
                    </a>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Latest Product Section End -->

  <!-- Footer Section Begin -->
  <?php include('footer.php') ?>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
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