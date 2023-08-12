<?php
header('Content-Type: application/json');


include('functions.php');
$conn = connectDatabase();


$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $projects[] = [
            'title' => $row['name'],
            'image' => $row['image'],
            'description' => $row['description'] ];
    }
}

echo json_encode($projects);


?>
