<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use Elementfani\MailGenerator\MailGenerator;

$config = require dirname(__FILE__) . '/../config/main.php';

$mailGenerator = new MailGenerator($config['txtSourceFile']);
$jsContent = file_get_contents($config['jsSourceFile']);

$mail = $mailGenerator->generate();

header('Content-Type: application/json');
echo json_encode($mail);