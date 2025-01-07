<?php
// For debugging (remove these two lines in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
include('../includes/db_connection.php');

// Remove this line that dumps the POST data
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// Get form data using isset() to avoid undefined array key warnings
$customer_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : null;
$date = isset($_POST['date']) ? $_POST['date'] : '';

// If the date is empty, use the current date as default
if (empty($date)) {
    $date = date('Y-m-d');
}

$account_number = isset($_POST['account_number']) ? $_POST['account_number'] : '';
$branch_name = isset($_POST['branch_name']) ? $_POST['branch_name'] : '';
$full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
$account_type = isset($_POST['account_type']) ? $_POST['account_type'] : '';
$initial_deposit = isset($_POST['initial_deposit']) ? $_POST['initial_deposit'] : 0;
$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '';
$email_id = isset($_POST['email_id']) ? $_POST['email_id'] : '';
$dob = isset($_POST['dob']) ? $_POST['dob'] : '';

// Check if (dob) is empty, if it is, set it to NULL or a default date
if (empty($dob)) {
    $dob = NULL;
}

$father_name = isset($_POST['father_name']) ? $_POST['father_name'] : '';
$mother_name = isset($_POST['mother_name']) ? $_POST['mother_name'] : '';
$nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
$present_address = isset($_POST['present_address']) ? $_POST['present_address'] : '';
$permanent_address = isset($_POST['permanent_address']) ? $_POST['permanent_address'] : '';
$national_id = isset($_POST['national_id']) ? $_POST['national_id'] : '';
$monthly_income = isset($_POST['monthly_income']) ? $_POST['monthly_income'] : 0;

// Handle interest_percentage: If empty or not set, leave it as NULL
$interest_percentage = isset($_POST['interest_percentage']) && $_POST['interest_percentage'] !== '' 
    ? $_POST['interest_percentage'] // Let it remain the same if it has a value
    : NULL; // If not set or empty, it will default to NULL (as per the database)


// Upload photo
$photo = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
if ($photo) {
    move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/customer_photos/" . $photo);
}

// Nominee information
$nominee_name = isset($_POST['nominee_name']) ? $_POST['nominee_name'] : '';
$nominee_photo = isset($_FILES['nominee_photo']['name']) ? $_FILES['nominee_photo']['name'] : '';
if ($nominee_photo) {
    move_uploaded_file($_FILES['nominee_photo']['tmp_name'], "../uploads/nominee_photos/" . $nominee_photo);
}
$nominee_address = isset($_POST['nominee_address']) ? $_POST['nominee_address'] : '';
$nominee_percentage = isset($_POST['nominee_percentage']) ? $_POST['nominee_percentage'] : 0;
$nominee_relationship = isset($_POST['nominee_relationship']) ? $_POST['nominee_relationship'] : '';
$nominee_dob = isset($_POST['nominee_dob']) ? $_POST['nominee_dob'] : '';
$nominee_id = isset($_POST['nominee_id']) ? $_POST['nominee_id'] : '';

// SQL Query to insert data into customers table
$sql = "INSERT INTO customers (
    customer_id, date, account_number, branch_name, full_name, account_type, 
    initial_deposit, mobile_number, email_id, dob, father_name, mother_name, 
    nationality, present_address, permanent_address, national_id, monthly_income, 
    interest_percentage, photo
) VALUES (
    '$customer_id', '$date', '$account_number', '$branch_name', '$full_name', '$account_type', 
    '$initial_deposit', '$mobile_number', '$email_id', '$dob', 
    '$father_name', '$mother_name', '$nationality', '$present_address', '$permanent_address', 
    '$national_id', '$monthly_income', " . ($interest_percentage === NULL ? 'NULL' : "'$interest_percentage'") . ", '$photo'
)";

// Check if the insert query is successful
if ($conn->query($sql) === TRUE) {
    // Get the last inserted customer_id (if it's auto-incremented)
    $customer_id = $conn->insert_id;

    // Insert into nominees table
    $nominee_sql = "INSERT INTO nominees (
        customer_id, nominee_name, nominee_photo, nominee_address, nominee_percentage, 
        nominee_relationship, nominee_dob, nominee_national_id
    ) VALUES (
        '$customer_id', '$nominee_name', '$nominee_photo', '$nominee_address', '$nominee_percentage', 
        '$nominee_relationship', '$nominee_dob', '$nominee_id'
    )";

    if ($conn->query($nominee_sql) === TRUE) {
        // After successful insert, display only this message
        echo "New record created successfully!";
    } else {
        // If something goes wrong with the nominee insertion
        echo "Error: " . $nominee_sql . "<br>" . $conn->error;
    }
} else {
    // If something goes wrong with the customer insertion
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
