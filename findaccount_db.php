<?PHP
		#----------------- 데이타베이스 연결 -------------------#
		$con = mysql_connect( "localhost", "root", "apmsetup" );
		mysql_select_db( "littlesamakfox", $con );
					#--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
		$query = "select mem_email from member_tab where (mem_email = '" . $mem_email . "')";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		if ($row[0] == "")
		{
		  echo("
			<script>
			  window.alert('이메일을 다시 확인해 주세요');
			  history.go(-1);
			</script>
		  ");
		  exit;
		}
		else
		{
		  $query = "select*from member_tab where mem_email='".$mem_email."'";
		  $result = mysql_query( $query);
		  $row = mysql_fetch_row($result);
		  echo("
			 <script>
			 window.alert('회원님의 아이디는 $row[0]이고 회원님의 비밀번호는 $row[2] 입니다.');
			 history.go(-1);
			 </script>
		  ");
		  exit;
		}
?>
