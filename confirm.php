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
_log('connect');
$db = new \PDO("mysql:dbname=test", 'test', 'test',
  [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
_log('prepare');
$stmt = $db-> prepare("select * from `form-test` where test_ID!=". $db->quote($_GET['id']) );
_log('execute');
$stmt-> execute();
_log('fetch');
$obj = $stmt-> fetchObject('test');

?>
<a href='/'>Back</a>