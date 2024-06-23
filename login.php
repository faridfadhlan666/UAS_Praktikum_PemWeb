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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $hashed_password);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "No user found with this username!";
    }

    $stmt->close();
}

$conn->close();
?>