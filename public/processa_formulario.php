<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $para = "elia201090@gmail.com";
    $assunto = "Nova solicitação de adoção de cão";

    $mensagem = "Formulário de Adoção:\n\n";
    $mensagem .= "Nome: " . $_POST["nome"] . "\n";
    $mensagem .= "E-mail: " . $_POST["email"] . "\n\n";

    $mensagem .= "1. Moradia: " . $_POST["moradia"] . "\n";
    $mensagem .= "2. Idade: " . $_POST["idade"] . "\n";
    $mensagem .= "3. Mora com quem / Endereço: " . $_POST["moradores_endereco"] . "\n";
    $mensagem .= "4. Crianças (idades): " . $_POST["criancas_idade"] . "\n";
    $mensagem .= "5. Outros animais: " . $_POST["outros_animais"] . "\n";
    $mensagem .= "6. Rotina do lar: " . $_POST["rotina"] . "\n";
    $mensagem .= "7. Perda de animal recente: " . $_POST["perda_animal"] . "\n";
    $mensagem .= "8. Condições financeiras: " . $_POST["condicoes_financeiras"] . "\n";
    $mensagem .= "9. Comportamento diante de bagunça: " . $_POST["comportamento"] . "\n";
    $mensagem .= "10. Mordida em criança: " . $_POST["mordida_crianca"] . "\n";
    $mensagem .= "11. Mudança e plano com animal: " . $_POST["mudanca"] . "\n";
    $mensagem .= "12. Motivação para adoção: " . $_POST["motivacao"] . "\n";

    $headers = "From: formulario@seudominio.com\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";

    if (mail($para, $assunto, $mensagem, $headers)) {
        echo "Formulário enviado com sucesso! Obrigado por se candidatar à adoção.";
    } else {
        echo "Erro ao enviar o formulário. Tente novamente mais tarde.";
    }
} else {
    echo "Método de envio inválido.";
}
?>
