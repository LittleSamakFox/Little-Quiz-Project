<?PHP
	include( "assets/functions.inc" ); 
	session_start();
?>
<html lang="ko">
	<head>
		<meta charset = "utf-8">
		<title>littlesamakfox</title>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="/thread.php">게시판</a>
                            </li>
							<li class="nav-item active">
								<a class="nav-link" href="/meta.php">메타점수</a>
							</li>
							<li class="nav-item">
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
									?>
										<span style='color:#f1f7fc;'> 어서오세요
										<?PHP
										if($littlesamakfox_logon[4]==1){?>
											<i class="icon ion-social-twitch-outline"></i>
										<?PHP
										}
										print $littlesamakfox_logon[0];
										?>님</span>
										<a href="/thread.php?logout=ok" class="btn btn-primary btn-pill">로그아웃</a>
									<?PHP
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

		<div class="register">
			<div class="intro">
                <h1 class="mb-2 mt-3 text-center">🎁</h1>
                <h1 class="mb-4 mt-4 text-center">퀴즈 제작</h3>
                <p class="text-center">
                    당신이 가진 가치관, 사고를 모두 배재시켜라.<br>
                     <small class="text-muted">모든 문제들은 너의 상상력을 자극시킨다.</small><br>
                </p>
			</div>
			<?PHP
			  $con = mysql_connect( "localhost", "root", "apmsetup" );
			  mysql_select_db( "littlesamakfox", $con );
			  #------------- 해당 글의 정보를 가져온다 -------------------#
			  $query = "select game_name, game_score, game_limit, game_hint, game_hint2, game_hint3, game_answer, guserfile, guserfile2, game_article, game_initial
				from game where game_uid=$game_uid";
			  $result = mysql_query( $query, $con );
			  list( $game_name, $game_score, $game_limit, $game_hint, $game_hint2, $game_hint3, $game_answer, $guserfile, $guserfile2, $game_article, $game_initial ) = mysql_fetch_array( $result );
			  mysql_close( $con );
			?>
            <div class="form-container">
                <form action="./editgame_db.php?game_uid=<?=$game_uid?>" method="post" style="padding-left:20px; padding-right:20px; margin-top:40px; margin-bottom:40px" enctype="multipart/form-data">
                        <div class="form-group">
							<input class="form-control" minlength="1" maxlength="15" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_initial" type="text" value="<?=$game_initial?>" placeholder="퀴즈 이니셜을 입력해주세요">
							<input class="form-control" minlength="1" maxlength="15" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_name" type="text" value="<?=$game_name?>" placeholder="퀴즈 제목을 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_hint" type="text" value="<?=$game_hint?>" placeholder="첫번째 힌트를 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_hint2" type="text" value="<?=$game_hint2?>" placeholder="두번째 힌트를 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_hint3" type="text" value="<?=$game_hint3?>" placeholder="세번째 힌트를 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_answer" type="text" value="<?=$game_answer?>" placeholder="정답을 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_score" type="text" value="<?=$game_score?>" placeholder="점수를 입력해주세요">
							<input class="form-control" minlength="1" maxlength="20" required="" aria-required="true" style="margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de" name="game_limit" type="text" value="<?=$game_limit?>"placeholder="한계를 입력해주세요">
							<p style="">이미지 업로드 (100MB 미만)</p>
							 <p>
								<input type="hidden" name="MAX_FILE_SIZE" value="100000000">
								<input name="guserfile" type="file" accept="image/*">
								<input name="guserfile2" type="file" accept="image/*">
							 </p>
							 <img class="img-fluid img-thumbnail" style="max-width:30%" src="/assets/img/game/<?=$guserfile?>">
								<img class="img-fluid img-thumbnail" style="max-width:30%" src="/assets/img/game/<?=$guserfile2?>">
							<textarea class="form-control" minlength="1" maxlength="1000" required="" aria-required="true" style="ime-mode:active; margin-bottom:25px; width:100%; height:40px; border: 1px solid #d9d9de; min-height:250px" name="game_article" placeholder="본문을 입력해주세요 (최대 1,000자)"><?=$game_article?></textarea>
							<div align="center">
								<input class="btn btn-primary btn-pill mr-2 mb-5" type="submit" value="퀴즈 수정하기">
							</div>
						</div>
				</form>
            </div>
        </div>

        <div class="nav">
			<a href="/game.php">
                <div class="container button fixed-bottom" style="margin-right: 10px;width: 75px;padding-top:5px;padding-bottom: 3px;border-top-left-radius: 5px;b;border-top-right-radius: 5px;color: white;background-color:#5635a4;opacity:1.0;">
                    돌아가
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