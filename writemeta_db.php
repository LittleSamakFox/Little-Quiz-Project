<?PHP
  #------------------- �յ� �����̽� ���� ----------------#
  $meta_name = trim( $meta_name );
  $meta_article = trim( $meta_article );
  $meta_initial = trim( $meta_initial );
  #------------------ �Է°� �̻����� Ȯ�� ----------------#
  if( !$meta_name || !$meta_article || !$meta_score || ! $meta_initial || ! $muserfile )
  {
    echo("
					<script>
					  window.alert('�Է°��� �����մϴ�.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #----------------- ���� �Է°� ���� �̻� Ȯ�� -----------#
  if( $meta_score <0 || $meta_score > 100)
  {
	echo("
					<script>
					  window.alert('0~100������ ������ �Է����ּ���.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #----------------- ����Ÿ���̽� ���� -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

#-----��ǰ�� �̹����� �ִ����� Ȯ���մϴ�-----#
	    if($muserfile_name)
	    {
	      $msave_image = $meta_initial . "_" . $muserfile_name;
	      $mfile_exist = file_exists("./assets/img/meta/$msave_image");
	      if ($mfile_exist) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($muserfile, "./assets/img/meta/$msave_image")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($muserfile)) {
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

  $query = "insert into meta 
    ( meta_name, meta_score, muserfile, meta_article, meta_initial ) 
    values ( '$meta_name', '$meta_score', '$msave_image', '$meta_article', '$meta_initial' )";

  mysql_query( $query, $con );
  
  session_start();
  #--------------- ���̵� ��й�ȣ�� �ùٸ��� Ȯ��  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]+100;
	 $littlesamakfox_logon[3] = $littlesamakfox_logon[3]+100;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
  }
  mysql_close($con);
  header( "Location:"."./meta.php" );

?>
