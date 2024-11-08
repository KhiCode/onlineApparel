<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <style>
    /* Basic reset for margin and padding */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Sidebar styling */
    .sidebar {
      width: 78px; /* Initial width */
      background-color: #ffffff;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      transition: width 0.5s ease; /* Smoother transition */
      overflow: hidden;
      position: relative;
      margin-top: 100px;
      height: 600px;
    }

    /* Expanded sidebar */
    .sidebar.expanded {
      width: 250px; /* Expanded width */
    }

    /* Add hover effect to expand sidebar */
    .sidebar:hover {
      width: 250px;
    }

    /* Styling for sidebar buttons */
    .sidebar-button {
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: #6B8E23;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
      transition: background-color 0.3s;
      justify-content: flex-start;
    }

    /* Icon alignment */
    .sidebar-button i {
      font-size: 20px;
    }

    /* Text hidden initially */
    .sidebar-button span {
      display: none;
      white-space: nowrap;
    }

    /* Show text when sidebar is expanded */
    .sidebar.expanded .sidebar-button span {
      display: inline;
    }

    /* Hover effect for buttons */
    .sidebar-button:hover {
      background-color: #556B2F;
    }

    /* Centered text styling */
    .h1text {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 30px;
      margin-bottom: 20px;
    }

    .text {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
    }
  </style>
  <!-- Boxicons for icons -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <!-- Sidebar structure -->
    <div class="sidebar" id="sidebar" onmouseover="expandSidebar()"   onmouseout="collapseSidebar()">
      <button onclick="loadContent('admin-reports.php')" class="sidebar-button">
      <i class='bx bx-bar-chart-alt-2'></i>
      <span>Reports</span>
      </button>
    <button class="sidebar-button">
      <i class='bx bx-palette'></i>
      <span>Create Design</span>
    </button>
    <button onclick="loadContent('admin-manage.php')" class="sidebar-button">
      <i class='bx bx-box'></i>
      <span>Orders</span>
    </button>
  
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('expanded');
    }

    function loadContent(url) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', url, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById('content').innerHTML = xhr.responseText;
          reinitializeScripts();
        }
      };
      xhr.send();
    }

    function expandSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.add('expanded');
    }

    function collapseSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.remove('expanded');
    }
  </script>
</body>
</html>
