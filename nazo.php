<?PHP
    session_start();
	if (session_is_registered('littlesamakfox_logon')){
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
?>

<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>littlesamakfox</title>
    <meta name="subject" content="littlesamakfox">
    <meta name="author" content="littlesamakfox">
    <meta name="format-detection" content="telehphone=no">
    <meta name="theme-color" content="#FFE08C">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="you can enjoy this quiz & chat with other bro">
    <meta name="keywords" content="game, quiz">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta property="og:type" content="website">
    <meta property="og:title" content="i want to be the layton">
    <meta property="og:description" content="this is your new world">
    <meta property="og:url" content="http://localhost/main.html">
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
    <link rel="canonical" href="https://localhost/main.html">
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/assets/css/shards.css" rel="stylesheet">
    <link href="/assets/fonts/ionicons.min.css" rel="stylesheet">
</head>
    <body class="littlesamakfox" onload="myFunction()">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-littlesamakfox" style="padding:0.5rem 1rem">
                <img src="/assets/img/hr_logo.png" style="height:40px" class="mr-2"><a class="navbar-brand" href="/main.php">Layton</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/main.php">메인화면<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown active">
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
                            session_unregister('littlesamakfox_logon');
                            ?>
                            <div align="center">
                                <a href="/login.php" class="btn btn-primary btn-pill">로그인</a>
                            </div>
                            <?PHP
                            }
                            else{
										if($littlesamakfox_logon[0] == "littlesamakfox"){
											?>
											<a href="./editgame.php?game_uid=<?=$game_uid?>" class="btn btn-primary btn-pill">퀴즈수정하기</a>
											<?PHP
										}
									?>
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

	<?PHP
		  include( "assets/functions.inc" );
		  $con = mysql_connect( "localhost", "root", "apmsetup" );
		  mysql_select_db( "littlesamakfox", $con );
  
		  #------------- 데이타베이스에서 글에 대한 정보 검색 -------------#
		  $query = "select game_uid, game_name, game_score, game_limit, game_hint, game_hint2, game_hint3, game_answer, guserfile, guserfile2, game_article, game_initial from game where game_uid=$game_uid";
  
		  $result = mysql_query( $query, $con ) or die ( mysql_error() );
  
		  list( $game_uid, $game_name, $game_score, $game_limit, $game_hint, $game_hint2, $game_hint3, $game_answer, $guserfile, $guserfile2, $game_article, $game_initial ) 
			= mysql_fetch_array( $result );
		  if ($littlesamakfox_logon[3]>$game_limit){
			echo("
							<script>
							  window.alert('문제를 풀 수 있는 총 코인수를 초과하셨습니다.');
							  history.go(-1);
							</script>
			 ");
			 exit;
		  }
	?>
    <div class="register">
            <div class="form-container">
                <form action="#" method="post" class="container" id="needs-validation" novalidate>
					<h5 class="text-left text-muted"><p><<small><?=$game_initial?></small>></p></h5>
                    <h1 class="text-center"><p><strong>문제 <?=$game_uid?></strong></p></h1>
                    <h5 class="text-center text-muted"><p><<small><?=$game_name?></small>></p></h5>
                    <div class="container">
                        <p>시작한지 : <a id="playtime"></a></p>
                    </div>
                    <hr>
                    <div class="container" align="center">
                        <figure class="figure">
                            <img src="/assets/img/game/<?=$guserfile?>" class="figure-img img-fluid rounded" data-toggle="modal" data-target="#modal-imgone" alt="">
                            <div class="modal" id="modal-imgone" tabindex="-1" role="dialog" style="top:100">
                                <div class="modal-dialog-lg" role="document">
                                    <div class="modal-content" style="background-color:transparent;  border:0px; box-shadow:none">
                                        <div class="modal-header" style="border-bottom-color:transparent;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="/assets/img/game/<?=$guserfile?>" class="figure-img img-fluid" alt="first-picture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="figure-caption text-center"></figcaption>
                        </figure>
                        <figure class="figure">
                            <img src="/assets/img/game/<?=$guserfile2?>" class="figure-img img-fluid rounded" data-toggle="modal" data-target="#modal-imgtwo" alt="">
                            <div class="modal" id="modal-imgtwo" tabindex="-1" role="dialog" style="top:100">
                                <div class="modal-dialog-lg" role="document">
                                    <div class="modal-content" style="background-color:transparent;  border:0px; box-shadow:none">
                                        <div class="modal-header" style="border-bottom-color:transparent;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="/assets/img/game/<?=$guserfile2?>" class="figure-img img-fluid" alt="second-picture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="figure-caption text-center"></figcaption>
                        </figure>
                    </div>
					<?=$game_article?>
                    <hr>
					<div class="container">
						<div class="form-group">
							<label for="answer"><h3>ANSWER</h3></label>
							<input type="text" name="nazoanswer" class="form-control" id="answer" placeholder="정답을 입력하세요"value="" required>
							<div class="invalid-feedback">
								정답을 입력해주세요.
							</div>
						</div>
						<div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">정답 확인</button>
						</div>
					</div>
                    <div class="container">
                        <a data-toggle="modal" class="already" data-target="#hint">힌트를 보시겠습니까?</a>
                        <div class="modal fade" id="hint" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel"><strong>힌트 보기</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    <a class="list-group-item list-group-item-action" id="list-hint1-list" data-toggle="list" href="#list-hint1" role="tab" aria-controls="hint1">힌트1</a>
                                                    <a class="list-group-item list-group-item-action" id="list-hint2-list" data-toggle="list" href="#list-hint2" role="tab" aria-controls="hint2">힌트2</a>
                                                    <a class="list-group-item list-group-item-action" id="list-hint3-list" data-toggle="list" href="#list-hint3" role="tab" aria-controls="hint3">힌트3</a>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade" id="list-hint1" role="tabpanel" aria-labelledby="list-hint1-list"><?=$game_hint?></div>
                                                    <div class="tab-pane fade" id="list-hint2" role="tabpanel" aria-labelledby="list-hint2-list"><?=$game_hint2?></div>
                                                    <div class="tab-pane fade" id="list-hint3" role="tabpanel" aria-labelledby="list-hint3-list"><?=$game_hint3?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
		<?PHP
		if($nazoanswer!=""){
		if ($nazoanswer == $game_answer){
			$littlesamakfox_logon[2] = $littlesamakfox_logon[2]+$game_score;
			$littlesamakfox_logon[3] = $littlesamakfox_logon[3]+$game_score;
			$query = "update member_tab set mem_coin='$littlesamakfox_logon[2]', mem_savecoin='$littlesamakfox_logon[3]' where mem_id='$littlesamakfox_logon[0]'";
			mysql_query( $query, $con );
			echo("
					<script>
					  window.alert('정답입니다 ^^');
					  history.go(-1);
					</script>
			");
			exit;
		  }
		  else{
			echo("
				<script>
					window.alert('정답이 아닙니다 ㅡㅡ');
					history.go(-1);
				</script>
				");
			exit;
		   }
		  }
		 ?>


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

    <div id="loader">
            <div class="loading-imgcenter">
                <img src="/assets/img/loading.gif">
                <div class="card-body">
                    <h5><small class="text-muted">Now Loading</small></h5>
                </div>
            </div>
        </div>
    <!-- JavaScript: placed at the end of the document so the pages load faster -->
    <!-- 로딩 이미지-->
    <script>
            var littlesamakfox;

            function myFunction() {
                littlesamakfox = setTimeout(showPage, 1000);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("littlesamakfox").style.display = "block";
            }
    </script>
     <!--시간 타이머-->
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date().getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();
    
            // Find the distance between now an the count down date
            var distance = now-countDownDate;
    
            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            // Output the result in an element with id="demo"
            document.getElementById("playtime").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";
    
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("playtime").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    <!--폼 에러 판별-->
    <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';

                window.addEventListener('load', function () {
                    var form = document.getElementById('needs-validation');
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                }, false);
            })();
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>