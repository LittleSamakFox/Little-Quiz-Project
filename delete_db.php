<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #--------------- ����Ÿ���̽� ���� ---------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

  #---------------- ��ȣ�� �ùٸ��� Ȯ��  ------------------#
  $query = "select passwd, gid, depth from thread where uid=$uid";
  $result = mysql_query( $query) or die ( mysql_error() );
  list( $origin_passwd, $gid, $depth ) = mysql_fetch_array( $result );
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );
  if ( $passwd != $origin_passwd )
  {
    echo("
					<script>
					  window.alert('��ȣ�� �ùٸ��� �ʽ��ϴ�.');
					  history.go(-1);
					</script>
	 ");
    exit;
  }

  #----------------- ���̺� �� ���� --------------------#
  $query = "delete from thread where gid=$gid and depth like '$depth%'";
  mysql_query( $query) or die ( mysql_error() );
  mysql_close( $con );
  
  forward( dest_url( "./thread.php", $page ) );
?>
