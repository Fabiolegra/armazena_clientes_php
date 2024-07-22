<?php
include_once 'formatar_telefone.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erros = array();
    if (formatarTelefone($_POST['telefone']) == null) :
        $erros[] = 'TELEFONE INVÁLIDO';
    endif;
    // Validar email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'EMAIL INVÁLIDO';
    };
    session_start();
    $_SESSION['mensagem'] = $erros;
    // Verificar se houve erros
    if (!empty($erros)) {
        header('Location: ../views/adicionar.php');
    } else {
        // Se não houver erros, redirecionar para add_bd.php passando os dados via sessão ou query string
        session_start();
        $telefone_refatorado = formatarTelefone($_POST['telefone']);
        $_SESSION['cliente'] = array($_POST, $telefone_refatorado); // Armazenar os dados do formulário na sessão
        header('Location: ../models/add_db.php');
        exit;
    }
}
