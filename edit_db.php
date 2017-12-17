<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #---------------- 앞뒤 스페이스 제거 -------------------#;
  $name = trim( $name );
  $subject = trim( $subject );
  $article = trim( $article );

  #---------------- 입력값 이상유무 확인 ------------------#
  if( !$subject || !$passwd || !$article )
  {
    echo("
					<script>
					  window.alert('입력값이 부족합니다.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #---------------- 데이타베이스 연결 --------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

  #--------------- 암호가 올바른지 확인  -------------------#
  $query = "select passwd from thread where uid=$uid";
  $result = mysql_query( $query, $con ) or die ( mysql_error() );
  $origin_passwd = current( mysql_fetch_array( $result ) );
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );
  
  if ( $passwd != $origin_passwd )
  {
    echo("
					<script>
					  window.alert('암호가 올바르지 않습니다');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
 
  #----------------- 테이블에 글 삽입 --------------------#
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
					  window.alert('기존 파일 삭제에 실패하였습니다.');
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
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile, "./assets/img/thread/$save_image")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
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
					  window.alert('기존 파일 삭제에 실패하였습니다.');
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
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile2, "./assets/img/thread/$save_image2")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile2)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
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
					  window.alert('기존 파일 삭제에 실패하였습니다.');
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
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile, "./assets/img/thread/$save_image")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
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
					  window.alert('기존 파일 삭제에 실패하였습니다.');
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
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($userfile2, "./assets/img/thread/$save_image2")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($userfile2)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
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
