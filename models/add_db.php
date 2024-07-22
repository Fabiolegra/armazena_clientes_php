<?php

include_once 'config.php';
// Processar os dados do formulário que foram passados via sessão
session_start();
if (isset($_SESSION['cliente'])) {
    $mensagem = array();
    $cliente = $_SESSION['cliente'];

    // Captura dos dados do formulário
    $nome = $cliente[0]['nome'];
    $sobrenome = $cliente[0]['sobrenome'];
    $email = $cliente[0]['email'];
    $telefone = $cliente[1];

    // Query SQL para inserir os dados na tabela cliente
    $sql = "INSERT INTO cliente (nome, sobrenome, email, telefone)
            VALUES (:nome, :sobrenome, :email, :telefone)";

    // Preparar a declaração SQL usando o objeto de conexão PDO ($conn)
    $stmt = $pdo->prepare($sql);

    // Bind dos parâmetros com os valores do formulário
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);

    // Executar a inserção
    try {
        $stmt->execute();
        unset($_SESSION['cliente']); // Limpar os dados da sessão após a inserção
        $mensagem[] = "Cliente adicionado com sucesso.";
        $_SESSION['mensagem'] = $mensagem;
        header('Location: ../index.php');
        exit; // Importante sair após redirecionar
    } catch (PDOException $e) {
        $mensagem[] = "Erro ao adicionar cliente.";
        $_SESSION['mensagem'] = $mensagem;
        header('Location: ../views/adicionar.php');
        exit; // Importante sair após redirecionar
    }
} else {
    $mensagem[] = "Erro ao receber o formulário cliente.";
    $_SESSION['mensagem'] = $mensagem;
    header('Location: ../views/adicionar.php');
    exit; // Importante sair após redirecionar
}
