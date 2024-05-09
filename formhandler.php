<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

include("connection.php");

$Employee_ID = $succession_position = $candidate_name = $current_position = $address = $age = $service = $readiness = $education = $experience = $performance = $character = $commitment = "";
$idErr = $succession_positionErr = $candidate_nameErr = $current_positionErr = $addressErr = $ageErr = $serviceErr = $readinessErr = $educationErr = $experienceErr = $performanceErr = $characterErr = $commitmentErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["succession_position"])) {
        $succession_positionErr = "Succession Position is required";
    } else {
        $succession_position = $_POST["succession_position"];
    }

    if (empty($_POST["candidate_name"])) {
        $candidate_nameErr = "Candidate Name is required";
    } else {
        $candidate_name = $_POST["candidate_name"];
    }

    if (empty($_POST["current_position"])) {
        $current_positionErr = "Current Position is required";
    } else {
        $current_position = $_POST["current_position"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = $_POST["age"];
    }

    if (empty($_POST["service"])) {
        $serviceErr = "Years of Service is required";
    } else {
        $service = $_POST["service"];
    }

    if (empty($_POST["readiness"])) {
        $readinessErr = "Readiness is required";
    } else {
        $readiness = $_POST["readiness"];
    }

    if (empty($_POST["education"])) {
        $educationErr = "Education is required";
    } else {
        $education = $_POST["education"];
    }

    if (empty($_POST["experience"])) {
        $experienceErr = "Work Experience is required";
    } else {
        $experience = $_POST["experience"];
    }

    if (empty($_POST["performance"])) {
        $performanceErr = "Performance is required";
    } else {
        $performance = $_POST["performance"];
    }

    if (empty($_POST["character"])) {
        $characterErr = "Character is required";
    } else {
        $character = $_POST["character"];
    }

    if (empty($_POST["commitment"])) {
        $commitmentErr = "Commitment is required";
    } else {
        $commitment = $_POST["commitment"];
    }

    if (empty($succession_positionErr) && empty($candidate_nameErr) && empty($current_positionErr) && empty($addressErr) && empty($ageErr) && empty($serviceErr) && empty($readinessErr) && empty($educationErr) && empty($experienceErr) && empty($performanceErr) && empty($characterErr) && empty($commitmentErr)) {
        $stmt = $conn->prepare("INSERT INTO mytbl (succession_position, candidate_name, current_position, address, age, service, readiness, education, experience, performance, `character`, commitment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisssssss", $succession_position, $candidate_name, $current_position, $address, $age, $service, $readiness, $education, $experience, $performance, $character, $commitment);
        
        if ($stmt->execute()) {
            echo "<script>alert('New data added successfully'); window.location.href = 'form.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}
$sql = "SELECT * FROM mytbl";
$result = $conn->query($sql);
?>
