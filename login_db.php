<?PHP
			#----------------- ����Ÿ���̽� ���� -------------------#
			$con = mysql_connect( "localhost", "root", "apmsetup" );
			mysql_select_db( "littlesamakfox", $con );

			#--------------- ���̵� ��й�ȣ�� �ùٸ��� Ȯ��  -------------------#
				$query = "select mem_id, mem_password, mem_coin, mem_savecoin, mem_iconslot, mem_email from member_tab where (mem_id = '". $mem_id ."') and (mem_password = '". $mem_password ."')";
				$result = mysql_query($query);
				$row = mysql_fetch_row($result);
				if ($row[0] == "")
				{
				  echo("
					<script>
					  window.alert('���̵�� ��й�ȣ�� Ȯ���� �ּ���');
					  history.go(-1);
					</script>
				  ");
				  exit;
				}
				else
				{
				  #-----------������ �������� �ʾ����� ������----------------#
				  if (!session_is_registered('littlesamakfox_logon')) {
					session_register('littlesamakfox_logon');
					$littlesamakfox_logon = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
				  }
				}
				header("Location:/main.php");
?>
