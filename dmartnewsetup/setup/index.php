<?php
session_start();
$step = $_POST['step'] ?? 1;

// Handle AJAX actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($step == 'check_connection') {
        $host = $_POST['db_host'];
        $user = $_POST['db_user'];
        $pass = $_POST['db_pass'];
        $name = $_POST['db_name'];

        $conn = @new mysqli($host, $user, $pass, $name);
        if ($conn->connect_error) {
            echo json_encode(['success' => false, 'msg' => 'Connection failed: ' . $conn->connect_error]);
        } else {
            $_SESSION['db'] = compact('host', 'user', 'pass', 'name');

            // --- Update ../cart/db_config.php ---
            $cartConfig = "<?php
// db_config.php

// Database connection parameters
\$servername = \"$host\";
\$username = \"$user\";
\$password = \"$pass\";
\$dbname = \"$name\";

try {
    // Establishing connection to the database
    \$conn = new PDO(\"mysql:host=\$servername;dbname=\$dbname\", \$username, \$password);
    \$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException \$e) {
    die(\"Connection failed: \" . \$e->getMessage());
}
?>";
            file_put_contents(__DIR__ . "/../cart/db_config.php", $cartConfig);

            // --- Update ../panel/db.php ---
            $panelConfig = "<?php
// db.php
\$host = \"$host\";
\$user = \"$user\";
\$pass = \"$pass\";
\$dbname = \"$name\"; // change to your DB name

\$conn = new mysqli(\$host, \$user, \$pass, \$dbname);

if (\$conn->connect_error) {
    die(\"DB Connection failed: \" . \$conn->connect_error);
}
?>";
            file_put_contents(__DIR__ . "/../panel/db.php", $panelConfig);

            echo json_encode(['success' => true, 'msg' => '✅ Connection successful & config files updated']);
        }
        exit;
    }

    if ($step == 'import_sql') {
        $file = $_POST['file'] ?? '';
        if (!isset($_SESSION['db'])) exit(json_encode(['success' => false, 'msg' => 'DB not set']));

        $db = $_SESSION['db'];
        $conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
        if ($conn->connect_error) exit(json_encode(['success' => false, 'msg' => $conn->connect_error]));

        $sql = file_get_contents(__DIR__ . "/$file");
        if (!$sql) exit(json_encode(['success' => false, 'msg' => 'SQL file not found']));

        if ($conn->multi_query($sql)) {
            while ($conn->more_results() && $conn->next_result()) {;}
            echo json_encode(['success' => true, 'msg' => "✅ Imported $file"]);
        } else {
            echo json_encode(['success' => false, 'msg' => $conn->error]);
        }
        $conn->close();
        exit;
    }

    if ($step == 'save_admin') {
        $user = $_POST['admin_user'];
        $pass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT);

        // Save credentials into /panel/ folder
        $php = "<?php\n\$ADMIN_USER = '$user';\n\$ADMIN_PASS = '$pass';\n?>";
        file_put_contents(__DIR__ . "/../panel/credentials.php", $php);

        echo json_encode(['success' => true, 'msg' => '✅ Admin credentials saved in /panel/credentials.php']);
        exit;
    }

    if ($step == 'finish') {
        function rrmdir($dir) {
            foreach(glob($dir . '/*') as $file) {
                if(is_dir($file)) rrmdir($file); else unlink($file);
            }
            rmdir($dir);
        }
        rrmdir(__DIR__);

        echo json_encode(['success' => true, 'msg' => '✅ Setup folder deleted']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Setup Wizard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
  <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-lg space-y-6">
    <h1 class="text-2xl font-bold text-center">🚀 Setup Wizard</h1>
    
    <!-- Step 1 -->
    <div id="step1" class="step">
      <h2 class="text-xl font-semibold mb-2">Step 1: Database Setup</h2>
      <input id="db_host" placeholder="DB Host" class="w-full p-2 mb-2 rounded bg-gray-700" value="localhost">
      <input id="db_user" placeholder="DB User" class="w-full p-2 mb-2 rounded bg-gray-700">
      <input id="db_pass" type="password" placeholder="DB Password" class="w-full p-2 mb-2 rounded bg-gray-700">
      <input id="db_name" placeholder="Database Name" class="w-full p-2 mb-2 rounded bg-gray-700">
      <button onclick="checkConnection()" class="w-full bg-blue-600 py-2 rounded mt-2">Check Connection</button>
      <div id="db_result" class="mt-2 text-sm"></div>
    </div>

    <!-- Step 2 -->
    <div id="step2" class="step hidden">
      <h2 class="text-xl font-semibold mb-2">Step 2: Import Tables</h2>
      <button onclick="startImport()" class="w-full bg-green-600 py-2 rounded">Start Importing Data</button>

      <!-- Progress bar -->
      <div class="w-full bg-gray-700 rounded mt-4">
        <div id="progress-bar" class="bg-green-500 text-xs leading-none py-1 text-center text-white rounded w-0">0%</div>
      </div>

      <div id="import_result" class="mt-2 text-sm"></div>
    </div>

    <!-- Step 3 -->
    <div id="step3" class="step hidden">
      <h2 class="text-xl font-semibold mb-2">Step 3: Setup Admin</h2>
      <input id="admin_user" placeholder="Admin Username" class="w-full p-2 mb-2 rounded bg-gray-700">
      <input id="admin_pass" type="password" placeholder="Admin Password" class="w-full p-2 mb-2 rounded bg-gray-700">
      <button onclick="saveAdmin()" class="w-full bg-purple-600 py-2 rounded">Save Admin</button>
      <div id="admin_result" class="mt-2 text-sm"></div>
    </div>

    <!-- Step 4 -->
    <div id="step4" class="step hidden">
      <h2 class="text-xl font-semibold mb-2">✅ Setup Complete</h2>
      <button onclick="finishSetup()" class="w-full bg-red-600 py-2 rounded">Finish & Delete Setup</button>
      <div id="finish_result" class="mt-2 text-sm"></div>
    </div>
  </div>

<script>
function checkConnection() {
  let data = new FormData();
  data.append('step','check_connection');
  data.append('db_host',document.getElementById('db_host').value);
  data.append('db_user',document.getElementById('db_user').value);
  data.append('db_pass',document.getElementById('db_pass').value);
  data.append('db_name',document.getElementById('db_name').value);
  fetch('',{method:'POST',body:data})
    .then(r=>r.json()).then(res=>{
      document.getElementById('db_result').innerText=res.msg;
      if(res.success) showStep(2);
    });
}

function startImport() {
  let files = ['users.sql', 'products.sql'];
  let current = 0;
  let total = files.length;

  function importNext() {
    if (current >= total) {
      document.getElementById('import_result').innerText = "✅ All data imported successfully.";
      showStep(3);
      return;
    }

    let file = files[current];
    let data = new FormData();
    data.append('step','import_sql');
    data.append('file',file);

    fetch('',{method:'POST',body:data})
      .then(r=>r.json()).then(res=>{
        if(res.success) {
          let percent = Math.round(((current+1)/total)*100);
          let bar = document.getElementById('progress-bar');
          bar.style.width = percent + "%";
          bar.innerText = percent + "%";
          document.getElementById('import_result').innerText = res.msg;
          current++;
          setTimeout(importNext, 500);
        } else {
          document.getElementById('import_result').innerText = "❌ " + res.msg;
        }
      });
  }

  importNext();
}

function saveAdmin() {
  let data = new FormData();
  data.append('step','save_admin');
  data.append('admin_user',document.getElementById('admin_user').value);
  data.append('admin_pass',document.getElementById('admin_pass').value);
  fetch('',{method:'POST',body:data})
    .then(r=>r.json()).then(res=>{
      document.getElementById('admin_result').innerText=res.msg;
      if(res.success) showStep(4);
    });
}

function finishSetup() {
  let data = new FormData();
  data.append('step','finish');
  fetch('',{method:'POST',body:data})
    .then(r=>r.json()).then(res=>{
      document.getElementById('finish_result').innerText=res.msg;
      if(res.success) {
        setTimeout(() => {
          window.location.href = "/panel"; // redirect to main domain/panel
        }, 1500);
      }
    });
}

function showStep(n) {
  document.querySelectorAll('.step').forEach(el=>el.classList.add('hidden'));
  document.getElementById('step'+n).classList.remove('hidden');
}
</script>
</body>
</html>
