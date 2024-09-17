<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set("display_errors", true);
require 'vendor/autoload.php';

$message = '';
$result = false;

try 
{

    if (!isset($_REQUEST['name'])) {
        $message = 'Проверьте поле "Имя и Фамилия"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if (!isset($_REQUEST['email'])) {
        $message = 'Проверьте поле "email"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if (!isset($_REQUEST['phone'])) {
        $message = 'Проверьте поле "Телефон"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    

    if (!isset($_REQUEST['message'])) {
        $message = 'Проверьте поле "Сообщение"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if ($_FILES && $_FILES['file']['error'] != UPLOAD_ERR_OK) {
        return;
    }



    $name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_REQUEST['phone'], FILTER_SANITIZE_STRING);
    $message = filter_var($_REQUEST['message'], FILTER_SANITIZE_STRING);

    ob_start();
    ?>
    <html>

    <head></head>

    <body>
        <p><strong>Имя и фамилия:</strong> <?= $name ?></p>
        <p><strong>Почта:</strong> <?= $email ?></p>
        <p><strong>Телефон:</strong> <?= $phone ?></p>
        <p><strong>Сообщение:</strong>
            <?php echo $message; ?>
        </p>

    </body>

    </html>
    <?php

    $body_content = ob_get_clean();

    $mail = new PHPMailer(true);
    $mail->setFrom('robot@quanberri.com', 'robot');
    $mail->addAddress('dmitrit.dev@gmail.com');
    $mail->Subject = 'Новый клиент';
    $mail->Body = $body_content;
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->Username="dmitrytolma4iov@yandex.ru";
    $mail->Password="TiKudaLezesh";

    if ($_FILES && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['file']['tmp_name']);
    }

    $result = $mail->send();
    unlink($_FILES['file']['tmp_name']);

} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}