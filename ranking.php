<?PHP
	session_start();
            if ($coinplus == "ok"){
							if (session_is_registered('littlesamakfox_logon')){
							 #----------------- 데이타베이스 연결 -------------------#
							$con = mysql_connect( "localhost", "root", "apmsetup" );
							mysql_select_db( "littlesamakfox", $con );
							$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+1;
							$littlesamakfox_logon[3] = $littlesamakfox_logon[3]+1;
							$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
							mysql_query( $query, $con );
							mysql_close($con);
							echo("
										<script>
										  window.alert('코인이 추가되었습니다');
										  history.go(-1);
										</script>
							");
							exit;
							}
							else{
							echo("
										<script>
										  window.alert('로그인이 필요합니다');
										  history.go(-1);
										</script>
							");
							 exit;
							}
			}
			if ($coinlotto == "ok"){
							if (session_is_registered('littlesamakfox_logon')){
								 #----------------- 데이타베이스 연결 -------------------#
								$con = mysql_connect( "localhost", "root", "apmsetup" );
								mysql_select_db( "littlesamakfox", $con );
								if($littlesamakfox_logon[2]>10){
									mt_srand((double)microtime()*1000000);
									$random=mt_rand(0,10000);
									if($random%3==2){
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]-10;
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+1;
										$littlesamakfox_logon[3] = $littlesamakfox_logon[3]-9;
										$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
										mysql_query( $query, $con );
										mysql_close($con);
										echo("
													<script>
													  window.alert('야호 복권 당첨되어 1코인을 얻었어요! 너무 행복해요');
													  history.go(-1);
													</script>
										");
										exit;
									}
									else if($random%3==1){
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]-10;
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+10;
										$littlesamakfox_logon[3] = $littlesamakfox_logon[3]+0;
										$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
										mysql_query( $query, $con );
										mysql_close($con);
										echo("
													<script>
													  window.alert('야호 복권 당첨되어 10코인을 얻었어요!');
													  history.go(-1);
													</script>
										");
										exit;
									}
									else{
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]-10;
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+20;
										$littlesamakfox_logon[3] = $littlesamakfox_logon[3]+10;
										$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
										mysql_query( $query, $con );
										mysql_close($con);
										echo("
													<script>
													  window.alert('야호 복권 당첨되어 20코인을 얻었어요! 곧 부자되겠네요 ㅎㅎ');
													  history.go(-1);
													</script>
										");
										exit;
									}
								}
								else{
									echo("
												<script>
												  window.alert('10코인도 없네요 코인 모아오세요 ㅡㅡ');
												  history.go(-1);
												</script>
									");
								}
							}
							else{
							echo("
										<script>
										  window.alert('로그인이 필요합니다');
										  history.go(-1);
										</script>
							");
							 exit;
							}
			}
			if ($coingaza == "ok"){
							if (session_is_registered('littlesamakfox_logon')){
								 #----------------- 데이타베이스 연결 -------------------#
								$con = mysql_connect( "localhost", "root", "apmsetup" );
								mysql_select_db( "littlesamakfox", $con );
								if($littlesamakfox_logon[2]>0){
									mt_srand((double)microtime()*1000000);
									$random=mt_rand(0,10000);
									if($random%2==1){
										$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+$littlesamakfox_logon[2];
										$littlesamakfox_logon[3] = $littlesamakfox_logon[3]+$littlesamakfox_logon[2];
										$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
										mysql_query( $query, $con );
										mysql_close($con);
										echo("
													<script>
													  window.alert('성공!!! 떡상 2배 가즈아ㅏㅏㅏㅏㅏㅏㅏㅏ');
													  history.go(-1);
													</script>
										");
										exit;
									}
									else{
										if($littlesamakfox_logon[2] == 1){
											$littlesamakfox_logon[2] = $littlesamakfox_logon[2]-1;
											$littlesamakfox_logon[3] = $littlesamakfox_logon[3]-1;
											$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
											mysql_query( $query, $con );
											mysql_close($con);
											echo("
														<script>
														  window.alert('떡락의 쇼크로 빈털털이행 ㅠㅠ');
														  history.go(-1);
														</script>
											");
											exit;
										}
										else{
											$littlesamakfox_logon[2] = $littlesamakfox_logon[2]/2;
											$littlesamakfox_logon[3] = $littlesamakfox_logon[3]-$littlesamakfox_logon[2];
											$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
											mysql_query( $query, $con );
											mysql_close($con);
											echo("
														<script>
														  window.alert('ㅌㅌㅌㅌㅌㅌㅌ 반토막 샷샷');
														  history.go(-1);
														</script>
											");
											exit;
										}
									}
								}
								else{
									echo("
												<script>
												  window.alert('뭐야 돈도 없네? 카앜 퉤 저리 꺼져');
												  history.go(-1);
												</script>
									");
								}
							}
							else{
							echo("
										<script>
										  window.alert('로그인이 필요합니다');
										  history.go(-1);
										</script>
							");
							 exit;
							}
			}
?>
<html lang="ko">
	<head>
		<meta charset = "utf-8">
		<title>랭킹입니다</title>
		<meta name="subject" content="littlesamakfox">
		<meta name="author" content="littlesamakfox">
		<meta name="format-detection" content="telehphone=no">
		<meta name="theme-color" content="#5635a4">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
		<meta name="description" content="you can enjoy this quiz & chat with other bro">
		<meta name="keywords" content="game, quiz">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta property="og:type" content="website">
		<meta property="og:title" content="i want to be the layton">
		<meta property="og:description" content="this is your new world">
		<meta property="og:url" content="http://localhost/main.php">
		<meta property="og:image" content="http://localhost/assets/img/og-image.png">
		<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="/assets/img/apple-icon-57x57.png">
	    <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/apple-icon-60x60.png">
	    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/apple-icon-72x72.png">
	    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon-76x76.png">
	    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/apple-icon-114x114.png">
	    <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/apple-icon-120x120.png">
	    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/apple-icon-144x144.png">
	    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/apple-icon-152x152.png">
	    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-icon-180x180.png">
	    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/android-icon-192x192.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon-96x96.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
		<link rel="canonical" href="https://localhost/main.php">
        <link href="/assets/css/style.css" rel="stylesheet">
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/shards.css" rel="stylesheet">
        <link href="/assets/fonts/ionicons.min.css" rel="stylesheet">
	</head>
	<body class="littlesamakfox">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-littlesamakfox" style="padding:0.5rem 1rem">
                <img src="/assets/img/hr_logo.png" style="height:40px" class="mr-2"><a class="navbar-brand" href="/main.php" >Layton</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/main.php">메인화면<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    퀴즈
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/game.php#1st_level">레벨1</a>
									<a class="dropdown-item" href="/game.php#2nd_level">레벨2</a>
									<a class="dropdown-item" href="/game.php#3rd_level">레벨3</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/endquiz.php">미니게임</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/thread.php">게시판</a>
                            </li>
							<li class="nav-item">
								<a class="nav-link" href="/meta.php">메타점수</a>
							</li>
							<li class="nav-item active">
                                <a class="nav-link" href="/ranking.php">랭킹</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="/shop.php">상점</a>
                            </li>
							<?PHP
								if (session_is_registered('littlesamakfox_logon')){?>
							<li class="nav-item">
								 <a class="nav-link" href="/mypage.php">내정보</a>
							</li>
								<?PHP
								}
								?>
                        </ul>
						<ul class="navbar-nav">
							<li class="nav-item">
								<?PHP
								#--------------로그인 되었는지를 비교--------------------#
								if (session_is_registered('littlesamakfox_logon')){
									if ($logout == "ok")
									{
									#--------세션 해제-------#
									  session_unregister('littlesamakfox_logon');
								?>
									  <div align="center">
										 <a href="/login.php" class="btn btn-primary btn-pill">로그인</a>
									  </div>
								<?PHP
									}
									else{?>
										<span style='color:#f1f7fc;'> 어서오세요
										<?PHP
										if($littlesamakfox_logon[4]==1){?>
											<i class="icon ion-social-twitch-outline"></i>
										<?PHP
										}
										print $littlesamakfox_logon[0];
										?>님</span>
									<a href="/main.php?logout=ok" class="btn btn-primary btn-pill">로그아웃</a>
								<?PHP
									}
								 }
								 else{
								?>
								<div align="center">
										 <a href="/login.php" class="btn btn-primary btn-pill">로그인</a>
								</div>
								<?PHP
								}
								?>
							</li>
						</ul>
                </div>
            </nav>
        </header>

        <div class="container" style="clear:both; padding-top:100px; text-align:center"></div>
		<div class="container mb-3" align="center">
				<div class="card" style="max-width:1024px; position:relative">
					<div class="card-body" align="center">
						<h1 class="mt-3 mb-3 text-center"><i class="icon ion-social-bitcoin-outline"></i></h1>
						<h1>도박장</h1>
						<p>가즈아ㅏㅏㅏㅏㅏㅏㅏㅏㅏㅏ</p>
						<a href="/ranking.php?coinplus=ok" class="btn btn-primary btn-pill">코인추가(1코인)</a>
						<a href="/ranking.php?coinlotto=ok" class="btn btn-primary btn-pill">복권(10코인 필요)</a>
						<a href="/ranking.php?coingaza=ok" class="btn btn-primary btn-pill">비트 코인 가즈아ㅏㅏㅏㅏ(올인)</a>
						<p></p>
						내가 보유한 코인 수 : <?=$littlesamakfox_logon[2]?>
						<hr width="200">
						<h1 class="mt-5 mb-3 text-center"><i class="icon ion-social-freebsd-devil"></i></h1>
						<h1>Saved Ranking</h1>
						<p>누가 누가 휙득했었던 코인이 많을까요?</p>
						<table class="table table-responsive" style="display:inline;">
							  <thead>
								<tr>
								  <th scope="col">이름</th>
								  <th scope="col">가진 코인수</th>
								  <th scope="col">총 휙득했었던 코인수</th>
								</tr>
							  </thead>
							 <tbody>
								  <?PHP

									#------------- 데이타베이스에서 목록을 추출한다 --------------#
									$con = mysql_connect( "localhost", "root", "apmsetup" );
									mysql_select_db( "littlesamakfox", $con );
									$query = "ALTER TABLE `member_tab`  ORDER BY `mem_savecoin` DESC";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );
									$query = "select mem_id, mem_coin, mem_savecoin from member_tab";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );

										while( $row =  mysql_fetch_array( $result ) )
													  {
														list( $member_id, $member_coin, $member_savecoin) = $row;
													?>
									<tr>
									  <td><?=$member_id?></td>
									  <td><?=$member_coin?></td>
									  <td><?=$member_savecoin?></td>
									</tr>
									 <?PHP 
											 }
											mysql_close( $con );
										?>
							 </tbody>
						</table>
						<h1 class="mt-5 mb-3 text-center"><i class="icon ion-social-freebsd-devil"></i></h1>
						<h1>Now Coin Ranking</h1>
						<p>누가 누가 더 현재 가지고 있는 코인이 많을까요?</p>
						<table class="table table-responsive" style="display:inline;">
							  <thead>
								<tr>
								  <th scope="col">이름</th>
								  <th scope="col">가진 코인수</th>
								  <th scope="col">총 휙득했었던 코인수</th>
								</tr>
							  </thead>
							 <tbody>
								  <?PHP

									#------------- 데이타베이스에서 목록을 추출한다 --------------#
									$con = mysql_connect( "localhost", "root", "apmsetup" );
									mysql_select_db( "littlesamakfox", $con );
									$query = "ALTER TABLE `member_tab`  ORDER BY `mem_coin` DESC";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );
									$query = "select mem_id, mem_coin, mem_savecoin from member_tab";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );

										while( $row =  mysql_fetch_array( $result ) )
													  {
														list( $member_id, $member_coin, $member_savecoin) = $row;
													?>
									<tr>
									  <td><?=$member_id?></td>
									  <td><?=$member_coin?></td>
									  <td><?=$member_savecoin?></td>
									</tr>
									 <?PHP 
											 }
											mysql_close( $con );
										?>
							 </tbody>
						</table>
						<h1 class="mt-5 mb-3 text-center"><i class="icon ion-social-freebsd-devil"></i></h1>
						<h1>Meta Score Ranking</h1>
						<p>어떤 게임이 GOTY일까요?</p>
						<table class="table table-responsive" style="display:inline;">
							  <thead>
								<tr>
								  <th scope="col">게임 이름</th>
								  <th scope="col">메타 점수</th>
								  <th scope="col">참여한 사람 수</th>
								</tr>
							  </thead>
							 <tbody>
								  <?PHP

									#------------- 데이타베이스에서 목록을 추출한다 --------------#
									$con = mysql_connect( "localhost", "root", "apmsetup" );
									mysql_select_db( "littlesamakfox", $con );
									$query = "ALTER TABLE `meta`  ORDER BY `meta_score` DESC";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );
									$query = "select meta_name, meta_score, meta_played from meta";
									$result = mysql_query( $query, $con ) or die ( mysql_error() );

										while( $row =  mysql_fetch_array( $result ) )
													  {
														list( $meta_name, $meta_score, $meta_played) = $row;
													?>
									<tr>
									  <td><?=$meta_name?></td>
									  <td><?=$meta_score?></td>
									  <td><?=$meta_played?></td>
									</tr>
									 <?PHP 
											 }
											mysql_close( $con );
										?>
							 </tbody>
						</table>
					</div>
				</div>
			</div>

        <div class="nav">
            <a href="#">
                <div class="container button fixed-bottom" style="margin-right: 10px;width: 75px;padding-top:5px;padding-bottom: 3px;border-top-left-radius: 5px;b;border-top-right-radius: 5px;color: white;background-color:#5635a4;opacity:1.0;">
                    상위로
                </div>
            </a>
        </div>

        <footer class="footer">
            <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100002806164508"><i class="icon ion-social-facebook"></i></a>
                <a href="https://www.instagram.com/alphaxbeta/"><i class="icon ion-social-instagram"></i></a>
                <a href="https://github.com/littlesamakfox"><i class="icon ion-social-github"></i></a>
                <a href="https://www.twitch.tv/littlesamakfox"><i class="icon ion-social-twitch-outline"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="/main.php">홈</a></li>
                <li class="list-inline-item"><a href="/game.php">퀴즈</a></li>
                <li class="list-inline-item"><a href="/thread.php">게시판</a></li>
				<li class="list-inline-item"><a href="/meta.php">메타점수</a></li>
				<li class="list-inline-item"><a href="/shop.php">상점</a></li>
            </ul>
            <p class="copyright">@LittleSamakFox </p>
        </footer>

	<!-- JavaScript: placed at the end of the document so the pages load faster -->
    	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>