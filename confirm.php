<?php

require_once './inc/util.php';
class test {
  public function __set($key, $value) {
    switch($key) {
      default:
        $this-> $key = $value;
        break;
      case 'birthday':
        $this-> $key = new \DateTime($value);
        break;
      case 'farbe':
        $this-> $key = '#'.dechex($value);
    }
  }
}
_log('prepare', trace);
$stmt = $db-> prepare("select * from `form-test` where test_ID=". $db->quote($_GET['id']) );
_log('execute', trace);
$stmt-> execute();

try {
  _log('fetch', trace);
  $obj = $stmt-> fetchObject('test');
  if( !$obj ) {
    _log('not found: '. $_GET['id'], err);
  }
} catch ( \Exception $e ) {
  _log('fail to retrieve:' . $stmt->errorInfo()[2], err);
}
?><!DOCTYPE html>-
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="scripts/autosave-form.js" defer></script>
	<link rel="stylesheet" href="styles/style.css">
	<title>Form Fetch</title>
	<style>

	</style>
</head>
<body>
  <?php if($obj) : ?>
		<form id="mainForm" action="save.php?action=save" method="post">
			<header><h2>Anmeldung</h2></header>
			<label for="name">Name</label>
			<input readonly value="<?=$obj-> name?>" id="name" type="text" name="name" title="Kompletter Name einfügen" >
			
			<label for="email">E-Mail</label>
			<input readonly value="<?=$obj-> email?>" id="email" type="email" name="email" title="Email-Addresse haben einen @ und mindestens ein ."">
			
			<label for="birthday">Geburtstag</label>
			<input readonly value="<?=$obj-> birthday-> format('Y-m-d')?>" id="birthday" type="date" name="birthday" title="Geburtsdatum">

			<label for="farbe">Favourite Farbe</label>
			<input readonly value="<?=$obj-> farbe?>" id="farbe" type="color" name="farbe">

			<label for="lang">Lieblingssprache</label>
			<input readonly value="<?=$obj-> sprache?>" id="lang" type="input" name="lang">

  <?php else : ?>
  <p>keine Resultate</p>
  <?php endif; ?>
<a href='/'>Back</a>
</body>