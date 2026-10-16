<?php
// Assuming you have already started a session
session_start();

// Include the database configuration file
include 'db_config.php';

// Create a connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the product ID from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details from the database
$query = $conn->prepare("SELECT * FROM products WHERE id = ?");
$query->bind_param("i", $product_id);
$query->execute();
$result = $query->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found!";
    exit;
}

// Close the connection
$conn->close();
?>

<!doctype html>
<html lang="en" class="loading">
<head>
    <title><?php echo htmlspecialchars($product['name']); ?> - Dmart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="https://d-mart-summer-sale.xyz/assets/front/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../includes/bootstrap.min.css">
    <link rel="stylesheet" href="../includes/magnific-popup.css">
    <link rel="stylesheet" href="../includes/jquery-ui.css">
    <link rel="stylesheet" href="../includes/owl.carousel.min.css">
    <link rel="stylesheet" href="../includes/owl.theme.default.min.css">

    <!-- BEGIN: Toastr CSS-->
    <link rel="stylesheet" type="text/css" href="../includes/toastr.css">
    <link rel="stylesheet" type="text/css" href="../includes/toastr.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- END: Toastr CSS-->

    <link rel="stylesheet" href="../includes/aos.css">

    <link rel="stylesheet" href="../includes/style.css">
    <meta name="csrf-token" content="XMw4kJDTl1ltEwDHAbXygy9HGVsen40i26hxoL4F">
    <style type="text/css">

    /* Slideshow container */
    .slideshow-container {
      max-width: 100%;
      position: relative;
      margin: auto;
      max-height: 50%;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    @keyframes  fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    .header_space {
        width: 100%;
        height: 90px;
    }
    .site-blocks-table tbody tr:first-child td {
        border-top: none !important;
    }
    .head img {
        width: 100%;
        height: auto;
    }
    
    .carousel-control-next-icon, .carousel-control-prev-icon {
        width: 30px;
        height: 30px;
        filter: drop-shadow(2px 4px 6px black);
    }
    .carousel-indicators li {
        width: 30px;
        filter: drop-shadow(2px 4px 6px black);
    }
    </style>
        <style type="text/css">
        @media  only screen and (max-width: 600px) {

            .slideshow-container,
            .carousel {
                display: none;
            }

            .row.mb-5 {
                margin-bottom: -29px !important;
            }

            .site-section {
                padding: 5px;
            }

            h2.h5.text-black.mt-3.mb-3 {
                margin: 5px !important;
            }

            td {
                padding: 5px !important;
            }
        }

        .fixed {
            max-width: 35%;
            align-self: center;
        }

        .sticky-bottom-row {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            /* Ensure it's above other content */
            background-color: #fff;

        }
    </style>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1214020133368712');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1214020133368712&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>
<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <div class="">
                                <a href="#" class="js-logo-clone">
                                    <img src="../includes/logo.png" style="max-width: 43% !important;"
                                        alt="Image placeholder" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <li>
                                        <img src="../includes/shopping-cart (1).png" alt=""
                                            style="width: 25px;height:25px">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header_space"></div>
        <div id="carouselExampleIndicators" class="carousel slide px-2" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../includes/slider1.webp" alt="First slide"
                        style="width:100%; height: 50%">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../includes/slider2.webp" alt="Second slide"
                        style="width:100%; height: 50%">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../includes/slider3.webp" alt="Three slide"
                        style="width:100%; height: 50%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" id="cart" action="shopcart.php" method="POST">
                        <input type="hidden" name="_token" value="XMw4kJDTl1ltEwDHAbXygy9HGVsen40i26hxoL4F">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>" id="product_name">
                        <input type="hidden" name="quantity" value="1" id="quantity">
                        <input type="hidden" name="total" value="<?php echo $product['final_price']; ?>" id="total">
                        <div class="site-blocks-table mb-5 overflow-hidden" style="overflow: hidden">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Image placeholder"
                                class="img-fluid  my-2 w-100" style="height: 280px">
                            <h6 class="text-black mt-3 mb-2" style="font-size: 14px"><?php echo htmlspecialchars($product['name']); ?></h6>

                            <div class="d-flex align-items-center my-2">
                                <h4 class="text-success mb-2" style="font-weight: 600"><?php echo ($product['discount_percent']); ?>% Off</h4>
                                &nbsp;
                                &nbsp;
                                <h4 class="total-price-per-product text-secondary  mb-2" style="font-weight: 600">
                                    <del>₹<?php echo ($product['regular_price']); ?></del>
                                </h4>
                                &nbsp;
                                &nbsp;
                                <h4 class="total-price-per-product text-black  mb-2" style="font-weight: 600">
                                    ₹<?php echo ($product['final_price']); ?></h4>
                            </div>
                            <div class="border-top border-bottom text-center">
                                <p id="countdown" class="m-0 p-0 my-1 text-black" style="font-size: 18px">Offer ends in <span
                                        id="countdown-minutes" class="text-danger" style="font-weight: 600">15</span> min <span
                                        class="text-danger" id="countdown-seconds" style="font-weight: 600">59</span> sec</p>
                            </div>
                            <div hidden class="input-group mb-3" style="max-width: 120px; width: max-content;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" data-id="20"
                                        type="button">&minus;</button>
                                </div>
                                <input type="hidden" name="product" value="20">
                                <input type="text" class="form-control text-center" value="1" placeholder=""
                                    aria-label="Example text with button addon" name="quantity"
                                    aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" data-id="20"
                                        type="button">&plus;</button>
                                </div>
                            </div>
                            <div class="bg-white py-2 d-flex align-items-center ">
                                <button id="addToCartBtn"
                                    class="w-100 py-3  btn btn-light text-black  rounded  text-capitalize "
                                    style="font-size: 16px;margin-right:10px !important;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-weight:500;letter-spacing:0">Add
                                    To Cart</button>
                                <button id="checkoutBtn" class="w-100 py-3  btn btn-primary rounded text-capitalize  "
                                    style="font-size: 16px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-weight:500;letter-spacing:0">Buy
                                    Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.querySelector('#addToCartBtn').addEventListener('click', _ => {
                window.location.replace("/check-out");
            });
            document.querySelector('#checkoutBtn').addEventListener('click', _ => {
                window.location.replace("/check-out");
            });

            // Set the initial countdown time
            let minutes = 15;
            let seconds = 60;

            // Update the countdown every second
            let countdownInterval = setInterval(updateCountdown, 1000);

            function updateCountdown() {
                // Decrease the seconds
                seconds--;

                // If seconds reach 0, decrease the minutes and reset seconds to 59
                if (seconds < 0) {
                    seconds = 59;
                    minutes--;

                    // If minutes also reach 0, stop the countdown
                    if (minutes < 0) {
                        clearInterval(countdownInterval);
                        document.getElementById('countdown').innerText = "Offer has ended";
                        return;
                    }
                }

                // Update the countdown display
                document.getElementById('countdown-minutes').innerText = pad(minutes);
                document.getElementById('countdown-seconds').innerText = pad(seconds);
            }

            // Function to pad single digits with leading zeros
            function pad(number) {
                return (number < 10 ? '0' : '') + number;
            }
        </script>
        <!-- BEGIN: Footer-->
        <footer class="site-footer border-top" style="margin-bottom:80px">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <img src="../includes/footer-img.png" style="max-width:360px" alt="">
                    </div>
                </div>
            </div>
        </footer>
        <script src="../includes/jquery-3.3.1.min.js"></script>
        <script src="../includes/jquery-ui.js"></script>
        <script src="../includes/popper.min.js"></script>
        <script src="../includes/bootstrap.min.js"></script>
        <script src="../includes/owl.carousel.min.js"></script>
        <script src="../includes/jquery.magnific-popup.min.js"></script>
        <script src="../includes/aos.js"></script>
        <script src="../includes/main.js"></script>
    </div>
</body>

</html>