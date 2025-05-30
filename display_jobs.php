<?php
// Connect to the database
require_once("settings.php");

// Check connection
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch job listings
$query = "SELECT * FROM jobs";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
</head>
<body>
    <h2>Available Jobs</h2>

    <?php if ($result->num_rows > 0): ?>
        <ul>
        <?php while ($job = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo htmlspecialchars($job['job_title']); ?></strong><br>
                <?php echo htmlspecialchars($job['job_description']); ?>
            </li>
            <hr>
        <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No jobs found.</p>
    <?php endif; ?>
</body>
</html>
