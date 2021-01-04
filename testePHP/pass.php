<?php

/*$dom = new DOMDocument();
$dom->loadHTMLFile('testes.html');
$element = $dom->createEntityReference('teste');
$dom->appendChild($element);
echo $dom->saveHTML();*/

$pass = password_hash('123', PASSWORD_DEFAULT);
echo $pass;
