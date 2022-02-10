<?php
require_once './inc/util.php';
_log('try to save');
_log( $_GET['action'] . "; daten: " . implode( "|", $_POST ) );

echo 'gespeichert: ' . $_POST['name'] . '<br>';
echo "<a href='./'>Zurück</a>";

_log('saved');