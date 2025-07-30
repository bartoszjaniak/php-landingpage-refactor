<?php

header('Content-Type: application/json');

// Akceptuj tylko POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

// Pobierz i sanityzuj dane
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Usuwanie potencjalnie niebezpiecznych znaków (FILTER_SANITIZE_STRING jest przestarzały)
$name = htmlspecialchars(strip_tags($name));
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(strip_tags($message));

// Walidacja
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
    exit;
}
if (mb_strlen($name) > 100 || mb_strlen($email) > 100 || mb_strlen($message) > 1000) {
    echo json_encode(['status' => 'error', 'message' => 'Input too long.']);
    exit;
}


// Przygotuj dane do zapisu
$submission = [
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'date' => date('Y-m-d H:i:s')
];

$file = __DIR__ . '/submissions.json';
if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data)) {
        $data = [];
    }
} else {
    $data = [];
}
$data[] = $submission;
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

$response = ['status' => 'success', 'message' => 'Thank you for submitting the form!'];
echo json_encode($response);