<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use Elementfani\MailGenerator\MailGenerator;

$config = require dirname(__FILE__) . '/../config/main.php';

$mailGenerator = new MailGenerator($config['txtSourceFile']);
$jsContent = file_get_contents($config['jsSourceFile']);

$mail = $mailGenerator->generate();
$jsContent = strtr(
    $jsContent,
    [
        '{SUBJECT}' => $mail['subject'],
        '{BODY}' => $mail['body'],
    ]
);

header('Content-Type: application/javascript');
echo $jsContent;