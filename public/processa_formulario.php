<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = "";

    foreach ($_POST as $campo => $valor) {
        if ($campo != "nome" && $campo != "email") {
            $mensagem .= ucfirst($campo) . ": " . htmlspecialchars($valor) . "\n\n";
        }
    }

    $mail = new PHPMailer(true);

    try {
        // Configurações SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'elia20109029@gmail.com'; // ✅ seu email
        $mail->Password = 'xzft echc igdi ssgb'; // ✅ senha do app, veja abaixo
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurações do remetente e destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress('elia201090@gmail.com', 'AbracaPets');

        // Conteúdo
        $mail->isHTML(false);
        $mail->Subject = "Nova solicitação de adoção";
        $mail->Body    = $mensagem;

        $mail->send();
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar o formulário. Tente novamente mais tarde.";
    }
}
?>
