<?PHP
  #------------------- �յ� �����̽� ���� ----------------#
  $meta_name = trim( $meta_name );
  $meta_article = trim( $meta_article );
  $meta_initial = trim( $meta_initial );

  #------------------ �Է°� �̻����� Ȯ�� ----------------#
  if( !$meta_name || !$meta_article || !$meta_score || ! $meta_initial )
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

  #---------------- ����Ÿ���̽� ���� --------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

 
  #----------------- ���̺� �� ���� --------------------#
  if (trim($muserfile_name) == ""){
		  $query = "update meta set meta_name='$meta_name', meta_score='$meta_score', meta_article='$meta_article', meta_initial='$meta_initial' where meta_uid=$meta_uid";
	      mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./meta.php" );
   }
  else{
		  if (trim($old_image) != "") {
				$un_file = "./assets/img/meta/" . $old_image;
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
	      $msave_image = $name . "_" . $muserfile_name;
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
	      exit;
	      }
		  $query = "update meta set meta_name='$meta_name', meta_score='$meta_score', muserfile='$msave_image', meta_article='$meta_article', meta_initial='$meta_initial' where meta_uid=$meta_uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./meta.php" );
  }
?>