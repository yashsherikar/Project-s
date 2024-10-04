<?php
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $product = isset($_POST['product']) ? $_POST['product'] : '';

    // Validate and sanitize input
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $product = filter_var($product, FILTER_SANITIZE_STRING);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'art_instincts');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Prepare and bind the statement
        $stmt = $conn->prepare("INSERT INTO contact (name, number, product) VALUES (?, ?, ?)");

        if (!$stmt) {
            die('Error preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("sss", $name, $number, $product);

        // Execute the statement
        if ($stmt->execute()){
            echo "Record inserted successfully";
        }else{
            echo "Error inserting record:" . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
?>
