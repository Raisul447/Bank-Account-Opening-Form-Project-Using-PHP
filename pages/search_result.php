<?php
include('../includes/db_connection.php');

$customer_id = $_GET['customer_id'];

$sql = "SELECT * FROM customers WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $customer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
    
    $nominee_sql = "SELECT * FROM nominees WHERE customer_id = ?";
    $nominee_stmt = $conn->prepare($nominee_sql);
    $nominee_stmt->bind_param('i', $customer_id);
    $nominee_stmt->execute();
    $nominee_result = $nominee_stmt->get_result();
    $nominee = $nominee_result->fetch_assoc();
} else {
    $customer = null;
    $nominee = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Customer Details</h1>

        <?php if ($customer): ?>
            <h2>Account Information</h2>
            <p><strong>Customer ID:</strong> <?php echo $customer['customer_id']; ?></p>
            <p><strong>Full Name:</strong> <?php echo $customer['full_name']; ?></p>
            <p><strong>Account Number:</strong> <?php echo $customer['account_number']; ?></p>
            <p><strong>Branch Name:</strong> <?php echo $customer['branch_name']; ?></p>
            <p><strong>Account Type:</strong> <?php echo $customer['account_type']; ?></p>
            <p><strong>Initial Deposit:</strong> <?php echo $customer['initial_deposit']; ?></p>
            <p><strong>Monthly Income:</strong> <?php echo $customer['monthly_income']; ?></p>

            <?php if ($customer['interest_percentage']): ?>
                <p><strong>Interest Percentage (Monthly):</strong> <?php echo $customer['interest_percentage']; ?>%</p>
            <?php endif; ?>

            <?php if (!empty($customer['photo'])): ?>
                <h2>Customer Photo</h2>
                <img src="https://bdix.d5digital.net/uploads/customer_photos/<?php echo $customer['photo']; ?>" alt="Customer Photo" width="200">
            <?php else: ?>
                <p>No photo available.</p>
            <?php endif; ?>

            <h2>Nominee Information</h2>
            <?php if ($nominee): ?>
                <p><strong>Nominee Name:</strong> <?php echo $nominee['nominee_name']; ?></p>
                <p><strong>Nominee Address:</strong> <?php echo $nominee['nominee_address']; ?></p>
                <p><strong>Nominee Percentage:</strong> <?php echo $nominee['nominee_percentage']; ?>%</p>
                <p><strong>Relationship with Nominee:</strong> <?php echo $nominee['nominee_relationship']; ?></p>
                <p><strong>Nominee Date of Birth:</strong> <?php echo $nominee['nominee_dob']; ?></p>
                <p><strong>Nominee ID:</strong> <?php echo $nominee['nominee_id']; ?></p>

                <?php if (!empty($nominee['nominee_photo'])): ?>
                    <h3>Nominee Photo</h3>
                    <img src="https://bdix.d5digital.net/uploads/nominee_photos/<?php echo $nominee['nominee_photo']; ?>" alt="Nominee Photo" width="200">
                <?php else: ?>
                    <p>No nominee photo available.</p>
                <?php endif; ?>
            <?php else: ?>
                <p>No nominee information found.</p>
            <?php endif; ?>
        <?php else: ?>
            <p>No customer found with ID <?php echo $customer_id; ?>.</p>
        <?php endif; ?>
        <br>
        <button onclick="window.location.href='/index.php?'">Back to Homepage</button>
    </div>
    <footer>
        <p>Presented by Name: Raisul Islam, ID: 2023000010059, Batch: 16, Dept. of CSE</p>
    </footer>
</body>
</html>
