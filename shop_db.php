<?PHP
  #----------------- ����Ÿ���̽� ���� -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
  session_start();
  #--------------- ���̵� ��й�ȣ�� �ùٸ��� Ȯ��  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	if($littlesamakfox_logon[2]>=5){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]-5;
	 $littlesamakfox_logon[4] = $littlesamakfox_logon[4]+1;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_iconslot='$littlesamakfox_logon[4]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
	 echo("
					<script>
					  window.alert('�������� ���� �Ϸ� �Ǿ����ϴ�');
					  history.go(-1);
					</script>
	 ");
	 exit;
	 }
	 else{
		echo("
					<script>
					  window.alert('���μ��� �����մϴ�');
					  history.go(-1);
					</script>
	 ");
	 exit;
	 }
  }
  else{
	echo("
					<script>
					  window.alert('�α����� �ʿ��մϴ�');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
  mysql_close($con);
  header("Location:/shop.php");
?>
