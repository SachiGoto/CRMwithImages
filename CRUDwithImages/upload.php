<?php

require 'connect.php';

if ($_FILES['upfile']['size'] == 0) {
    die(" No File Selected ");
}

$pdo = new PDO(
    "mysql:host=" . dbhost . ";dbname=" . dbuser . ";charset=" . DB_CHARSET,
    DB_USER,
    DB_PASSWORD,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
);

$stmt = $pdo->prepare("INSERT INTO `upload` (`name`, `data`) VALUES (?, ?)");
try {
    $stmt->execute([$_FILES['upfile']['name'], file_get_contents($_FILES['upfile']['tmp_name'])]);
} catch (Exception $e) {
    echo " ERROR in uploading " . $e;
    die();
}
echo " Success ";