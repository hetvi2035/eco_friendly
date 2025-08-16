<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | login</title>
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
      

  </nav>
</header>

<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eco_recycle");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user'] = $row;
      echo "Login successful!";
      // Redirect to profile or dashboard
    } else {
      echo "Invalid password.";
    }
  } else {
    echo "User not found.";
  }

  $stmt->close();
  $conn->close();
}
?>
 <!-- Footer -->
  <footer style="font-size: 22px;">
    @2025 EcoFriendly | Let's Recycle | Zero Waste
  </footer>

</body>
</html>
