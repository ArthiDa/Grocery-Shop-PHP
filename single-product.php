<?php include('connection/connect.php') ?>
<?php
if (isset($_GET["product-id"])) {
  $id = $_GET["product-id"];
} else {
  header("Location: http://localhost/grocery-shop/");
}
?>
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

  <style>
    .product-detail {
      margin: 50px;
      padding: 30px;
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
  <!-- Show details of the product  -->
  <?php
  $sql = "SELECT product.PRODUCT_ID, product.PRODUCT_NAME,stock.TOTAL_PRODUCTS,product.PRODUCT_BRAND,product.PRODUCT_IMG,product.PRICE,producttype.TITLE
  FROM product
  INNER JOIN stock
  ON stock.STOCK_ID = product.STOCK_ID
  INNER JOIN producttype
  on producttype.PRODUCTTYPE_ID = product.PRODUCTTYPE_ID WHERE product.PRODUCT_ID = $id";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($res);
  $productName = $row["PRODUCT_NAME"];
  $productBrand = $row["PRODUCT_BRAND"];
  $productPrice = $row["PRICE"];
  $productImg = $row["PRODUCT_IMG"];
  $productType = $row["TITLE"];
  ?>
  <section class="container">
    <div class="row">
      <div class="col">
        <img src="img/product/<?php echo $productImg ?>" alt="">
      </div>
      <div class="col">
        <div class="product-detail">
          <h2><?php echo $productName . ' ' . $productBrand ?></h2>
          <h3 class="mt-3">Price: <?php echo $productPrice ?>৳</h3>
          <h3 class="mt-3">Product Type: <?php echo $productType ?></h3>
          <form action="" method="POST">
            <div class="form-group mb-3">
              <p>Quantity:</p>
              <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="form-group mb-3">
              <p>Payment Method</p>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="cash" name="payment" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Cash On Delivery
                </label> <br>
                <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Online Pay
                </label>
              </div>
            </div>
            <div class="form-group mb-3">
              <button type="submit" name="pay" class="form-control btn btn-primary rounded submit px-3">Buy Now</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer Section Begin -->
  <?php include('footer.php') ?>
  <!-- Footer Section End -->
  <!-- $_SESSION['login'] = $name;
  $_SESSION['customer_id'] = $cid; -->
  <!-- Insert Order Details  -->
  <?php
  if (isset($_SESSION['login'])) {
    if (isset($_POST['pay']) && $_POST['quantity'] > 0) {
      $quantity = $_POST['quantity'];
      // Check Stock of The Product 
      $sql = "SELECT product.PRODUCT_NAME,stock.TOTAL_PRODUCTS,stock.STOCK_ID
      FROM product
      INNER JOIN stock
      ON stock.STOCK_ID = product.PRODUCT_ID WHERE PRODUCT_ID = $id";
      $res = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($res);
      if ($row) {
        $has = $row['TOTAL_PRODUCTS'];
        if ($has - $quantity < 0) {
        ?>
          <script>
            alert("Quantity Overloaded!!!");
            window.location.href = "<?php echo SITEURL; ?>";
          </script>
          <?php
        } else {
          $has = $has - $quantity;
          $stockId = $row['STOCK_ID'];
          $sql = "UPDATE stock SET
          TOTAL_PRODUCTS = '$has' WHERE STOCK_ID = '$stockId'";
          $res = mysqli_query($conn, $sql);
        }
      }
      // End 
      $productId = $id;
      $customerId = $_SESSION['customer_id'];
      $totalPrice = $productPrice * $quantity;
      $date = date('Y-m-d');
      try {
        $sql = "INSERT INTO orders SET
          C_ID = '$customerId',
          PRODUCT_ID = '$productId',
          ORDER_QUANTITY = '$quantity',
          TOTAL_PRICE = '$totalPrice',
          ORDER_DATE = '$date'
          ";
        $res = mysqli_query($conn, $sql);
        if ($res) {
          $last_id = $conn->insert_id;
          $payment = $_POST['payment'];
          if ($payment == "cash") $payment = "Pending";
          else $payment = "Paid";
          $sql = "INSERT INTO payment SET
          ORDER_ID = '$last_id',
          STATUS = '$payment'
          ";
          $res = mysqli_query($conn, $sql);
          if ($res) {
          ?>
            <script>
              alert("Thank you for buying.Stay with us :)");
            </script>
        <?php
          }
        }
      } catch (mysqli_sql_exception $e) {
        ?>
        <script>
          alert("Something Wrong!!!");
        </script>
    <?php
      }
    }
  } else {
    ?>
    <script>
      alert("Please Login!!!");
    </script>
  <?php
  }
  ?>

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