<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | Profile </title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- Header -->
  <header class="main-header">
  <div class="logo">🌿</div>
  <div class="site-title" style="font-size: 22px;">Go Green Gracefully | Let's Recycle</div>
  <nav class="nav-menu" style="font-size: 22px;">
    <a href="index.html">Home</a>
    <a href="login.html">Login/Register</a>
    <a href="profile.html">Profile</a>
    <a href="setting.html">Setting</a>
    <a href="collaboration.html">Collaborations</a>
    <a href="awareness.html">Awareness</a>
    <a href="wasteportal.html">Waste Portal</a>
    <a href="admin.html">Admin</a>
   
  </nav>
</header>
<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
  header("Location: login.html");
  exit();
}

$user = $_SESSION['user'];

?>

  <main style="padding: 2rem;">
    <h2 style="font-size: 36px;">User Profile</h2>
    
    <p style="font-size: 22px;"><strong>Status:</strong> <?= htmlspecialchars($user['status']) ?></p>
    <p style="font-size: 22px;"><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
    <p style="font-size: 22px;"><strong>Points:</strong> <?= $user['points'] ?> 🪙</p>

    <h3>Feedback</h3>
    <form action="feedback.php" method="POST" style="font-size: 22px;">
      <textarea name="feedback" style="font-size: 22px;" placeholder="Write feedback here.." required></textarea><br>
      <button type="submit" style="font-size: 22px;">Submit Feedback</button>
    </form>
    <p></p>
    <a href="index.html" style="font-size: 22px;">Log Out</a>
  </main>

  <footer style="font-size: 22px;">
    @2025 EcoFriendly | Let's Recycle | Zero Waste
  </footer>
</body>
</html>
