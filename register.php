<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirm_password = $_POST['confirm_password'];

    if ($_POST['password'] === $confirm_password) {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT id FROM login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Username already taken!";
        } else {
            $stmt->close();

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO login (name, email, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $username, $password);

            if ($stmt->execute()) {
                // Redirect to logreg.php after successful registration
                header("Location: logreg.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>
