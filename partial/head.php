<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../asset/img/logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../asset/css/style_dashboard.css">
</head>
<body>

<div class="sidebar">
  <div class="logo"><img src="../asset/img/logo.png" alt="" srcset=""></div>
   <ul class="menu">
    <li>
        <a href="../dashboard.php">
          <i class="fas fa-tachometer-alt" ></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../karyawan/data.php">
          <i class="fas fa-user-alt"></i>
          <span>Data Karyawan</span>
        </a>
      </li>
      <li>
        <a href="../barang/barang.php">
          <i class="fas fa-box"></i>
          <span>Data Barang</span>
        </a>
      </li>
      <li>
        <a href="../lokasi/lokasi.php">
          <i class="fas fa-map marker-alt"></i>
          <span>Lokasi</span>
        </a>
      </li>
      <li class="logout">
        <a href="logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
</div>
<div class="main--content">
  <div class="header--wrapper">
    <div class="header--title">
      <span>Primary</span>
      <h2>Dashboard</h2>
    </div>
    <div class="user--info">
      <div class="search--box">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search" />
      </div>
    </div>
  </div>
</body>
</html>