<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
// Dados para a conexão PostgreSQL
$uri = $_ENV['URI'];
try {
    // Conectar ao banco de dados PostgreSQL usando PDo

    // Conectar ao banco de dados PostgreSQL usando PDO
    $pdo = new PDO($uri);
    // Configuração de atributos do PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $uri . $e->getMessage());
}
