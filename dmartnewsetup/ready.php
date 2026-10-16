<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>D-Mart Order Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    .primary-color { color: #046d38; }
    .primary-bg { background-color: #046d38; }
    .secondary-color { color: #ff6b00; }

    .progress-bar {
      height: 5px;
      background-color: #e0e0e0;
      border-radius: 5px;
      position: relative;
      overflow: hidden;
    }
    .progress-fill {
      height: 100%;
      background-color: #046d38;
      border-radius: 5px;
      width: 50%;
    }
    .progress-step {
      position: relative;
    }
    .progress-step::before {
      content: '';
      position: absolute;
      width: 22px;
      height: 22px;
      background-color: #ccc;
      border-radius: 50%;
      top: -8px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 2;
    }
    .progress-step.completed::before {
      background-color: #046d38;
    }
    .progress-step.completed::after {
      content: '✓';
      position: absolute;
      color: white;
      font-size: 12px;
      top: -8px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
    }

    .marquee {
      width: 100%;
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
    }
    .marquee-content {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 20s linear infinite;
    }
    @keyframes marquee {
      0% { transform: translate(0, 0); }
      100% { transform: translate(-100%, 0); }
    }

    .order-card {
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .btn-shop {
      transition: all 0.3s ease;
    }
    .btn-shop:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(4, 109, 56, 0.3);
    }
  </style>
</head>
<body>
  <!-- Loading Overlay -->
  <div id="loader" class="fixed inset-0 flex items-center justify-center bg-white z-50">
    <img src="https://cdn.pixabay.com/animation/2023/10/08/03/19/03-19-26-213_512.gif" 
         alt="Loading..." 
         class="w-20 h-20 object-contain">
  </div>

  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-sm">
      <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="w-48">
          <img src="https://www.digitalcompliance.in/images/DMart-logo.png" alt="D-Mart Logo" class="h-8">
        </div>
      </div>
    </header>

    <!-- Marquee Banner -->
    <div class="bg-yellow-100 py-2 marquee">
      <div class="marquee-content">
        <span class="text-red-600 font-semibold text-sm">🔥 GET UPTO 55% OFF ON ELECTRONIC GOODS AND HOME APPLIANCES - LIMITED TIME OFFER! 🔥</span>
      </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
      <div class="max-w-3xl mx-auto">
        <!-- Order Status Card -->
        <div class="bg-white order-card p-6 mb-8">
          <div class="flex items-center justify-between mb-4">
            <h1 class="text-lg font-bold primary-color">Order Status</h1>
            <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">Confirmed</div>
          </div>

          <!-- Progress Bar -->
          <div class="mb-8 relative">
            <div class="progress-bar">
              <div class="progress-fill"></div>
            </div>
            <div class="flex justify-between mt-6">
              <div class="progress-step completed">
                <div class="text-xs font-medium mt-7 text-center">Order Placed</div>
              </div>
              <div class="progress-step completed">
                <div class="text-xs font-medium mt-7 text-center">Processing</div>
              </div>
              <div class="progress-step">
                <div class="text-xs font-medium mt-7 text-center">Shipped</div>
              </div>
              <div class="progress-step">
                <div class="text-xs font-medium mt-7 text-center">Delivered</div>
              </div>
            </div>
          </div>

          <!-- Order Message -->
          <div class="text-center mb-6">
            <h2 class="text-base font-semibold mb-2">Dear Customer,</h2>
            <p class="text-gray-700 text-sm mb-2">Your order is now processed successfully and will be delivered to you by</p>
            <p class="text-lg font-bold primary-color mb-2" id="deliveryDate"></p>
            <p class="text-gray-600 text-sm">You are requested to kindly wait for the delivery.</p>
          </div>

          <!-- Divider -->
          <div class="border-t border-gray-200 my-4"></div>

          <!-- CTA -->
          <div class="text-center">
            <p class="text-gray-600 text-sm mb-3">Shop for more on D-Mart and save on huge deals and discounts!</p>
            <a href="#" class="inline-block primary-bg text-white text-sm font-semibold px-6 py-2 rounded-lg btn-shop">
              Continue Shopping
            </a>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
          <div>
            <h3 class="text-base font-semibold mb-3">About D-Mart</h3>
            <p class="text-gray-300">D-Mart is a one-stop supermarket chain that aims to offer customers good products at great value.</p>
          </div>
          <div>
            <h3 class="text-base font-semibold mb-3">Contact Us</h3>
            <p class="text-gray-300">Customer Care: 1800-233-1000</p>
            <p class="text-gray-300">Email: care@dmart.in</p>
          </div>
          <div>
            <h3 class="text-base font-semibold mb-3">Quick Links</h3>
            <ul class="text-gray-300">
              <li class="mb-2"><a href="#" class="hover:text-white">Store Locator</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white">Careers</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white">Terms & Conditions</a></li>
              <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="border-t border-gray-700 mt-6 pt-4 text-center text-gray-400 text-xs">
          <p>© 2023 Avenue Supermarts Ltd. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
  </div>

  <script>
    function calculateDeliveryDate() {
      const today = new Date();
      const deliveryDate = new Date(today);
      deliveryDate.setDate(today.getDate() + 5);
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('deliveryDate').innerHTML = 
        `${deliveryDate.toLocaleDateString('en-US', options)}, 9:00 PM`;
    }

    window.onload = function () {
      calculateDeliveryDate();
      document.getElementById('loader').style.display = 'none';
    };
  </script>
</body>
</html>
