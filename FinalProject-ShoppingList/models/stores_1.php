
<?php
header("Content-Type: application/json");
include 'database.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($database);
        break;
    case 'POST':
        handlePost($database, $input);
        break;
    case 'PUT':
        handlePut($database, $input);
        break;
    case 'DELETE':
        handleDelete($database, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handleGet($database) {
    $sql = "SELECT * FROM stores";
    $statement = $database->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function handlePost($database, $input) {
    $sql = "INSERT INTO stores (name) VALUES (:name)";
    $statement = $database->prepare($sql);
    $statement->execute(['name' => $input['name']]);
    echo json_encode(['message' => 'Store created successfully']);
}

function handlePut($database, $input) {
    $sql = "UPDATE stores SET name = :name WHERE id = :id";
    $statement = $database->prepare($sql);
    $statement->execute(['name' => $input['name']]);
    echo json_encode(['message' => 'Store updated successfully']);
}

function handleDelete($database, $input) {
    $sql = "DELETE FROM stores WHERE id = :id";
    $statement = $database->prepare($sql);
    $statement->execute(['id' => $input['id']]);
    echo json_encode(['message' => 'Store deleted successfully']);
}
?>
