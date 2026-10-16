<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en" class="loading">
<head>
    <title>Dmart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="includes/assets/front/fonts/icomoon/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="includes/bootstrap.min.css">
    <link rel="stylesheet" href="includes/magnific-popup.css">
    <link rel="stylesheet" href="includes/jquery-ui.css">
    <link rel="stylesheet" href="includes/owl.carousel.min.css">
    <link rel="stylesheet" href="includes/owl.theme.default.min.css">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="includes/aos.css">
    <link rel="stylesheet" href="includes/style.css">

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
        .product {
            width: 77%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: auto;
        }
        .custom2 {
            margin-top: 2rem;
        }
        .card {
            text-align: center;
        }
        .card-text {
            font-weight: 600;
            font-size: 1.2rem;
        }
        .justify-content-center {
            display: flex;
        }
        .btn {
            background-color: rgb(242 100 34);
            border: none;
            padding: 15px;
            width: 100%;
        }
        .fixed {
            max-width: 40%;
            align-self: center;
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
                                <img src="includes/logo.png" style="max-width: 43% !important;"
                                    alt="Image placeholder" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <li>
                                    <img src="includes/shopping-cart (1).png" alt=""
                                        style="width: 25px;height:25px">
                                </li>
                                <li>
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
                <img class="d-block w-100" src="includes/slider1.webp" alt="First slide"
                    style="width:100%; height: 50%">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="includes/slider2.webp" alt="Second slide"
                    style="width:100%; height: 50%">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="includes/slider3.webp" alt="Three slide"
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

        <div class="site-section block-8">
            <div class="container">
                <div id="product-container" class="row">
                    <!-- Products will be loaded here -->
                </div>
            </div>
        </div>
        
        <footer class="site-footer border-top" style="margin-bottom:80px">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <img src="includes/footer-img.png" style="max-width:360px" alt="">
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="includes/jquery-3.3.1.min.js"></script>
    <script src="includes/jquery-ui.js"></script>
    <script src="includes/popper.min.js"></script>
    <script src="includes/bootstrap.min.js"></script>
    <script src="includes/owl.carousel.min.js"></script>
    <script src="includes/jquery.magnific-popup.min.js"></script>
    <script src="includes/aos.js"></script>
    <script src="includes/main.js"></script>
    <script src="includes/toastr.min.js"></script>
    <script src="includes/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(document).ready(function() {
    $.ajax({
        url: 'functions/fetch_products.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let productsHTML = '';
            response.forEach(function(product) {
                productsHTML += `
                    <div class="col-6 border p-2 p-sm-4">
                        <div class="text-center">
                            <img src="${product.image_url}" alt="Product Image" style="width: 130px; height: 120px;" class="img-fluid rounded">
                        </div>
                        <div class="card-body p-0 m-0 mt-2">
                            <p class="m-0 text-truncate text-start text-black" style="color: #113a57 !important; font-size: 14px; font-weight: 500;">
                                ${product.description}
                            </p>
                            <div class="d-flex justify-content-start mt-1 mt-sm-3">
                                <h6 class="fw-normal me-2" style="color: #286625 !important;">
                                    ${product.discount_percent}% Off
                                </h6>
                                <small class="fs-6 ms-2"><del>₹${product.regular_price}</del></small>
                            </div>
                            <div class="d-flex justify-content-start align-items-center mb-1" style="height: 20px;">
                                <h6 class="text-dark mb-0 pb-0 me-2" style="font-weight: 600;">
                                    ₹${product.final_price}
                                </h6>
                                <span class="rounded px-2 me-2" style="background: #286625; color: white; font-size: 12px; width: 55px;">
                                    ${product.rating} ★
                                </span>
                                <p class="mb-0 pb-0 text-truncate">${product.ratings_count} Ratings</p>
                            </div>
                            <div class="text-center">
                                <span style="font-size: 14px;" class="text-black">Limited time deal</span>
                                <div class="d-flex justify-content-center align-items-center my-1 my-sm-2">
                                <a href="cart/product.php?id=${product.id}" class="btn p-2 font-weight-bold w-100 w-sm-50 text-white" style="font-size: smaller; justify-content: center; align-items: center; display: flex; background-color: #286625;">
                                    BUY NOW
                                </a>

                                </div>
                                <span style="font-size: 14px;" class="text-black">Free Delivery in Two Days</span>
                            </div>
                        </div>
                    </div>`;
            });
            $('#product-container').html(productsHTML);
        }
    });
});
</script>


</body>
</html>