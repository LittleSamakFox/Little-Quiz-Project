<?PHP
  include( "assets/config.cfg" );
  include( "assets/functions.inc" );

  #------------------- 앞뒤 스페이스 제거 ----------------#
  $name = trim( $name );
  $subject = trim( $subject );
  $writedate = date( "y-m-d" ); 
  $article = trim( $article );

  #------------------ 입력값 이상유무 확인 ----------------#
  if( !$name || !$subject || !$passwd || !$article )
  {
    echo("
					<script>
					  window.alert('입력값이 부족합니다.');
					  history.go(-1);
					</script>
	 ");
	 exit;
  }
  
  #------------------ 암호 encrpt ---------------------#
  $passwd = substr( md5( trim( $passwd ) ), 0, 10 );

  #----------------- 데이타베이스 연결 -------------------#
  $con = mysql_connect( "localhost", "root", "apmsetup" );
  mysql_select_db( "littlesamakfox", $con );
  
  #---------------- uid, gid, depth 결정 -------------------#
  $query = "select MAX( gid ) as gid from thread"; 
  $result = mysql_query( $query, $con ); 
  $gid = current(mysql_fetch_array( $result ));
  $gid = $gid + 1;
 
 #-----상품의 이미지가 있는지를 확인합니다-----#
	    if($userfile_name)
	    {
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
	    }
		if($userfile2_name)
	    {
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
	    }

  #----------------- 테이블에 글 삽입 --------------------#

  $query = "insert into thread 
    ( gid, name, passwd, subject, userfile, userfile2, article, writedate ) 
    values ( $gid, '$name', '$passwd', '$subject', '$save_image', '$save_image2', '$article', '$writedate' )";

  mysql_query( $query, $con );
  
  session_start();
  #--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
  if (session_is_registered('littlesamakfox_logon')){
	 $littlesamakfox_logon[2] = $littlesamakfox_logon[2]+3;
	 $littlesamakfox_logon[3] = $littlesamakfox_logon[3]+3;
	 $query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
	 mysql_query( $query, $con );
  }
  mysql_close($con);
  forward( "./thread.php" );

?>
