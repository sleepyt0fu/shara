<?php
// Include database connection
include("connection.php");

// Check if Employee_ID is set and not empty
if(isset($_GET['Employee_ID']) && !empty($_GET['Employee_ID'])) {
    // Sanitize input to prevent SQL injection
    $Employee_ID = $conn->real_escape_string($_GET['Employee_ID']);

    // SQL query to retrieve employee details
    $sql = "SELECT * FROM mytbl WHERE Employee_ID = '$Employee_ID'";

    // Execute query
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch the first row (assuming Employee_ID is unique)
        $row = $result->fetch_assoc();

        // Display employee details within a container
        echo "<h2>Employee Details</h2>";
        echo "<p><strong>Employee ID:</strong> " . $row["Employee_ID"] . "</p>";
        echo "<p><strong>Succession Position:</strong> " . $row["succession_position"] . "</p>";
        echo "<p><strong>Candidate Name:</strong> " . $row["candidate_name"] . "</p>";
        echo "<p><strong>Current Position:</strong> " . $row["current_position"] . "</p>";
        echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
        echo "<p><strong>Age:</strong> " . $row["age"] . "</p>";
        echo "<p><strong>Years of Service:</strong> " . $row["service"] . "</p>";
        echo "<p><strong>Readiness:</strong> " . $row["readiness"] . "</p>";
        echo "<p><strong>Education:</strong> " . $row["education"] . "</p>";
        echo "<p><strong>Work Experience:</strong> " . $row["experience"] . "</p>";
        echo "<p><strong>Competency: Performance:</strong> " . $row["performance"] . "</p>";
        echo "<p><strong>Character:</strong> " . $row["character"] . "</p>";
        echo "<p><strong>Commitment:</strong> " . $row["commitment"] . "</p>";
    } else {
        // No employee found with the given ID
        echo "Employee not found.";
    }
} else {
    // Invalid request, Employee_ID not provided
    echo "Invalid request.";
}
?>