<?php
include('../includes/db_connection.php');

// Determine the type of bank account Islamic or Conventional
$type = $_GET['type']; 

// Generate customer ID Even for Islamic and ODD for Conventional
function generateCustomerID($type) {
    global $conn;
    $sql = "SELECT MAX(customer_id) AS max_id FROM customers";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    // For Islamic Bank (Even) or Conventional Bank (ODD)
    $last_id = $row['max_id'];
    $new_id = $last_id + 1;

    if ($type == "islamic" && $new_id % 2 != 0) {
        $new_id++;  // Even for Islamic bank
    } elseif ($type == "conventional" && $new_id % 2 == 0) {
        $new_id++;  // ODD for Conventional bank
    }

    return $new_id;
}

$customerID = generateCustomerID($type);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Create a <?php echo ucfirst($type); ?> Bank Account</h1>
        <form action="submit_account.php" method="POST" enctype="multipart/form-data">
            <!-- Auto Generated Even or ODD -->
            <label for="customer_id" class="bold-label">Customer ID: <?php echo $customerID; ?></label>
            <input type="hidden" name="customer_id" value="<?php echo $customerID; ?>">

            <label for="date">Date:</label>
            <input type="date" name="date" required><br>

            <label for="photo">Customer Photo:</label>
            <input type="file" name="photo" accept="image/*"><br>

            <label for="account_number">Account Number:</label>
            <input type="text" name="account_number" required><br>

            <label for="branch_name">Branch Name:</label>
            <input type="text" name="branch_name" required><br>

            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" required><br>

            <label>Type of Account:</label>
            <input type="radio" name="account_type" value="savings" required> Savings
            <input type="radio" name="account_type" value="current" required> Current<br>

            <label for="initial_deposit">Initial Deposit Amount:</label>
            <input type="number" name="initial_deposit" required><br>

            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" required><br>

            <label for="email_id">Email ID:</label>
            <input type="email" name="email_id" required><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" required><br>

            <label for="father_name">Father's Name:</label>
            <input type="text" name="father_name" required><br>

            <label for="mother_name">Mother's Name:</label>
            <input type="text" name="mother_name" required><br>

            <label for="nationality">Nationality:</label>
            <input type="text" name="nationality" required><br>

            <label for="present_address">Present Address:</label>
            <input type="text" name="present_address" required><br>

            <label for="permanent_address">Permanent Address:</label>
            <input type="text" name="permanent_address" required><br>

            <label for="national_id">National ID:</label>
            <input type="text" name="national_id" required><br>

            <label for="monthly_income">Monthly Income:</label>
            <input type="text" name="monthly_income" required><br>
            
            <!-- Interest option only for Conventional Bank -->
            <?php if ($type == "conventional") { ?>
                <label for="interest_percentage">Interest Percentage (Monthly):</label>
                <input type="text" name="interest_percentage"><br>
            <?php } ?>

            <h2>Nominee Information</h2>
            <label for="nominee_name">Nominee Name:</label>
            <input type="text" name="nominee_name" required><br>

            <label for="nominee_photo">Nominee Photo:</label>
            <input type="file" name="nominee_photo" accept="image/*"><br>

            <label for="nominee_address">Nominee Address:</label>
            <input type="text" name="nominee_address" required><br>

            <label for="nominee_percentage">Nominee Percentage:</label>
            <input type="text" name="nominee_percentage" required><br>

            <label for="nominee_relationship">Relationship with Nominee:</label>
            <input type="text" name="nominee_relationship" required><br>

            <label for="nominee_dob">Nominee Date of Birth:</label>
            <input type="date" name="nominee_dob" required><br>

            <label for="nominee_id">Nominee National ID:</label>
            <input type="text" name="nominee_id" required><br>

            <button type="submit">Submit</button> 
            <button onclick="location = '/index.php';">Home</button>
        </form>
    </div>
    <footer>
        <p>Presented by Name: Raisul Islam, ID: 2023000010059, Batch: 16, Dept. of CSE</p>
    </footer>
</body>
</html>
