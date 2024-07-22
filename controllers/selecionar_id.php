<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE id=$id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $cliente = $stmt->fetch();
    if (!$cliente) {
        session_start();
        $_SESSION['mensagem'] = array('Cliente não encontrado');
        header('Location: ../index.php');
    };
};
