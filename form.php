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



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="list.css">
    <title>Admin</title>
  </head>
  <body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-ghost'></i>
                <div class="logo_name">Admin</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                    <i class='bx bx-search' ></i>
                    <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="admin.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="form.php">
                    <i class='bx bx-user-pin' ></i>
                    <span class="links_name">Successors</span>
                </a>
                <span class="tooltip">Successors</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Module</span>
                </a>
                <span class="tooltip">Module</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-line-chart' ></i>
                    <span class="links_name">Module</span>
                </a>
                <span class="tooltip">Module</span> 
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                     <img src="profile.jpg" alt="">
                    <div class="name_job">
                        <div class="name">Shara Andres</div>
                        <div class="job">Director</div>
                    </div>
                </div>
                div>
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out' id="log_out"></i>
                        <span class="links_name">logout</span>
                    </a>
                </li>             
            </div>
        </div>
    </div>
</div>
    
    <script src="admin.js"></script>

  </body>
</html>

  <div class="container">
    <header>Succession Plan</header>
    <form action="form.php" method="POST" id="successionForm">
      <!-- Candidate Profile -->
      <div class="form first">
        <div class="profile candidate">
          <span class="title">Candidate Profile</span>   
          
          <div class="group">    
            <!-- Succession Position -->
            <div class="form-group">
              <label for="succession_position">Succession Position:</label>
              <input type="text" id="succession_position" name="succession_position" required>
            </div>
            <!-- Candidate Name -->
            <div class="form-group">
              <label for="candidate_name">Candidate Name:</label>
              <input type="text" id="candidate_name" name="candidate_name" required>
            </div>
            <!-- Current Position -->
            <div class="form-group">
              <label for="current_position">Current Position:</label>
              <input type="text" id="current_position" name="current_position" required>
            </div>
          </div>
        </div>
      </div>
      <!-- Candidate Demographics -->
      <div class="form">
        <div class="demographics candidate">
          <span class="title">Candidate Demographics</span>   
          <div class="group">    
            <!-- Address -->
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" id="address" name="address" required>
            </div>
            <!-- Age -->
            <div class="form-group">
              <label for="age">Age:</label>
              <input type="text" id="age" name="age" required>
            </div>
            <!-- Years of Service -->
            <div class="form-group">
              <label for="service">Years of Service:</label>
              <input type="text" id="service" name="service" required>
            </div>
            <!-- Readiness -->
            <div class="form-group">
              <label for="readiness">Readiness:</label>
              <select id="readiness" name="readiness" required>
                <option value="choose">Choose</option>
                <option value="Level A">Level A</option>
                <option value="Level B">Level B</option>
                <option value="Level C">Level C</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- Candidate Training -->
      <div class="form">
        <div class="training candidate">
          <span class="title">Candidate Training</span>   
          <div class="group">    
            <!-- Education -->
            <div class="form-group">
              <label for="education">Education:</label>
              <input type="text" id="education" name="education" required>
            </div>
            <!-- Work Experience -->
            <div class="form-group">
              <label for="experience">Work Experience:</label>
              <input type="text" id="experience" name="experience" required>
            </div>
          </div>
        </div>
      </div>
      <!-- Leadership Profile Assessment Gaps -->
      <div class="form">
        <div class="leadership assessment">
          <span class="title">Leadership Profile Assessment Gaps</span>   
          <div class="group">    
            <!-- Competency: Performance -->
            <div class="form-group">
              <label for="performance">Competency: Performance</label>
              <input type="text" id="performance" name="performance" required>
            </div>
            <!-- Character -->
            <div class="form-group">
              <label for="character">Character:</label>
              <input type="text" id="character" name="character" required>
            </div>
            <!-- Commitment -->
            <div class="form-group">
              <label for="commitment">Commitment:</label>
              <input type="text" id="commitment" name="commitment" required>
            </div>
          </div>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="buttons">
        <button type="submit" class="addBtn">
          <span class="btnText">Add Successor</span>
        </button>
        <button class="showBtn">
          <span class="BtnText">Show Successor List</span>
        </button>
      </div> 

      <!-- Successor List Container -->
      <div class="successor-container" style="display: none;">
        <div class="row mt-5">
          <div class="col">
            <div class="card mt-5">
              <div class="card-header">
                <h2 class="display-6" align="center">List of Successors</h2>
              </div>
              
              <table align="center" width="100%" class="successor-list">
                <thead>
                  <tr bgcolor="grey">
                    <th>Employee ID</th>
                    <th>Succession Position</th>
                    <th>Candidate Name</th>
                    <th>Current Position</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Years of Service</th>
                    <th>Readiness</th>
                    <th>Education</th>
                    <th>Work Experience</th>
                    <th>Competency: Performance</th>
                    <th>Character</th>
                    <th>Commitment</th>
                    <th>Action</th>                                   
                  </tr>

                  

                  <?php
                    // Check if $result is not null and has rows
                    if ($result->num_rows > 0) {
                        // Output table rows
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . $row["Employee_ID"] . "</td><td>" . $row["succession_position"] . "</td><td>" .
                            $row["candidate_name"] . "</td><td>" . $row["current_position"] . "</td><td>" .
                            $row["address"] . "</td><td>" . $row["age"] . "</td><td>" .
                            $row["service"] . "</td><td>" . $row["readiness"] . "</td><td>" . 
                            $row["education"] . "</td><td>" . $row["experience"] . "</td><td>" .
                            $row["performance"] . "</td><td>" . $row["character"] . "</td><td>" .
                            $row["commitment"] . "</td>
                            <td>
                            <button onclick='viewEmployee(" . $row["Employee_ID"] . ")'>View</button>" .
                            "<button onclick='updateEmployee(" . $row["Employee_ID"] . ")'>Update</button>" .
                            "<button onclick='deleteEmployee(" . $row["Employee_ID"] . ")'>Delete</button>
                            </td>
                            </tr>";
                        }
                    } else {
                    // Handle case when there are no results
                    echo "<tr><td colspan='15'>0 results</td></tr>";
                    }

                    // Close the database connection
                        $conn->close();
                    ?>


                    </table> 
                </div>
            </div>
        </div>
    </div>
</section> 
</form>


<div id="myModal" class="modal" style="display: none;">
    <div class="modal-content" style="margin: 15% auto; width: 50%;">
        <span class="close" onclick="closeModal()">×</span>
        <div id="modalContent"></div>
    </div>
</div>


<script>
function viewEmployee(Employee_ID) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("modalContent").innerHTML = this.responseText;
                document.getElementById("myModal").style.display = "block"; 
            } else {
                console.error("Error loading employee details:", this.status);
            }
        }
    };

    // Prevent default form submission behavior
    event.preventDefault(); // Add this line

    xhttp.open("GET", "view.php?Employee_ID=" + Employee_ID, true);
    xhttp.send();
}



function updateEmployee(Employee_ID) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("modalContent").innerHTML = this.responseText;
                document.getElementById("myModal").style.display = "block"; 
            } else {
                console.error("Error loading employee details:", this.status);
            }
        }
    };

    // Prevent default form submission behavior
    event.preventDefault(); // Add this line

    xhttp.open("GET", "update.php?Employee_ID=" + Employee_ID, true);
    xhttp.send();
}

function deleteEmployee(Employee_ID) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        console.log("Ready state:", xhttp.readyState);
        console.log("Status:", xhttp.status);
        if (xhttp.readyState == 4) {
            if (xhttp.status == 200) {
                console.log("Delete request successful");
                window.location.href = "form.php";
            } else {
                console.error("Error deleting record:", xhttp.status);
                // Handle error here, e.g., display an error message to the user
            }
        }
    };
    xhttp.open("GET", "delete.php?Employee_ID=" + Employee_ID, true);
    xhttp.send();
}



function closeModal() {
    document.getElementById("myModal").style.display = "none"; 
}
</script>





<script src="form.js"></script>
</body>
</html>