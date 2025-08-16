<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | Admin </title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- Header -->
  <header class="main-header">
  <div class="logo">🌿</div>
  <div class="site-title" style="font-size: 22px;">Go Green Gracefully | Let's Recycle</div>
  <nav class="nav-menu">
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
$host = "localhost";
$user = "root";
$pass = "";
$db = "eco_recycle";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<h2>👤 Registered Users</h2>";
$users = $conn->query("SELECT id, status, user_name, username, email, points FROM users");
if ($users->num_rows > 0) {
  echo "<table border='1'><tr><th>ID</th><th>Status</th><th>Name</th><th>Username</th><th>Email</th><th>Points</th></tr>";
  while ($row = $users->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['status']}</td><td>{$row['user_name']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['points']}</td></tr>";
  }
  echo "</table><br>";
}

echo "<h2>♻️ Waste Contributions</h2>";
$waste = $conn->query("SELECT * FROM waste_contributions");
if ($waste->num_rows > 0) {
  echo "<table border='1'><tr><th>ID</th><th>User ID</th><th>Type</th><th>Amount (Kg)</th><th>City</th><th>Sunday Slot</th><th>Date</th></tr>";
  while ($row = $waste->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['user_id']}</td><td>{$row['waste_type']}</td><td>{$row['amount']}</td><td>{$row['city_area']}</td><td>{$row['sunday_slot']}</td><td>{$row['contribution_date']}</td></tr>";
  }
  echo "</table><br>";
}

echo "<h2>🤝 Collaborations</h2>";
$collabs = $conn->query("SELECT * FROM collaborations");
if ($collabs->num_rows > 0) {
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Address</th><th>Contact</th><th>Waste Type</th><th>Cities</th><th>Submitted</th></tr>";
  while ($row = $collabs->fetch_assoc()) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['contact']}</td><td>{$row['type_of_waste']}</td><td>{$row['cities']}</td><td>{$row['submitted_at']}</td></tr>";
  }
  echo "</table><br>";
}

$conn->close();
?>
 <!-- Footer -->
  <footer style="font-size: 22px;">
    @2025 EcoFriendly | Let's Recycle | Zero Waste
  </footer>

</body>
</html>