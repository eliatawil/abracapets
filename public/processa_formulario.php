<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elia20109029@gmail.com';
    $mail->Password = 'xzft echc igdi ssgb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom($_POST['email'], $_POST['nome']);
    $mail->addAddress('elia20109029@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Formulário de Adoção de Cão';

    $mensagem = '';
    foreach ($_POST as $key => $value) {
        $mensagem .= "<strong>{$key}:</strong> " . nl2br(htmlspecialchars($value)) . "<br>";
    }

    $mail->Body = $mensagem;

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo 'Erro ao enviar o formulário. Tente novamente mais tarde.';
}
?>
