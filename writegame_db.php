<?PHP
  #------------------- 앞뒤 스페이스 제거 ----------------#
  $game_name = trim( $game_name );
  $game_answer = trim( $game_answer );
  $game_hint = trim( $game_hint );
  $game_hint2 = trim( $game_hint2 );
  $game_hint3 = trim( $game_hint3 );
  $game_article = trim( $game_article );
  $game_initial = trim( $game_initial );

  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$game_name || !$game_answer || !$game_article || !$game_score || !$game_limit || ! $game_initial )
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
  if( $game_limit != 150 || $game_limit != 500 || $game_limit != 1000 )
  {
	echo("
					<script>
					  window.alert('제대로 된 한계 값을 입력해주세요.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  #----------------- 점수 입력값 범위 이상 확인 -----------#
  if( $game_score <0 )
  {
	echo("
					<script>
					  window.alert('최소 0 이상의 점수를 입력해주세요.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }

  
  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );

#-----상품의 이미지가 있는지를 확인합니다-----#
	    if($guserfile_name)
	    {
	      $gsave_image = $game_initial . "_" . $guserfile_name;
	      $gfile_exist = file_exists("./assets/img/game/$gsave_image");
	      if ($gfile_exist) {
	        echo("
					<script>
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile, "./assets/img/game/$gsave_image")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile)) {
	        echo("
					<script>
					  window.alert('임시 파일 삭제에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
			exit;
	      }
	    }
		if($guserfile2_name)
	    {
	      $gsave_image2 = $game_initial . "_" . $guserfile2_name;
	      $gfile_exist2 = file_exists("./assets/img/game/$gsave_image2");
	      if ($gfile_exist2) {
	         echo("
					<script>
					  window.alert('이미 존재하는 파일입니다.');
					  history.go(-1);
					</script>
				");
	        exit;
	      }
	      if (!copy($guserfile2, "./assets/img/game/$gsave_image2")) {
	        echo("
					<script>
					  window.alert('파일 저장에 실패하였습니다.');
					  history.go(-1);
					</script>
			");
	        exit;
	      }
	      if (!unlink($guserfile2)) {
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

  $query = "insert into game 
    ( game_name, game_score, game_limit, game_hint, game_hint2, game_hint3, game_answer, guserfile, guserfile2, game_article, game_initial ) 
    values ( '$game_name', '$game_score', '$game_limit', '$game_hint', '$game_hint2', '$game_hint3', '$game_answer', '$gsave_image', '$gsave_image2', '$game_article', '$game_initial' )";

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
  header( "Location:"."./game.php" );

?>
