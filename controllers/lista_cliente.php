<?php
$sql = "SELECT * FROM cliente";
// Preparar a consulta
$stmt = $pdo->prepare($sql);

// Executar a consulta
$stmt->execute();

// Obter todos os resultados em um array associativo
$clientes = $stmt->fetchAll();
