<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #---------------- �յ� �����̽� ���� -------------------#;
  $name = trim( $name );
  $subject = trim( $subject );
  $article = trim( $article );

  #---------------- �Է°� �̻����� Ȯ�� ------------------#
  if( !$subject || !$passwd || !$article )
  {
    echo("
					<script>
					  window.alert('�Է°��� �����մϴ�.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #---------------- ����Ÿ���̽� ���� --------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

  #--------------- ��ȣ�� �ùٸ��� Ȯ��  -------------------#
  $query = "select passwd from thread where uid=$uid";
  $result = mysql_query( $query, $con ) or die ( mysql_error() );
  $origin_passwd = current( mysql_fetch_array( $result ) );
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );
  
  if ( $passwd != $origin_passwd )
  {
    echo("
					<script>
					  window.alert('��ȣ�� �ùٸ��� �ʽ��ϴ�');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
 
  #----------------- ���̺� �� ���� --------------------#
  if (trim($userfile_name) == "" && trim($userfile2_name) == ""){
	      $query = "update thread set subject='$subject', article='$article' where uid=$uid";
	      mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  forward( dest_url( "./thread.php", $page ) );
   }
  else if (trim($userfile_name) != "" && trim($userfile2_name) == ""){
		  if (trim($old_image) != "") {
				$un_file = "./assets/img/thread/" . $old_image;
				if (!unlink($un_file)) {
				   echo("
					<script>
					  window.alert('���� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
					");
				  exit;
				}
		  }
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
		  $query = "update thread set subject='$subject', article='$article', userfile='$save_image' where uid=$uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  forward( dest_url( "./thread.php", $page ) );
  }
  else if (trim($userfile_name) == "" && trim($userfile2_name) != ""){
  		  if (trim($old_image2) != "") {
				$un_file = "./assets/img/thread/" . $old_image2;
				if (!unlink($un_file)) {
				   echo("
					<script>
					  window.alert('���� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
					");
				  exit;
				}
		  }
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
		  $query = "update thread set subject='$subject', article='$article', userfile2='$save_image2' where uid=$uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  forward( dest_url( "./thread.php", $page ) );
  }
  else{
  		  if (trim($old_image) != "") {
				$un_file = "./assets/img/thread/" . $old_image;
				if (!unlink($un_file)) {
				   echo("
					<script>
					  window.alert('���� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
					");
				  exit;
				}
		  }
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
  		  if (trim($old_image2) != "") {
				$un_file2 = "./assets/img/thread/" . $old_image2;
				if (!unlink($un_file2)) {
				   echo("
					<script>
					  window.alert('���� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
					");
				  exit;
				}
		  }
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
		  $query = "update thread set subject='$subject', article='$article', userfile='$save_image', userfile2='$save_image2' where uid=$uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  forward( dest_url( "./thread.php", $page ) );
  }
?>
