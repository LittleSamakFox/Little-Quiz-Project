<?PHP
  session_start();
  include( "assets/functions.inc" );
  #------------------- 앞뒤 스페이스 제거 ----------------#
  $mem_id = trim( $mem_id);
  $mem_email = trim( $mem_email);
  $mem_password = trim( $mem_password );
  $mem_password2 = trim( $mem_password2 );

  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$mem_id  || !$mem_email  || !$mem_password)
  {
    echo("
					<script>
					  window.alert('입력값이 부족합니다.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #------------------ 비밀번호 차이 확인 이상유무 확인 ----------------#
  if( $mem_password != $mem_password2)
  {
    echo("
					<script>
					  window.alert('비밀번호를 다시 확인하세요.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }


  #------------------ 암호 encrpt ---------------------#
  $password = substr( md5( trim( $mem_password) ), 0, 10 );

  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
 
  #----------------- 테이블에 글 삽입 --------------------#
  $query = "insert into member_tab 
    (mem_id, mem_email, mem_password)
    values ('$mem_id', '$mem_email', '$mem_password')";

  mysql_query( $query, $con );
  mysql_close( $con );
  
  forward( "./login.php" );
?>
