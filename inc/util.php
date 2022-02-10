<?php
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
function _log( $mess, $level = 'i' ) {
  global $log_file_handle;
  global $log_file;
  if( !$log_file_handle ) {
    $log_file_handle = fopen( sprintf($log_file, date("Ymd")), 'a' );
  }
  fprintf( $log_file_handle, "%s;%s;%s\r" , date("Y-m-d H:i:s"), $level, $mess );
}