<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #--------------- 데이타베이스 연결 ---------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

  #---------------- 암호가 올바른지 확인  ------------------#
  $query = "select passwd, gid, depth from thread where uid=$uid";
  $result = mysql_query( $query) or die ( mysql_error() );
  list( $origin_passwd, $gid, $depth ) = mysql_fetch_array( $result );
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );
  if ( $passwd != $origin_passwd )
  {
    echo("
					<script>
					  window.alert('암호가 올바르지 않습니다.');
					  history.go(-1);
					</script>
	 ");
    exit;
  }

  #----------------- 테이블에 글 삭제 --------------------#
  $query = "delete from thread where gid=$gid and depth like '$depth%'";
  mysql_query( $query) or die ( mysql_error() );
  mysql_close( $con );
  
  forward( dest_url( "./thread.php", $page ) );
?>
