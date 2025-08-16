<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFriendly | Registerphp </title>
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
// Show errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "eco_recycle");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get values from form safely
  $status = $_POST['status'] ?? '';
  $org = $_POST['org'] ?? '';
  $name = $_POST['name'] ?? '';
  $address = $_POST['address'] ?? '';
  $email = $_POST['email'] ?? '';
  $contact = $_POST['contact'] ?? '';
  $username = $_POST['username'] ?? '';
  $password_raw = $_POST['password'] ?? '';
  $passkey = $_POST['passkey'] ?? '';

  // Volunteer validation
  if ($status === 'volunteer' && $passkey !== '123') {
    echo "<script>alert('Invalid volunteer passkey!'); window.history.back();</script>";
    exit();
  }

  // Password encryption
  $password = password_hash($password_raw, PASSWORD_DEFAULT);

  // Prepare insert
  $stmt = $conn->prepare("INSERT INTO users (status, organization_name, user_name, address, email, contact, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  if (!$stmt) {
    die("Prepare failed: " . $conn->error);
  }

  // Bind and execute
  $stmt->bind_param("ssssssss", $status, $org, $name, $address, $email, $contact, $username, $password);
  
  if ($stmt->execute()) {
    echo "<script>alert('Registration Successful!'); window.location.href = 'index.html';</script>";
  } else {
    echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
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
