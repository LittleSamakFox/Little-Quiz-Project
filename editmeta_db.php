<?PHP
  #------------------- 앞뒤 스페이스 제거 ----------------#
  $meta_name = trim( $meta_name );
  $meta_article = trim( $meta_article );
  $meta_initial = trim( $meta_initial );

  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$meta_name || !$meta_article || !$meta_score || ! $meta_initial )
  {
    echo("
					<script>
					  window.alert('입력값이 부족합니다.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #----------------- 점수 입력값 범위 이상 확인 -----------#
  if( $meta_score <0 || $meta_score > 100)
  {
	echo("
					<script>
					  window.alert('0~100사이의 점수를 입력해주세요.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #---------------- 데이타베이스 연결 --------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

 
  #----------------- 테이블에 글 삽입 --------------------#
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
					  window.alert('기존 파일 삭제에 실패하였습니다.');
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
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($muserfile, "./assets/img/meta/$msave_image")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($muserfile)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
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