<?php
// Assuming $photo holds the file name of the image stored in the database
$photo = '365-ads-pc-jan25.jpg';  // This should come from your database

// Build the full URL for the image
$image_url = "https://bdix.d5digital.net/uploads/customer_photos/" . $photo;

// Check if the file exists and then display it
echo "<img src='$image_url' alt='Customer Photo' width='200' />";

// Assuming you have a database connection and a query to get customer details
$customer_id = 1; // Example customer_id
$query = "SELECT photo FROM customers WHERE customer_id = $customer_id";
$result = $conn->query($query);

// Fetch the image file name from the database
if ($result && $row = $result->fetch_assoc()) {
    $photo = $row['photo']; // Assuming 'photo' column holds the image file name
    $image_url = "https://bdix.d5digital.net/uploads/customer_photos/" . $photo;
    echo "<img src='$image_url' alt='Customer Photo' width='200' />";
} else {
    echo "Image not found.";
}

?>
