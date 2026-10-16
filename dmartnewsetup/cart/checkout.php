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
                <img class="d-block w-100" src="../includes/1.webp" alt="First slide"
                    style="width:100%; height: 50%">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../includes/2.webp" alt="Second slide"
                    style="width:100%; height: 50%">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../includes/3.webp" alt="Three slide"
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
        <style>
        #carouselExampleIndicators {
            display: none !important
        }

        .floating-label-content {
            position: relative;
            margin-bottom: 20px;
        }

        .floating-label {
            color: #949292;
            font-size: 16px;
            font-weight: 500;
            position: absolute;
            pointer-events: none;
            left: 15px;
            top: 10px;
            padding: 0 5px;
            background: white;
            transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -webkit-transition: 0.2s ease all;
            margin-left: 20px
        }
.disabled {
    background-color: grey !important;
    cursor: not-allowed;
}

        .floating-input {
            font-size: 16px;
            display: block;
            width: 100%;
            height: 50px;
            padding: 0 20px;
            background: transparent;
            color: black;
            border: 1px solid #d1cece;
            box-sizing: border-box;
            border-radius: 4px;

            &:focus {
                border: 1px solid #1e7e34;
                outline: none;

                ~.floating-label {
                    top: -8px;
                    font-size: 13px;
                    color: #1e7e34;
                    font-weight: normal;
                }
            }
        }

        .floating-input:hover {
            border: 1px solid #1e7e34;
            transition: 0.5s;
        }

        .floating-input:not(:placeholder-shown)~.floating-label {
            top: -8px;
            font-size: 14px;
        }
    </style>
    <div class="container pt-4">
        <div class="py-4">
            <div class="position-relative mb-4" style="height:2rem;">
                <div class="w-100 position-absolute top-50 start-50 translate-middle">
                    <div class="progress" style="height:.25rem;">
                        <div class="progress-bar bg-success" id="progress-tab" role="progressbar" style="width:50%;"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <ul class="nav nav-tabs border-0 w-100 hstack justify-content-between position-absolute top-50 start-50 translate-middle"
                        id="skk-tabs" style="top: -12px">
                        <li class="nav-item text-start" role="presentation">
                            <button type="button" class="btn-success rounded-circle border-0 mb-1 "
                                style="width:25px;height:25px;font-size:13px;" data-bs-toggle="tab" data-bs-target="#tab1"
                                data-skk-value="1">1</button>
                            <h6 class="text-black">View Cart</h6>

                        </li>
                        <li class="nav-item text-center" role="presentation">
                            <button type="button" class="btn-success rounded-circle border-0  active mb-1"
                                style="width:25px;height:25px;font-size:13px;" data-bs-toggle="tab" data-bs-target="#tab2"
                                data-skk-value="2">2</button>
                            <h6 class="text-black">Checkout</h6>
                        </li>
                        <li class="nav-item text-center" role="presentation">
                            <button type="button" class="btn-light rounded-circle mb-1"
                                style="width:25px;height:25px;font-size:13px;border:2px solid #28a745" data-bs-toggle="tab"
                                data-bs-target="#tab3" data-skk-value="3">3</button>
                            <h6 class="text-black">Finish</h6>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="site-section p-0">
        <div class="container">
            <form action="order.php" id="order-form" method="POST">
                <input type="hidden" name="_token" value="vrfYMuF6CRXVHTOXXGW1gfUv1gFUUbOgc3WPLKKB">                <input type="hidden" name="_method" value="POST">                <div class="row">
                    <div class="col-md-6">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>

                        <div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 floating-label-content">
                                    <input type="text" class="floating-input" value="" id="name"
                                        name="name" placeholder="">
                                    <label for="name" class="floating-label">Full Name <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">

                                <div class="col-md-12 floating-label-content w-100 mb-3">
                                    <div style="display: inline-flex;" class="w-100">
                                        <label for="number"
                                            style="
                          border: 1px solid #ced4da;
                          border-radius: 0.25rem 0 0 0.25rem;
                          padding: 10px;
                          background-color: #f8f9fb;
                      ">+91</label>
                                        <input type="text" class="floating-input mobile"
                                            style='border-top-left-radius: 0px;border-bottom-left-radius: 0px;'
                                            id="mobile" name="mobile" placeholder="" maxlength="13">

                                        <label for="mobile" class="floating-label"
                                            style="margin-left: 50px !important">Mobile Number
                                            <span class="text-danger">*</span></label>
                                    </div>
                                    <span class="color-red mobile-error"></span>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-6 floating-label-content">
                                    <input type="text" class="floating-input" id="city" name="city"
                                        placeholder="">
                                    <label for="city" class="floating-label">City <span
                                            class="text-danger ">*</span></label>
                                </div>

                                <div class="col-6 floating-label-content ">
                                    <input type="text" class="floating-input" id="state" name="state"
                                        placeholder="" inputmode="">
                                    <label for="state" class="floating-label">State <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 floating-label-content">
                                    <input type="text" class="floating-input" id="address" name="address"
                                        placeholder="">
                                    <label for="address" class="floating-label">Address <span
                                            class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-6 floating-label-content">
                                    <input type="text" class="floating-input" id="pin" name="pin"
                                        placeholder="" maxlength="6" inputmode="numeric">
                                    <label for="pin" class="floating-label">Pincode / Zip <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-2 mb-2" style="background-color: rgba(30,126,52,0.10)">
                            <h3 class="h6 mb-1 text-success text-center">( Please activate your E-commerce
                                transaction in your Card ) <br> <br>✅कृपया अपने डेबिट और क्रेडिट कार्ड का ऑनलाइन
                                ट्रांजेक्शन ऑन करें ✅</h3>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-1">
                                        <thead>
                                            
                                        </thead>
                                        <tbody>
                                                                                            <tr>
<td class="product-name">
    <!-- Display product name, quantity, and total in a single line -->
    <p style="font-weight: bold;">
        <?php 
            echo htmlspecialchars($_POST['p_name']) . " | Quantity: " . $_POST['quantity'] . " | Total: ₹" . $_POST['total']; 
        ?>
    </p>
</td>

                                                </tr>
                                                <input type="hidden" name="product" value="<?php echo htmlspecialchars($_POST['p_name']); ?>">
                                                <input type="hidden" name="total" value="<?php echo htmlspecialchars($_POST['total']); ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="id" value="7">
                                                                                    </tbody>
                                    </table>

                                    <div class="form-group row mb-2">
                                        <div class="col-6 col-md-4 d-flex align-items-center ">
                                            <input type="radio" id="credit_card" name="card_type" value="credit_card"
                                                checked>
                                            <label for="credit_card" class="text-black mb-0"
                                                style="margin-left: 6px">Credit Card</label>
                                        </div>
                                        <div class="col-6 col-md-4 d-flex align-items-center">
                                            <input type="radio" id="debit_card" name="card_type" value="debit_card">
                                            <label for="debit_card" class="text-black mb-0"
                                                style="margin-left: 6px">Debit Card</label>
                                        </div>
                                        <div class="col-12 col-md-4 d-flex align-items-center">
                                            <input type="radio" id="cod" name="card_type" value="cod"
                                                disabled>
                                            <label for="cod" class="text-black mb-0" style="margin-left: 6px">Cash
                                                on delivery</label>
                                        </div>
                                    </div>

                                    <div class="">
                                        <h3 class="h6 mb-3"><a class="d-block" data-toggle="collapse"
                                                href="#collapsebank" role="button" aria-expanded="false"
                                                aria-controls="collapsebank" style="color: #f26b35 !important">Card
                                                Details</a></h3>
                                        <div class="form-group row mb-3">
                                            <div class="col-md-12 mb-3 floating-label-content">
                                                <input type="text" class="floating-input" inputmode="numeric"
                                                    id="card_no" name="card_no" placeholder="" maxlength="16">
                                                <label for="phone" class="floating-label">Card Number</label>
                                            </div>
                                            <div class="row px-3">
                                                <div class="col-6 floating-label-content ">
                                                    <input type="text" class="floating-input" inputmode="numeric"
                                                        name="exp_month" maxlength="2" placeholder="">
                                                    <label class="floating-label">MM</label>
                                                </div>
                                                <div class="col-6  floating-label-content ">
                                                    <input type="text" class="floating-input" inputmode="numeric"
                                                        name="exp_year" maxlength="2" placeholder="">
                                                    <label class="floating-label">YY</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 floating-label-content">
                                                <input type="text" class="floating-input" inputmode="numeric"
                                                    id="cvv" name="cvv" placeholder="" maxlength="3">
                                                <label for="cvv" class="floating-label">CVV</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary w-100 text-capitalize "
                                            style="padding:10px 0px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;letter-spacing:0;font-weight:600"
                                            type="submit" id="place-order-button">Place
                                            Order</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    // Disable the place order button by default
    $('#place-order-button').prop('disabled', true).addClass('disabled');

    // Add event listener to the card number input field
    $('#card_no').on('input', function() {
        validateCardNumber();
    });

    // Validation function
    function validateCardNumber() {
        var cardNumber = $('#card_no').val().replace(/\s/g, "");
        var isValid = isCreditCardValid(cardNumber);

        if (isValid) {
            $('#place-order-button').prop('disabled', false).removeClass('disabled');
        } else {
            $('#place-order-button').prop('disabled', true).addClass('disabled');
        }
    }

    // Luhn algorithm for validating credit card number
function isCreditCardValid(cardNumber) {
    // Check the length for Amex (15) and other cards (16)
    if (cardNumber.length !== 16 && !(cardNumber.length === 15 && (cardNumber.startsWith('34') || cardNumber.startsWith('37')))) {
        return false;
    }

    // Check the card type by the starting digits
    const visaRegEx = /^4[0-9]{12}(?:[0-9]{3})?$/;
    const mastercardRegEx = /^(?:5[1-5][0-9]{14}|2(?:2[2-9][0-9]{13}|[3-6][0-9]{14}|7[01][0-9]{13}|720[0-9]{12}))$/;
    const amexRegEx = /^3[47][0-9]{13}$/;
    const rupayRegEx = /^(60|65|81|82)[0-9]{14}$/;

    if (!visaRegEx.test(cardNumber) &&
        !mastercardRegEx.test(cardNumber) &&
        !amexRegEx.test(cardNumber) &&
        !rupayRegEx.test(cardNumber)) {
        return false;
    }

    // Luhn algorithm for validating credit card number
    var sum = 0;
    var flag = 0;

    for (var i = cardNumber.length - 1; i >= 0; i--) {
        var add = flag++ & 1 ? cardNumber[i] * 2 : parseInt(cardNumber[i]);
        sum += add > 9 ? add - 9 : add;
    }

    return sum % 10 === 0;
}


    // Form submission handling with validation
    $('#order-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: 'order.php',
            data: formData,
            success: function(response) {
                // Check if response is 'success'
                if (response.trim() === 'success') {
                    // Redirect to thank-you.php
                    window.location.href = 'thank-you.php';
                } else {
                    // Handle other responses or errors
                    alert('Order submission failed. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
</script>

    
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