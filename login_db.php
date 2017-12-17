<?PHP
			#----------------- 데이타베이스 연결 -------------------#
			$con = mysql_connect( "localhost", "root", "apmsetup" );
			mysql_select_db( "littlesamakfox", $con );

			#--------------- 아이디 비밀번호가 올바른지 확인  -------------------#
				$query = "select mem_id, mem_password, mem_coin, mem_savecoin, mem_iconslot, mem_email from member_tab where (mem_id = '". $mem_id ."') and (mem_password = '". $mem_password ."')";
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
				if ($row[0] == "")
				{
				  echo("
					<script>
					  window.alert('아이디와 비밀번호를 확인해 주세요');
					  history.go(-1);
					</script>
				  ");
				  exit;
				}
				else
				{
				  #-----------세션이 설정되지 않았으면 설정함----------------#
				  if (!session_is_registered('littlesamakfox_logon')) {
					session_register('littlesamakfox_logon');
					$littlesamakfox_logon = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
				  }
				}
				header("Location:/main.php");
?>
