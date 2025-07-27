<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all expected POST values are set
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
        $conn = new mysqli("localhost", "root", "", "hotel_paradise");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $phone   = $_POST['phone'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_messages (name, email, phone, message)
                VALUES ('$name', '$email', '$phone', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "✅ Message sent successfully!";
        } else {
            echo "❌ SQL Error: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "❌ Some form fields are missing!";
    }
} else {
    echo "❌ Invalid request method.";
}
?>
