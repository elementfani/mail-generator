<?php

$sourceFile = dirname(__FILE__) . '/source.txt';
$sourceFileContent = file_get_contents($sourceFile);
$sourceFileContent = str_replace("\n", ' ', $sourceFileContent);
$sentences = explode('.', $sourceFileContent);
foreach ($sentences as &$sentence) {
    $sentence = trim($sentence) . '.';
}

$subject = $sentences[rand(0, count($sentences) - 1)];
$subject = substr($subject, 0, 75);
$subjectWords = explode(' ', $subject);
unset($subjectWords[count($subjectWords) - 1]);
$subject = implode(' ', $subjectWords);

$bodyRand = rand(0, count($sentences) - 1);
$bodySentences = array_splice($sentences, $bodyRand, 3);
$body = implode(' ', $bodySentences);

header('Content-Type: application/json');
echo json_encode(['subject' => $subject, 'body' => $body]);