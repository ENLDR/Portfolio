<?php
header('Content-Type: application/json');


include('functions.php');
$conn = connectDatabase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST["project_id"];
    $projectTitle = $_POST["project_title"];
    $projectDescription = $_POST["project_description"];
    $pimage = $_POST["image_url"];

    $sql = "INSERT INTO projects ( id, name, description, image) VALUES ($pid,'$projectTitle', '$projectDescription', '$pimage')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New project added successfully."]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}
?>
