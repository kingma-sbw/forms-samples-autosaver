<?php
require_once './inc/util.php';
_log('try to save');
_log('connect');
$db = new \PDO("mysql:dbname=test", 'test', 'test', []);

_log('prepare');
/** @var PDOStatement $stmt */
$stmt = $db-> prepare("
insert into `form-test` (`name`, `email`, `birthday`, `farbe`, `sprache`)
values ( :name, :email, :birthday, :farbe, :sprache );
");

_log('bind');
$stmt->bindValue( ':name', $_POST['name'] );
$stmt->bindValue( ':email', $_POST['email'] );
$stmt->bindValue( ':birthday', $_POST['birthday'] );
$stmt->bindValue( ':farbe', hexdec($_POST['farbe']) );
$stmt->bindValue( ':sprache', $_POST['lang'] );

_log('execute');
if( @$stmt-> execute() ) {
  _log('saved');
  header("Location: /confirm.php?id={$db->lastInsertId()}");
} else {
  _log('fail to save:' . $stmt->errorInfo()[2]);
   header("Location: /?{$stmt->errorCode()}");
}