<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #------------------- �յ� �����̽� ���� ----------------#
  $name = trim( $name );
  $subject = trim( $subject );
  $writedate = date( "y-m-d" ); 
  $article = trim( $article );

  #------------------ �Է°� �̻����� Ȯ�� ----------------#
  if( !$name || !$subject || !$passwd || !$article )
  {
    echo("
					<script>
					  window.alert('�Է°��� �����մϴ�.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
  
  #------------------ ��ȣ encrpt ---------------------#
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );

  #----------------- ����Ÿ���̽� ���� -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
  #---------------- uid, gid, depth ���� -------------------#
  $query = "select MAX( gid ) as gid from thread"; 
  $result = mysql_query( $query, $con ); 
  $gid = current(mysql_fetch_array( $result ));
  $gid = $gid + 1;
 
 #-----��ǰ�� �̹����� �ִ����� Ȯ���մϴ�-----#
	    if($userfile_name)
	    {
	      $save_image = $name . "_" . $userfile_name;
	      $file_exist = file_exists("./assets/img/thread/$save_image");
	      if ($file_exist) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile, "./assets/img/thread/$save_image")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
			exit;
	      }
	    }
		if($userfile2_name)
	    {
	      $save_image2 = $name . "_" . $userfile2_name;
	      $file_exist2 = file_exists("./assets/img/thread/$save_image2");
	      if ($file_exist2) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile2, "./assets/img/thread/$save_image2")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile2)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
			exit;
	      }
	    }

  #----------------- ���̺� �� ���� --------------------#

  $query = "insert into thread 
    ( gid, name, passwd, subject, userfile, userfile2, article, writedate ) 
    values ( $gid, '$name', '$passwd', '$subject', '$save_image', '$save_image2', '$article', '$writedate' )";

  mysql_query( $query, $con );
  
  session_start();
  #--------------- ���̵� ��й�ȣ�� �ùٸ��� Ȯ��  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]+3;
	 $littlesamakfox_logon[3] = $littlesamakfox_logon[3]+3;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
  }
  mysql_close($con);
  forward( "./thread.php" );

?>
