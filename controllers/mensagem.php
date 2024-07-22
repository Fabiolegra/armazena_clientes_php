<?php
session_start();

// Verificar se $_SESSION['mensagem'] está definida e não vazia
if (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])) :
    $mensagem = $_SESSION['mensagem'];
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mensagemHtml = '<?php
                                foreach ($mensagem as $msg) {
                                    echo htmlspecialchars($msg) . '<br>';
                                }
                                ?>';

            M.toast({
                html: mensagemHtml
            });
        });
    </script>
<?php
    // Limpar a variável de sessão após exibir as mensagens
    unset($_SESSION['mensagem']);
endif;
?>