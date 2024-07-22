<?php
include_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem = array();
    $id = $_POST['id'];

    // Query SQL para deletar cliente
    $sql = "DELETE FROM cliente WHERE id = :id";
    // Preparar a declaração SQL usando o objeto de conexão PDO ($conn)
    $stmt = $pdo->prepare($sql);

    // Bind dos parâmetros com os valores do formulário
    $stmt->bindParam(':id', $id);

    // Executar a inserção
    try {
        $stmt->execute();
        $mensagem[] = "Cliente removido.";
        $_SESSION['mensagem'] = $mensagem;
        header('Location: ../index.php');
        exit;
    } catch (PDOException $e) {
        $mensagem[] = "Erro ao deletar cliente: ";
        $_SESSION['mensagem'] = $mensagem;
        header('Location: ../index.php');
        exit;
    }
} else {
    $mensagem[] = "Erro ao receber o formulário de exclusão de cliente.";
    $_SESSION['mensagem'] = $mensagem;
    header('Location: ../index.php');
    exit;
}
