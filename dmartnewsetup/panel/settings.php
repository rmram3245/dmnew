<?php
require 'check_session.php'; // protect page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hellboard - Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg,#0f172a 0%,#1e293b 100%); font-family:'Inter',sans-serif; }
    ::-webkit-scrollbar{width:6px;}::-webkit-scrollbar-thumb{background:#475569;border-radius:3px;}
    .fade-in{animation:fadeIn .5s ease-in;}@keyframes fadeIn{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
    .slide-in{animation:slideIn .3s ease-out;}@keyframes slideIn{from{transform:translateX(-100%);}to{transform:translateX(0);}}
    .file-upload-area{border:2px dashed #475569;transition:.3s;} .file-upload-area:hover{border-color:#3b82f6;background:rgba(59,130,246,.05);}
    .file-upload-area.dragover{border-color:#3b82f6;background:rgba(59,130,246,.1);}
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
      <a href="products.php" class="flex items-center px-6 py-3 text-slate-300 hover:bg-slate-800 hover:text-white border-l-4 border-transparent hover:border-blue-500"><i class="fas fa-box mr-3"></i>Products</a>
      <a href="settings.php" class="flex items-center px-6 py-3 text-white bg-slate-800 border-l-4 border-blue-500"><i class="fas fa-cog mr-3"></i>Settings</a>
      <a href="logout.php" class="flex items-center px-6 py-3 text-red-400 hover:bg-red-900/20 hover:text-red-300 border-l-4 border-transparent hover:border-red-500"><i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="lg:ml-64 min-h-screen">
    <header class="bg-slate-800/50 border-b border-slate-700 p-4 lg:p-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white">Settings</h1>
        <div class="text-right">
          <p class="text-sm text-slate-400">Welcome</p>
          <p class="text-white font-medium"><?= htmlspecialchars($_SESSION['username']) ?></p>
        </div>
      </div>
    </header>

    <div class="p-4 lg:p-6 fade-in">
      <div class="max-w-2xl mx-auto space-y-6">

        <!-- App Card -->
        <div id="appCard" class="p-6 bg-slate-800/30 rounded-xl border border-slate-700">
          <h3 class="text-lg font-semibold text-white mb-4"><i class="fas fa-mobile-alt mr-2 text-green-400"></i>APK Management</h3>
          <div id="appDetails" class="text-slate-400">Checking...</div>
        </div>

        <!-- Upload Area -->
        <div id="uploadArea" class="file-upload-area rounded-lg p-8 text-center">
          <input type="file" id="appFile" accept=".apk" class="hidden" onchange="handleFileSelect(event)">
          <div class="space-y-4">
            <div class="text-slate-400">
              <i class="fas fa-cloud-upload-alt text-4xl mb-4"></i>
              <p class="text-lg">Drop your APK here or click to browse</p>
              <p class="text-sm">Supports .apk files (Max 100MB)</p>
            </div>
            <button onclick="document.getElementById('appFile').click()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
              <i class="fas fa-upload mr-2"></i>Upload App
            </button>
          </div>
        </div>

        <!-- Upload Progress -->
        <div id="uploadProgress" class="hidden mt-4">
          <div class="bg-slate-700 rounded-full h-2">
            <div id="progressBar" class="bg-green-600 h-2 rounded-full transition-all duration-300" style="width:0%"></div>
          </div>
          <p id="progressText" class="text-slate-400 text-sm mt-2">Uploading... 0%</p>
        </div>

      </div>
    </div>
  </div>

  <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 lg:hidden" onclick="closeMobileMenu()"></div>

  <script>
    document.getElementById('mobileMenuBtn').addEventListener('click',()=>{document.getElementById('sidebar').classList.remove('-translate-x-full');document.getElementById('overlay').classList.remove('hidden');});
    function closeMobileMenu(){document.getElementById('sidebar').classList.add('-translate-x-full');document.getElementById('overlay').classList.add('hidden');}

    document.addEventListener('DOMContentLoaded',()=>{ loadAppInfo(); setupDragAndDrop(); });

    function loadAppInfo(){
      fetch('get_app_info.php')
      .then(r=>r.json())
      .then(data=>{
        const details=document.getElementById('appDetails');
        if(data.exists){
          details.innerHTML=`
            <div class="flex items-center justify-between">
              <div>
                <p class="text-white font-medium">${data.name}</p>
                <p>Size: ${data.size}</p>
                <p>Uploaded: ${data.uploaded_date}</p>
              </div>
              <div class="flex space-x-3">
                <a href="../cart/dmart.apk" download class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"><i class="fas fa-download mr-1"></i>Download</a>
                <button onclick="deleteApp()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg"><i class="fas fa-trash mr-1"></i>Delete</button>
              </div>
            </div>`;
        } else {
          details.innerHTML=`<p class="text-red-400">No app found in <code>/cart/</code> folder.</p>`;
        }
      });
    }

    function handleFileSelect(e){ const file=e.target.files[0]; if(file) uploadFile(file); }

    function uploadFile(file){
      if(file.name.split('.').pop().toLowerCase()!=='apk'){alert("Only .apk allowed");return;}
      if(file.size>100*1024*1024){alert("Max 100MB");return;}
      document.getElementById('uploadProgress').classList.remove('hidden');

      const formData=new FormData(); formData.append('app_file',file);

      const xhr=new XMLHttpRequest();
      xhr.open("POST","upload_app.php",true);

      xhr.upload.onprogress=function(e){
        if(e.lengthComputable){
          let percent=(e.loaded/e.total)*100;
          document.getElementById('progressBar').style.width=percent+"%";
          document.getElementById('progressText').textContent=`Uploading... ${Math.round(percent)}%`;
        }
      };

      xhr.onload=function(){
        document.getElementById('uploadProgress').classList.add('hidden');
        if(xhr.status===200){
          const res=JSON.parse(xhr.responseText);
          if(res.success){alert("App uploaded!");loadAppInfo();}
          else alert("Upload failed: "+res.message);
        } else alert("Upload error");
      };

      xhr.send(formData);
    }

    function deleteApp(){
      if(confirm("Delete the app?")){
        fetch('delete_app.php',{method:'POST'})
        .then(r=>r.json()).then(data=>{
          if(data.success){alert("Deleted");loadAppInfo();}
          else alert("Error: "+data.message);
        });
      }
    }

    function setupDragAndDrop(){
      const uploadArea=document.getElementById('uploadArea');
      uploadArea.addEventListener('dragover',e=>{e.preventDefault();uploadArea.classList.add('dragover');});
      uploadArea.addEventListener('dragleave',e=>{e.preventDefault();uploadArea.classList.remove('dragover');});
      uploadArea.addEventListener('drop',e=>{e.preventDefault();uploadArea.classList.remove('dragover');if(e.dataTransfer.files.length>0) uploadFile(e.dataTransfer.files[0]);});
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
