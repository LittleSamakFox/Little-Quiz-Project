<?PHP
  #------------------- �յ� �����̽� ���� ----------------#
  $game_name = trim( $game_name );
  $game_answer = trim( $game_answer );
  $game_hint = trim( $game_hint );
  $game_hint2 = trim( $game_hint2 );
  $game_hint3 = trim( $game_hint3 );
  $game_article = trim( $game_article );
  $game_initial = trim( $game_initial );

  #------------------ �Է°� �̻����� Ȯ�� ----------------#
  if( !$game_name || !$game_answer || !$game_article || !$game_score || !$game_limit || ! $game_initial )
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
  if( $game_limit != 150 || $game_limit != 500 || $game_limit != 1000 )
  {
	echo("
					<script>
					  window.alert('����� �� �Ѱ� ���� �Է����ּ���.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #----------------- ���� �Է°� ���� �̻� Ȯ�� -----------#
  if( $game_score <0 )
  {
	echo("
					<script>
					  window.alert('�ּ� 0 �̻��� ������ �Է����ּ���.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #---------------- ����Ÿ���̽� ���� --------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

 
  #----------------- ���̺� �� ���� --------------------#
  if (trim($guserfile_name) == "" && trim($guserfile2_name) == ""){
		  $query = "update game set game_name='$game_name', game_score='$game_score', game_limit='$game_limit', game_hint='$game_hint', game_hint2='$game_hint2', game_hint3='$game_hint3', game_answer='$game_answer', game_article='$game_article', game_initial='$game_initial' where game_uid=$game_uid";
	      mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./game.php" );
   }
  else if (trim($guserfile_name) != "" && trim($guserfile2_name) == ""){
		  if (trim($old_image) != "") {
				$un_file = "./assets/img/game/" . $old_image;
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
	      $gsave_image = $name . "_" . $guserfile_name;
	      $file_exist = file_exists("./assets/img/game/$gsave_image");
	      if ($gfile_exist) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile, "./assets/img/game/$gsave_image")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
			exit;
	      }
		  $query = "update game set game_name='$game_name', game_score='$game_score', game_limit='$game_limit', game_hint='$game_hint', game_hint2='$game_hint2', game_hint3='$game_hint3', game_answer='$game_answer', guserfile='$gsave_image', game_article='$game_article', game_initial='$game_initial' where game_uid=$game_uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./game.php" );
  }
  else if (trim($guserfile_name) == "" && trim($guserfile2_name) != ""){
  		  if (trim($old_image2) != "") {
				$un_file = "./assets/img/game/" . $old_image2;
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
	      $gsave_image2 = $name . "_" . $guserfile2_name;
	      $file_exist2 = file_exists("./assets/img/game/$gsave_image2");
	      if ($gfile_exist2) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile2, "./assets/img/game/$gsave_image2")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile2)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	      exit;
	      }
		  $query = "update game set game_name='$game_name', game_score='$game_score', game_limit='$game_limit', game_hint='$game_hint', game_hint2='$game_hint2', game_hint3='$game_hint3', game_answer='$game_answer', guserfile2='$gsave_image2', game_article='$game_article', game_initial='$game_initial' where game_uid=$game_uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./game.php" );
  }
  else{
  		  if (trim($old_image) != "") {
				$un_file = "./assets/img/game/" . $old_image;
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
	      $gsave_image = $name . "_" . $guserfile_name;
	      $file_exist = file_exists("./assets/img/game/$gsave_image");
	      if ($gfile_exist) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile, "./assets/img/game/$gsave_image")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	      exit;
	      }
  		  if (trim($old_image2) != "") {
				$un_file2 = "./assets/img/game/" . $old_image2;
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
	      $gsave_image2 = $name . "_" . $guserfile2_name;
	      $file_exist2 = file_exists("./assets/img/game/$gsave_image2");
	      if ($gfile_exist2) {
	        echo("
					<script>
					  window.alert('�̹� �����ϴ� �����Դϴ�.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile2, "./assets/img/game/$gsave_image2")) {
	        echo("
					<script>
					  window.alert('���� ���忡 �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile2)) {
	        echo("
					<script>
					  window.alert('�ӽ� ���� ������ �����Ͽ����ϴ�.');
					  history.go(-1);
					</script>
			");
	      exit;
	      }
		  $query = "update game set game_name='$game_name', game_score='$game_score', game_limit='$game_limit', game_hint='$game_hint', game_hint2='$game_hint2', game_hint3='$game_hint3', game_answer='$game_answer', guserfile='$gsave_image', guserfile2='$gsave_image2', game_article='$game_article', game_initial='$game_initial' where game_uid=$game_uid";
		  mysql_query( $query, $con ) or die ( mysql_error() );
		  mysql_close( $con );
		  header( "Location:"."./game.php" );
  }
?>
