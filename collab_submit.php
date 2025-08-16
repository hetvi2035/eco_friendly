<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | Collab_submit </title>
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
$host = "localhost";
$user = "root";
$pass = "";
$db = "eco_recycle";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $type = $_POST['type'];
  $cities = $_POST['cities'];

  $stmt = $conn->prepare("INSERT INTO collaborations (name, address, contact, type_of_waste, cities) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $name, $address, $contact, $type, $cities);

  if ($stmt->execute()) {
    echo "Thank you for collaborating!";
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
