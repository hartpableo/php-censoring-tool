<?php

use HartPableo\PhpCensoringTool\Censor;

require __DIR__ . '/../vendor/autoload.php';

// Mock uncensored value
$body = file_get_contents(__DIR__ . '/test.html');
$censor = new Censor($body, 'test custom message');
$filteredBody = $censor->getCensoredText();

echo $filteredBody;