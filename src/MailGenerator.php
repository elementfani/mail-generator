<?php

namespace Elementfani\MailGenerator;

class MailGenerator
{
    private string $txtSourceFile;

    public function __construct(string $txtSourceFile)
    {
        $this->txtSourceFile = $txtSourceFile;
    }

    public function generate(): array
    {
        $sourceFileContent = file_get_contents($this->txtSourceFile);
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

        return ['subject' => $subject, 'body' => $body];
    }
}
