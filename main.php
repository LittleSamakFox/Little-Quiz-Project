<?PHP
@session_start();
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
		<link href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" rel="stylesheet" type="text/css">
	</head>
	<body class="littlesamakfox">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-littlesamakfox" style="padding:0.5rem 1rem">
                <img src="/assets/img/hr_logo.png" style="height:40px" class="mr-2"><a class="navbar-brand" href="/main.php">Layton</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
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
									if ($logout == "ok")
									{
									#--------세션 해제-------#
									  #----------------- 데이타베이스 연결 -------------------#
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

        <div class="container" style="clear:both; padding-top:60px; text-align:center"></div>

		<div id="myCarousel" class="carousel slide bg-inverse w-100 ml-auto mr-auto" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                  <a href="/game.php#1st_level">
                      <img class="d-block w-100" src="/assets/img/slide_img1.jpg" alt="First slide">
                      <div class="carousel-caption">
                          <h1 style="font-weight:650; color:#5635a4"></h1>
                          <p style="font-weight:300;  color:#5635a4"></p>
                      </div>
                  </a>
              </div>
		    <div class="carousel-item">
                <a href="/game.php#2nd_level">
                    <img class="d-block w-100" src="/assets/img/slide_img2.jpg" alt="Second slide">
                    <div class="carousel-caption">
                        <h1 style="font-weight:650; color:#5635a4"></h1>
                        <p style="font-weight:300;  color:#5635a4"></p>
                    </div>
                </a>
		    </div>
		    <div class="carousel-item">
                <a href="/game.php#3rd_level">
                    <img class="d-block w-100" src="/assets/img/slide_img3.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <h1 style="font-weight:650; color:#5635a4"></h1>
                        <p style="font-weight:300;  color:#5635a4"></p>
                    </div>
                </a>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

		<div class="container mb-3" align="center">
            <div class="card" style="max-width:1024px; position:relative; z-index:2">
                <div class="card-body">
                    <h1 class="mb-2 text-center"><i class="icon ion-ios-game-controller-a-outline"></i></h1>
                    <h3 class="mb-4 text-center">츄라이 츄라이</h3>
                    <p class="text-center">
                        너도 나도 <br>
                        <small class="text-muted">  야 나두 </small><br>
                        <?PHP
                            #--------------로그인 되었는지를 비교--------------------#
                            if (session_is_registered('littlesamakfox_logon')){
								if ($logout == "ok")
								{
								#--------세션 해제-------#
								  session_unregister('littlesamakfox_logon');
								  ?>
									<div align="center">
										<a href="/login.php" class="btn btn-primary btn-pill mr-2 mb-3"><i class="icon ion-social-facebook mr-1"></i> 로그인</a>
									</div>
								<?PHP
								}
								else{
								print "<br>어서오세요 " . $littlesamakfox_logon[0] . " 님<br>";
								print "<br>가지고 계신 코인의 갯수는 총 " . $littlesamakfox_logon[2] . "개입니다<br>";
								?>
								<a href="/main.php?logout=ok" class="btn btn-primary btn-pill mr-2 mt-3 mb-3">로그아웃</a>
								<?PHP
								}
                             }
                             else{
                        ?>
							<div align="center">
								<a href="/login.php" class="btn btn-primary btn-pill mr-2 mb-3">로그인</a>
							</div>
						<?PHP
							}
                        ?>
                    </p>
                </div>
            </div>
         </div>
        <div class="unvisible-md" style="background: url(/assets/img/bg-img.jpg) no-repeat;height: 400px;background-size:100%;padding-bottom:0; margin-top:10; margin-bottom: -150; z-index-1">
            <div class="container" style="padding-top: 40px;">
                <h3 style="font-weight:650;" align="right">"언제 어디서나 즐기는"</h3>
                <h3 style="font-weight:650; margin-top:-8px" align="left">"누구나 맛보고 뜯고 즐기는!"</h3>
                <h4 style="font-weight:650; margin-top:30px" align="right">"와! 아시는구나!"</h4>
            </div>
        </div>
        <div class="unvisible-sm" style="background: url(/assets/img/bg-img.jpg) no-repeat;height: 200px;background-size:100%;padding-bottom:0; margin-top:-1; margin-bottom: -20; z-index-1">
            <div class="container" style="padding-top: 10px;">
                <h3 style="font-weight:650;" align="right">"언제 어디서나 즐기는"</h3>
                <h3 style="font-weight:650; margin-top:25px" align="left">"누구나 맛보고 뜯고 즐기는!"</h3>
                <h4 style="font-weight:650; margin-top:30px" align="right">"와! 아시는구나!"</h4>
            </div>
        </div>

       
        <div class="container" align="center" style="position:relative; z-index:3; margin-bottom:-30">
            <div class="card-deck">
                <div class="card">
                    <a href="/game.php#1st_level">
                        <img class="card-img-top littlesamakfox-img" src="/assets/img/1st_level.jpg" alt="레벨1">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><a class="font-weight-bold littlesamakfox-color" href="/game.php#1st_level">초급</h4></a>
                        <p class="card-text">1단계예요. 덧셈 뺄샘 할줄 알죠? 그러면 풀 수 있어요</p>
                        <p class="card-text"><small class="text-muted">150코인까지 가능</small></p>
                    </div>
                </div>
                <div class="card">
                    <a href="/game.php#2nd_level">
                        <img class="card-img-top littlesamakfox-img" src="/assets/img/2nd_level.jpg" alt="레벨2">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><a class="font-weight-bold littlesamakfox-color" href="/game.php#2nd_level">중급</h4></a>
                        <p class="card-text">않이 아니 구분할줄 알면 풀 수 있어요</p>
                        <p class="card-text"><small class="text-muted">500코인까지 가능</small></p>
                    </div>
                </div>
                <div class="card">
                    <a href="/game.php#3rd_level">
                        <img class="card-img-top littlesamakfox-img" src="/assets/img/3rd_level.jpg" alt="레벨3">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><a class="font-weight-bold littlesamakfox-color" href="/game.php#3rd_level">고급</h4></a>
                        <p class="card-text">끝판왕! 안되 안돼 구분 못하면 못풀어요</p>
                        <p class="card-text"><small class="text-muted">10000코인까지 가능</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container card mb-5 py-5" style="max-width:1024px; position:relative; z-index:2">
            <div class="card-body">
				<h1 class="mb-2 text-center"><i class="icon ion-ios-game-controller-b-outline"></i></h1>
                <h3 class="mb-4 text-center">다양한 각종 게임들</h3>
                <p class="text-center">
                    누구도 경험하지 못한 <b>슈퍼 블록 퍼스터 게임들</b> 한번 지금 당장 경험하세요
                </p>
                <div align="center">
                    <a href="/game.php" class="btn btn-primary btn-pill mr-2  mb-5">게임하러가기</a>
                </div>
                <div id="myCarouselgame" class="unvisible-xs carousel slide bg-inverse w-100 ml-auto mr-auto" data-ride="carousel" style="box-shadow:none">
                    <ol class="carousel-indicators">
                        <littlesamakfox data-target="#myCarouselgame" data-slide-to="0" class="active"></littlesamakfox>
                        <littlesamakfox data-target="#myCarouselgame" data-slide-to="1"></littlesamakfox>
                        <littlesamakfox data-target="#myCarouselgame" data-slide-to="2"></littlesamakfox>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="row card-group">
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=1">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/1.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=2">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/2.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=3">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/3.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=4">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/4.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row card-group">
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=5">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/1.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=6">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/2.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=7">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/3.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=8">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/4.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row card-group">
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=9">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/1.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=10">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/2.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=11">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/3.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 item">
                                    <div class="card mb-5">
                                        <a href="/nazo.php?game_uid=12">
                                            <img class="card-img-top img-thumbnail" src="/assets/img/shop/4.jpg" alt="퀴즈">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev-littlesamakfox" href="#myCarouselgame" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon-littlesamakfox" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next-littlesamakfox" href="#myCarouselgame" role="button" data-slide="next">
                        <span class="carousel-control-next-icon-littlesamakfox" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <h1 class="mt-5 mb-2 text-center"><i class="icon ion-social-rss-outline"></i></h1>
                <h3 class="mb-4 text-center">유저들과 공유하자!</h3>
                <p class="text-center">
                    내가만든 <b>슈퍼 블록 퍼스터 게임들</b> 지금 당장 만드세요
                </p>
                <div align="center">
                    <a href="/thread.php" class="btn btn-primary btn-pill mr-2  mb-5">퀴즈 만들러 가기</a>
                </div>
				<h1 class="mt-5 mb-2 text-center"><i class="icon ion-paintbrush"></i></h1>
                <h3 class="mb-4 text-center">직접 평가하자</h3>
                <p class="text-center">
                    내가 직접 머법관이! <b>점수를 통해 평가하세요!</b> 지금 당장 평가하세요
                </p>
                <div align="center">
                    <a href="/thread.php" class="btn btn-primary btn-pill mr-2  mb-5">게임 평가하러 가기</a>
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