<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use Elementfani\MailGenerator\MailGenerator;

$config = require dirname(__FILE__) . '/../config/main.php';

$mailGenerator = new MailGenerator($config['txtSourceFile']);
$mail = $mailGenerator->generate();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Mail generator</title>
</head>
<body>
<div class="container mt-3">
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input
            class="form-control form-control-lg"
            type="text"
            readonly
            id="subject"
            value="<?= $mail['subject'] ?>"
            onclick="this.select(); navigator.clipboard.writeText(this.value);"
        />
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea
            class="form-control form-control-lg"
            readonly
            id="body"
            onclick="this.select(); navigator.clipboard.writeText(this.value);"
        ><?= $mail['body'] ?></textarea>
    </div>
    <div class="mb-3">
    <a class="btn btn-outline-primary btn-lg" onclick="location.reload(); return false;">Reload</a>
</div>
</body>
</html>