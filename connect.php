<?php
// connect.php
$host = getenv('DB_HOST');    // Example: Your Railway database host or PlanetScale host
$db   = getenv('DB_NAME');    // Your database name
$user = getenv('DB_USER');    // Your database username
$pass = getenv('DB_PASS');    // Your database password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::ATTR_EMULATE_PREPARES => false,
];

try {
   $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
   throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
