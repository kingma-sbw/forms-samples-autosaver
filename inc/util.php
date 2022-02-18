<?php
declare(strict_types=1);
if( !isset($log_file) ) {
  $log_file = 'daten/data_%s.log';
}
/**
 * _log function for writing results or error messages
 * The function starts a new file every day and the name contains the current date.
 * Each line will contain date, level and message text
 *
 * @param string $mess The message to write
 * @param int $level the level that is reported
 * @return void
 */

const emerg=1;
const alert=2;
const crit=3;
const err=4;
const warning=5;
const notice=6;
const info=7;
const debug=8;
const none=9;

const level=3;

function _log( string $mess, int $level = 4 ):void {
  if($level<=level) return;

  $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,1)[0];

  global $log_file_handle;
  global $log_file;
  if( !$log_file_handle ) {
    $log_file_handle = fopen( sprintf($log_file, date("Ymd")), 'a' );
  }
  fprintf( $log_file_handle, "%s:%d %s;%s;%s\r" , $trace['file'],$trace['line'], (new \DateTime)-> format("Y-m-d H:i:s.u"), $level, $mess );
}