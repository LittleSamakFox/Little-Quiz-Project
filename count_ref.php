<?PHP
  include( "assets/functions.inc" );
  
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
  $query = "update thread set refnum=refnum+1 where uid=$uid";
  mysql_query( $query) or die ( mysql_error() );
  mysql_close( $con );
  
  forward( dest_url( "./read.php", $page, $uid ) );
?>
