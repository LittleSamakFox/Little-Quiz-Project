<?PHP
  session_start();
  include( "assets/functions.inc" );
  #------------------- �յ� �����̽� ���� ----------------#
  $mem_id = trim( $mem_id);
  $mem_email = trim( $mem_email);
  $mem_password = trim( $mem_password );
  $mem_password2 = trim( $mem_password2 );

  #------------------ �Է°� �̻����� Ȯ�� ----------------#
  if( !$mem_id  || !$mem_email  || !$mem_password)
  {
    echo("
					<script>
					  window.alert('�Է°��� �����մϴ�.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #------------------ ��й�ȣ ���� Ȯ�� �̻����� Ȯ�� ----------------#
  if( $mem_password != $mem_password2)
  {
    echo("
					<script>
					  window.alert('��й�ȣ�� �ٽ� Ȯ���ϼ���.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }


  #------------------ ��ȣ encrpt ---------------------#
  $password = substr( md5( trim( $mem_password) ), 0, 10 );

  #----------------- ����Ÿ���̽� ���� -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
 
  #----------------- ���̺� �� ���� --------------------#
  $query = "insert into member_tab 
    (mem_id, mem_email, mem_password)
    values ('$mem_id', '$mem_email', '$mem_password')";

  mysql_query( $query, $con );
  mysql_close( $con );
  
  forward( "./login.php" );
?>
