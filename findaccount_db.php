<?PHP
		#----------------- ����Ÿ���̽� ���� -------------------#
		$con = mysql_connect( "localhost", "root", "apmsetup" );
		mysql_select_db( "littlesamakfox", $con );
					#--------------- ���̵� ��й�ȣ�� �ùٸ��� Ȯ��  -------------------#
		$query = "select mem_email from member_tab where (mem_email = '" . $mem_email . "')";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		if ($row[0] == "")
		{
		  echo("
			<script>
			  window.alert('�̸����� �ٽ� Ȯ���� �ּ���');
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
			 window.alert('ȸ������ ���̵�� $row[0]�̰� ȸ������ ��й�ȣ�� $row[2] �Դϴ�.');
			 history.go(-1);
			 </script>
		  ");
		  exit;
		}
?>
