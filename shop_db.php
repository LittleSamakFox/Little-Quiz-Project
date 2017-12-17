<?PHP
  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
  session_start();
  #--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	if($littlesamakfox_logon[2]>=5){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]-5;
	 $littlesamakfox_logon[4] = $littlesamakfox_logon[4]+1;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_iconslot='$littlesamakfox_logon[4]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
	 echo("
					<script>
					  window.alert('아이콘이 구매 완료 되었습니다');
					  history.go(-1);
					</script>
	 ");
	 exit;
	 }
	 else{
		echo("
					<script>
					  window.alert('코인수가 부족합니다');
					  history.go(-1);
					</script>
	 ");
	 exit;
	 }
  }
  else{
	echo("
					<script>
					  window.alert('로그인이 필요합니다');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
  mysql_close($con);
  header("Location:/shop.php");
?>
