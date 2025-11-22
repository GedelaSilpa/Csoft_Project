<?php
$host = '127.0.0.1';
$db   = 'chandusoft_site';
$user = 'chandusoft_user';
$pass = 'SecretP@ss123';
$charset = 'utf8mb4';

// 🔹 PayPal Sandbox Credentials
$config = [
    'paypal' => [
        'client_id' => "AeMhb8ACVoPBMrfxnmZhUap9eIOAppJe71IAqOvxDuiuXMQwuWk_FUHCQOlCGmDsH9yt0-372L0axs0r",
        'secret'    => "EL0f-NdTLIsXP8ZcVJIrPJhwew9ec9WrIA3eiTGHvOAieoeR7O-4SMlXjE8W2Y2CAjBEv5s0bbKW4GTA",
        'base_url'  => 'https://api-m.sandbox.paypal.com'
    ]
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("❌ DB Connection failed: " . $e->getMessage());
}
