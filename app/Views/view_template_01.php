<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title) ?> - Academic Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>

    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
      --bs-primary: #4b6cb7;   /* custom blue gradient start */
      --bs-primary-rgb: 75,108,183;

      --bs-success: #28a745;   /* keep as is or change */
      --bs-danger: #d9534f;    /* softer red */
    }

    .navbar.bg-primary {
      background: linear-gradient(90deg, #4b6cb7, #2a4478ff); /* gradient navbar */
    }
    
    .navbar {
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .content {
      padding: 30px 15px;
    }
    footer {
      background: #343a40;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/home">
      <i class="bi bi-mortarboard"></i> Academic Portal
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/home"><i class="bi bi-house-door"></i> Home</a></li>
        <?php if(session()->get('role')==='admin'): ?>
          <li class="nav-item"><a class="nav-link" href="/courses"><i class="bi bi-journal-text"></i> Manage Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="/students"><i class="bi bi-people"></i> Manage Students</a></li>
        <?php elseif(session()->get('role')==='student'): ?>
          <li class="nav-item"><a class="nav-link" href="/courses"><i class="bi bi-book"></i> Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="/my-courses"><i class="bi bi-list-check"></i> My Courses</a></li>
        <?php endif; ?>
      </ul>
      <span class="navbar-text">
        <i class="bi bi-person-circle"></i> <?= session()->get('username') ?> |
        <a href="/login" class="btn btn-sm btn-danger ms-2">Logout</a>
      </span>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container content">
  <?= $content ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
