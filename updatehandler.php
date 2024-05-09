<?php
include("connection.php");

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Employee_ID = isset($_POST['Employee_ID']) ? intval($_POST['Employee_ID']) : 0;
    $succession_position = sanitize_input($_POST['succession_position']);
    $candidate_name = sanitize_input($_POST['candidate_name']);
    $current_position = sanitize_input($_POST['current_position']);
    $address = sanitize_input($_POST['address']);
    $age = sanitize_input($_POST['age']);
    $service = sanitize_input($_POST['service']);
    $readiness = sanitize_input($_POST['readiness']);
    $education = sanitize_input($_POST['education']);
    $experience = sanitize_input($_POST['experience']);
    $performance = sanitize_input($_POST['performance']);
    $character = sanitize_input($_POST['character']);
    $commitment = sanitize_input($_POST['commitment']);

    if (empty($succession_position) || empty($candidate_name) || empty($current_position) || empty($address) || empty($age) || empty($service) || empty($readiness) || empty($education) || empty($experience) || empty($performance) || empty($character) || empty($commitment)) {
        echo "All fields are required.";
    } else {
        $sql = "UPDATE mytbl SET succession_position=?, candidate_name=?, current_position=?, address=?, age=?, service=?, readiness=?, education=?, experience=?, performance=?, `character`=?, commitment=? WHERE Employee_ID=?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('ssssisssssssi', $succession_position, $candidate_name, $current_position, $address, $age, $service, $readiness, $education, $experience, $performance, $character, $commitment, $Employee_ID);

            if ($stmt->execute()) {
                header("Location: form.php");
                exit();
            } else {
                echo "Error updating employee: " . $conn->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
} else {
    header("Location: form.php");
    exit();
}
?>