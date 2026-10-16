<?php
require 'check_session.php'; // Protect page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hellboard - Products</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg,#0f172a 0%,#1e293b 100%); font-family:'Inter',sans-serif; }
    ::-webkit-scrollbar{width:6px;}::-webkit-scrollbar-thumb{background:#475569;border-radius:3px;}
    .fade-in{animation:fadeIn .5s ease-in;}@keyframes fadeIn{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
    .slide-in{animation:slideIn .3s ease-out;}@keyframes slideIn{from{transform:translateX(-100%);}to{transform:translateX(0);}}
    .product-card{transition:all .3s ease;} .product-card:hover{transform:translateY(-5px);}
  </style>
</head>
<body class="min-h-screen">
  <!-- Mobile Menu Button -->
  <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-slate-800 text-white p-3 rounded-lg shadow-lg">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-slate-900/95 backdrop-blur-sm border-r border-slate-700 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40 slide-in">
    <div class="p-6 border-b border-slate-700">
      <h2 class="text-xl font-bold text-white">Hellboard</h2>
      <p class="text-slate-400 text-sm">Management System</p>
    </div>
    <nav class="mt-6">
      <a href="orders.php" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800 hover:text-white border-l-4 border-transparent hover:border-blue-500"><i class="fas fa-shopping-cart mr-3"></i>Orders</a>
      <a href="products.php" class="flex items-center px-6 py-3 text-white bg-slate-800 border-l-4 border-blue-500"><i class="fas fa-box mr-3"></i>Products</a>
      <a href="settings.php" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800 hover:text-white border-l-4 border-transparent hover:border-blue-500"><i class="fas fa-cog mr-3"></i>Settings</a>
      <a href="logout.php" class="flex items-center px-6 py-3 text-red-400 hover:bg-red-900/20 hover:text-red-300 border-l-4 border-transparent hover:border-red-500"><i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="lg:ml-64 min-h-screen">
    <header class="bg-slate-800/50 border-b border-slate-700 p-4 lg:p-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Products</h1>
        <div class="text-right">
          <p class="text-sm text-slate-400">Welcome</p>
          <p class="text-white font-medium"><?= htmlspecialchars($_SESSION['username']) ?></p>
        </div>
      </div>
    </header>

    <!-- Products Content -->
    <div class="p-4 lg:p-6 fade-in">
      <!-- Search -->
      <div class="mb-6 flex flex-col sm:flex-row gap-4">
        <div class="relative flex-1 max-w-md">
          <input type="text" id="searchProducts" placeholder="Search products..."
            class="w-full pl-10 pr-4 py-3 bg-slate-800/50 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500">
          <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
        </div>
      </div>

      <!-- Products Grid -->
      <div id="productsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"></div>
    </div>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 lg:hidden" onclick="closeMobileMenu()"></div>

  <script>
    let allProducts = [];

    document.getElementById('mobileMenuBtn').addEventListener('click', () => {
      document.getElementById('sidebar').classList.remove('-translate-x-full');
      document.getElementById('overlay').classList.remove('hidden');
    });
    function closeMobileMenu() {
      document.getElementById('sidebar').classList.add('-translate-x-full');
      document.getElementById('overlay').classList.add('hidden');
    }

    document.addEventListener('DOMContentLoaded', loadProducts);

    function loadProducts() {
      fetch('fetch_products.php')
        .then(res=>res.json())
        .then(data=>{ allProducts=data; displayProducts(allProducts); })
        .catch(err=>console.error("Error loading products:",err));
    }

    function displayProducts(products) {
      const grid=document.getElementById('productsGrid'); grid.innerHTML='';
      products.forEach(p=>{
        const card=document.createElement('div');
        card.className='product-card bg-slate-800/30 rounded-xl border border-slate-700 p-6 hover:bg-slate-800/50 transition-all duration-300';
        card.innerHTML=`
          <div class="flex items-center justify-center h-32 bg-slate-700/30 rounded-lg mb-4 relative">
            ${p.image_url ? `<img src="${p.image_url}" class="h-full object-contain">` : `<i class="fas fa-box text-4xl text-slate-500"></i>`}
            ${p.discount_percent>0 ? `<div class="absolute top-2 right-2"><span class="bg-green-600 text-white text-xs px-2 py-1 rounded">${p.discount_percent}% OFF</span></div>`:''}
          </div>
          <h3 class="text-lg font-semibold text-white mb-2">${p.name}</h3>
          <p class="text-slate-400 text-sm mb-3 line-clamp-2 h-10">${p.description}</p>
          <div class="flex items-center space-x-2 mb-3">
            <span class="text-lg font-bold text-green-400">₹${p.final_price}</span>
            ${p.regular_price>p.final_price?`<span class="text-sm text-slate-500 line-through">₹${p.regular_price}</span>`:''}
          </div>
          <div class="flex items-center space-x-1">
            <div class="flex text-yellow-400">
              ${Array(5).fill().map((_,i)=>`<i class="fas fa-star ${i<Math.round(p.rating)?'':'text-slate-600'}"></i>`).join('')}
            </div>
            <span class="text-slate-400 text-sm">(${p.ratings_count})</span>
          </div>`;
        grid.appendChild(card);
      });
    }

    document.getElementById('searchProducts').addEventListener('input', e=>{
      const term=e.target.value.toLowerCase();
      displayProducts(allProducts.filter(p=>
        p.name.toLowerCase().includes(term)||
        p.description.toLowerCase().includes(term)
      ));
    });
  </script>
  <script>
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("mobileMenuBtn");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");

  if (btn && sidebar && overlay) {
    btn.addEventListener("click", () => {
      sidebar.classList.remove("-translate-x-full");
      overlay.classList.remove("hidden");
    });

    overlay.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    });
  }
});
</script>

</body>
</html>
