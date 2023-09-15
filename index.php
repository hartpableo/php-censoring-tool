<?php

require_once 'Censor.php';

$body = file_get_contents('test.html');
$censor = new Censor($body);
$filteredBody = $censor->getCensoredText();

echo $filteredBody;