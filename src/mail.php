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

    if (!isset($_REQUEST['company'])) {
        $message = 'Проверьте поле "Компания"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if (!isset($_REQUEST['message'])) {
        $message = 'Проверьте поле "Сообщение"';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if (!isset($_REQUEST['services'])) {
        $message = 'Проверьте поле "Услуги" (Должен быть выбран хотя бы один пункт)';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if (!isset($_REQUEST['budget'])) {
        $message = 'Проверьте поле "Бюджет" (Должен быть выбран хотя бы один пункт)';
        echo json_encode(['message' => $message, 'result' => $result]);
        return;
    }

    if ($_FILES && $_FILES['file']['error'] != UPLOAD_ERR_OK) {
        return;
    }


    $servicesFieldChoices = [
        'ux-analisys' => 'Ux-аналитика',
        'ux-research' => 'Ux-исследование',
        'interface-design' => 'Дизайн интерфейсов',
        'web-design-and-integration' => 'Веб-разработка и интеграции',
        'develop' => 'Разработка',
        'another' => 'Другое'
    ];

    $budgetFieldChoices = [
        'lt1m' => 'Менее 1 млн',
        '1-3m' => '1 - 3 млн',
        '3-5m' => '3 - 5 млн',
        '5-10m' => '5 - 10 млн',
        '10-15m' => '10-15млн',
        'lg15m' => ' Более 15 млн'
    ];


    $name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_REQUEST['phone'], FILTER_SANITIZE_STRING);
    $company = filter_var($_REQUEST['company'], FILTER_SANITIZE_STRING);
    $message = filter_var($_REQUEST['message'], FILTER_SANITIZE_STRING);
    $services = filter_var($_REQUEST['services'],FILTER_SANITIZE_STRING);
    $budget = filter_var($_REQUEST['message'], FILTER_SANITIZE_STRING);

    for ($i = 0; $i < count($services); $i++) {
        str_replace($services[$i], $servicesFieldChoices[$services[$i]], $services[$i]);
    }

    str_replace($budget, $budgetFieldChoices[$budget], $budget);


    ob_start();
    ?>
    <html>

    <head></head>

    <body>
        <p><strong>Имя и фамилия:</strong> <?= $name ?></p>
        <p><strong>Почта:</strong> <?= $email ?></p>
        <p><strong>Телефон:</strong> <?= $phone ?></p>
        <p><strong>Компания:</strong> <?= $company ?></p>
        <p><strong>Услуги:</strong><?= join($services, ", "); ?></p>
        <p><strong>Бюджет:</strong><?= $budget ?></p>
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

    if ($_FILES && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $mail->addAttachment($_FILES['file']['tmp_name']);
    }

    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->Username="dmitrytolma4iov@yandex.ru";
    $mail->Password="TiKudaLezesh";

    $result = $mail->send();
    unlink($_FILES['file']['tmp_name']);

} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}