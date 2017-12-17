<?PHP
 include( "assets/config.cfg" );
 include( "assets/functions.inc" );
  #------------------- 앞뒤 스페이스 제거 ----------------#
  $reply_name = trim( $reply_name );

  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$reply_name || !$reply_password || !$reply_article)
  {
    echo("
					<script>
					  window.alert('입력값이 부족합니다.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
  
  #------------------ 암호 encrpt ---------------------#
  $reply_password = substr( md5( trim( $reply_password ) ), 0, 10 );

  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
 
  #----------------- 테이블에 글 삽입  및 uid page 삽입--------------------#
  $savepage=$page;
  $saveuid=$uid;

  $query = "insert into reply_thread 
    ( reply_name, reply_password, reply_article, reply_savepage, reply_saveuid) 
    values ( '$reply_name', '$reply_password', '$reply_article', '$savepage', '$saveuid')";
  mysql_query( $query, $con );
  

  #--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
  session_start();
  if (session_is_registered('littlesamakfox_logon')){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]+1;
	 $littlesamakfox_logon[3] = $littlesamakfox_logon[3]+1;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
  }
  mysql_close($con);
  forward( dest_url( "./read.php", $savepage, $saveuid ) );
?>