<?php
// Database connection
include "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST["team_name"], $_POST["team_position"], $_POST["team_number"], $_FILES["image"])) {
        $teamName = $_POST["team_name"];
        $teamPosition = $_POST["team_position"];
        $teamNumber = $_POST["team_number"];
        $image = $_FILES["image"]["tmp_name"];
        $imageContent = file_get_contents($image);
        $imageType = $_FILES["image"]["type"];

        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO team_members (team_name, team_position, team_number, image_content, image_type) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing SQL statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssss", $teamName, $teamPosition, $teamNumber, $imageContent, $imageType);

        // Execute statement
        $result = $stmt->execute();
        if ($result === false) {
            die("Error executing SQL statement: " . $stmt->error);
        }

        echo "Team member added successfully.";

        // Close statement
        $stmt->close();
    } else {
        // Display error message if required fields are not set
        echo "All fields are required.";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="team_name" placeholder="Name">
    <input type="text" name="team_position" placeholder="Position">
    <input type="text" name="team_number" placeholder="Number">
    <label for="image">Select Image:</label>
    <input type="file" name="image" id="image">
    <button type="submit" name="submit">Upload</button>
</form>