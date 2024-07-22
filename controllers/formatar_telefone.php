<?php
function formatarTelefone($numero)
{
    // Remover qualquer caractere que não seja dígito
    $numero = preg_replace('/\D/', '', $numero);

    // Verificar se o número tem pelo menos 10 dígitos
    if (strlen($numero) < 11) {
        return null;
    }

    // Se tiver mais de 11 dígitos, remover os primeiros dígitos exceto os 11 últimos
    if (strlen($numero) > 11) {
        $numero = substr($numero, -11);
    }

    // Formatar o número conforme o padrão (xx) xxxxx-xxxx
    $numeroFormatado = '(' . substr($numero, 0, 2) . ') ' . substr($numero, 2, 5) . '-' . substr($numero, 7, 4);

    return $numeroFormatado;
}
