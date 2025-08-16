<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | Contribute </title>
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
$host = "localhost";
$user = "root";
$pass = "";
$db = "eco_recycle";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Assuming user is logged in
if (!isset($_SESSION['user']['id'])) {
  die("You must be logged in to contribute.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $user_id = $_SESSION['user']['id'];
  $type = $_POST['waste_type'];
  $amount = $_POST['amount'];
  $city = $_POST['city'];
  $sunday = $_POST['sunday'];

  $stmt = $conn->prepare("INSERT INTO waste_contributions (user_id, waste_type, amount, city_area, sunday_slot) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("isdss", $user_id, $type, $amount, $city, $sunday);

  if ($stmt->execute()) {
    // Update points
    $points = floor($amount) * 10;
    $conn->query("UPDATE users SET points = points + $points WHERE id = $user_id");

    echo "Thank you for your contribution! You've earned $points points.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}
$conn->close();
?>
 <!-- Footer -->
  <footer style="font-size: 22px;">
    @2025 EcoFriendly | Let's Recycle | Zero Waste
  </footer>

</body>
</html>
