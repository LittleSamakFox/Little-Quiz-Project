<?PHP
  #------------------- 앞뒤 스페이스 제거 ----------------#
  $meta_name = trim( $meta_name );
  $meta_article = trim( $meta_article );
  $meta_initial = trim( $meta_initial );
  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$meta_name || !$meta_article || !$meta_score || ! $meta_initial || ! $muserfile )
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

  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

#-----상품의 이미지가 있는지를 확인합니다-----#
	    if($muserfile_name)
	    {
	      $msave_image = $meta_initial . "_" . $muserfile_name;
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
	      }
	    }

  #----------------- 테이블에 글 삽입 --------------------#

  $query = "insert into meta 
    ( meta_name, meta_score, muserfile, meta_article, meta_initial ) 
    values ( '$meta_name', '$meta_score', '$msave_image', '$meta_article', '$meta_initial' )";

  mysql_query( $query, $con );
  
  session_start();
  #--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]+100;
	 $littlesamakfox_logon[3] = $littlesamakfox_logon[3]+100;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
  }
  mysql_close($con);
  header( "Location:"."./meta.php" );

?>
