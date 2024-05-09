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

        // Display employee details
        echo "<h2>UPDATE EMPLOYEE</h2>";
        echo "<form id='updateForm' method='post' action='updatehandler.php'>";
       
        echo "<label>Succession Position:</label> <input type='text' name='succession_position' value='" . htmlspecialchars($row["succession_position"]) . "'><br>";
        echo "<label>Candidate Name:</label> <input type='text' name='candidate_name' value='" . htmlspecialchars($row["candidate_name"]) . "'><br>";
        echo "<label>Current Position:</label> <input type='text' name='current_position' value='" . htmlspecialchars($row["current_position"]) . "'><br>";
        echo "<label>Address:</label> <input type='text' name='address' value='" . htmlspecialchars($row["address"]) . "'><br>";
        echo "<label>Age:</label> <input type='text' name='age' value='" . htmlspecialchars($row["age"]) . "'><br>";
        echo "<label>Years of Service Address:</label> <input type='text' name='service' value='" . htmlspecialchars($row["service"]) . "'><br>";
        
        echo "<label>Readiness:</label> <select name='readiness'>";
        echo "<option value='Level A' " . ($row["readiness"] == "Level A" ? "selected" : "") . ">Level A</option>";
        echo "<option value='Level B' " . ($row["readiness"] == "Level B" ? "selected" : "") . ">Level B</option>";
        echo "<option value='Level C' " . ($row["readiness"] == "Level C" ? "selected" : "") . ">Level C</option>";
        echo "</select><br>";
        
        echo "<label>Education:</label> <input type='text' name='education' value='" . htmlspecialchars($row["education"]) . "'><br>";
        echo "<label>Work Experience:</label> <input type='text' name='experience' value='" . htmlspecialchars($row["experience"]) . "'><br>";
        echo "<label>Comptency: Performance:</label> <input type='text' name='performance' value='" . htmlspecialchars($row["performance"]) . "'><br>";
        echo "<label>Character:</label> <input type='text' name='character' value='" . htmlspecialchars($row["character"]) . "'><br>";
        echo "<label>Commitment:</label> <input type='text' name='commitment' value='" . htmlspecialchars($row["commitment"]) . "'><br>";
        echo "<input type='hidden' name='Employee_ID' value='" . $Employee_ID . "'>";
        echo "<button type='submit'>update</button>";
        echo "</form>";
    } else {
        // No employee found with the given ID
        echo "Employee not found.";
    }
} else {
    // Invalid request, Employee_ID not provided
    echo "Invalid request.";
}
?>