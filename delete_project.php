<?php
include('functions.php');
$conn = connectDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $projectId = $data["projectId"];

    $sql = "DELETE FROM projects WHERE id = $projectId";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Project deleted successfully."]);
    } else {
        echo json_encode(["error" => "Error deleting project: " . $conn->error]);
    }
}
?>
