<?php

$mailSender = 'semzavod@xn--80aegbamnwkale2a.xn--p1ai';
$mailRecipient = 'knyazew.sv@gmail.com';

$boundary = uniqid('np');
$headers = 'From: ' . $mailSender  . PHP_EOL .
             'Reply-To: ' . $mailSender  . PHP_EOL .
             'MIME-Version: 1.0' . PHP_EOL .
             "Content-Type: multipart/alternative;boundary=" . $boundary . PHP_EOL;

// Создаем текст сообщения, включающий все предыдущие переменные
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comment = $_POST['message'];

$messageBody = "This is a MIME encoded message.";
$messageBody .= "\r\n\r\n--" . $boundary . "\r\n";
$messageBody .= "Content-type: text/plain;charset=utf-8\r\n\r\n";


//Plain text body
$messageBody .= "Заявка с сайта семеннойзавод.рф\n";
$messageBody .= "Имя: $name\n";
$messageBody .= "Телефон: $phone\n";
$messageBody .= "Email: $email\n";
$messageBody .= "Сообщение: $comment\n";
$messageBody .= "\r\n\r\n--" . $boundary . "--";

// mail($mailRecipient, "TEST mail", $messageBody);

  
    if (mail($mailRecipient, "Заявка с сайта", $messageBody, $headers, '-f '.$mailSender)) {
        echo "php_mail: Отправлено";
    } else {
        echo "php_mail: Ошибка, проверьте правильность введенных данных";
    }

?>
