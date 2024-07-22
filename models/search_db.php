<?php
session_start(); // Iniciar a sessão se não estiver iniciada

include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = array();
    $search = $_POST['search']; // Corrigido para 'search'

    // Query SQL ajustada para selecionar o ID correto
    $sql = "SELECT id FROM clientes WHERE email = :search OR telefone = :search";

    try {
        // Preparar a declaração SQL usando o objeto de conexão PDO ($pdo)
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros com os valores do formulário
        $stmt->bindParam(':search', $search);

        // Executar a consulta
        $stmt->execute();

        // Buscar o ID encontrado
        $id = $stmt->fetchColumn(); // Assumindo que você espera apenas um ID

        if ($id) {
            $mensagem[] = "Cliente encontrado.";
            $_SESSION['mensagem'] = $mensagem;
            header("Location: ../views/editar.php?id=$id"); // Redirecionar para editar.php com o ID
            exit;
        } else {
            $mensagem[] = "Cliente não encontrado.";
            $_SESSION['mensagem'] = $mensagem;
            header('Location: ../index.php');
            exit;
        }
    } catch (PDOException $e) {
        $mensagem[] = "Erro ao buscar cliente." . $search;
        $_SESSION['mensagem'] = $mensagem;
        header('Location: ../index.php');
        exit;
    }
} else {
    $mensagem[] = "Erro ao receber o formulário de pesquisa de cliente.";
    $_SESSION['mensagem'] = $mensagem;
    header('Location: ../index.php');
    exit;
}
