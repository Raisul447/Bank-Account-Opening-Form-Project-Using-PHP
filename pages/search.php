<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Search Customer by using Customer ID</h1>
        <form action="search_result.php" method="GET">
            <input type="number" name="customer_id" required placeholder="Enter Customer ID">
            <button type="submit">Search</button>
            <button onclick="window.location.href='/index.php?'">Home</button>
        </form>
    </div>
    <footer>
        <p>Presented by Name: Raisul Islam, ID: 2023000010059, Batch: 16, Dept. of CSE</p>
    </footer>
</body>
</html>
