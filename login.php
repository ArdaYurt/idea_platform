<?php
include 'db.php';

$identifier = $_POST['identifier']; // username OR email
$password = $_POST['password'];

// Try to match by username OR email
$sql = "SELECT * FROM users WHERE username='$identifier' OR email='$identifier'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $row = $result->fetch_assoc();

  if (password_verify($password, $row['password'])) {
    echo "Login successful. Welcome, " . $row['username'];
    // You can redirect to a profile/dashboard here
  } else {
    echo "Invalid password.";
  }
} else {
  echo "User not found.";
}

$conn->close();
?>
