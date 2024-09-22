<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'eceb'); // Ensure the database is selected correctly
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$Username = $_POST['Username'];
$psw = $_POST['Password'];

$q = "SELECT * FROM registrationpage WHERE Username='$Username' AND psw ='$psw'";

$result = mysqli_query($conn, $q);
$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['Username'] = $Username; // Store email in session
    header("Location: intropage.html"); // Display success message
} else {
    echo "Invalid credentials"; // Display error message
}

mysqli_close($conn); // Close the database connection
?>
