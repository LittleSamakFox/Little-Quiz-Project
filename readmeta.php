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
    <meta name="keywords" content="meta, quiz">
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
											<a href="./editmeta.php?meta_uid=<?=$meta_uid?>" class="btn btn-primary btn-pill">퀴즈수정하기</a>
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
                            <a href="/meta.php?logout=ok" class="btn btn-primary btn-pill">로그아웃</a>
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
		  $query = "select meta_uid, meta_name, meta_score, muserfile, meta_article, meta_initial, meta_played from meta where meta_uid=$meta_uid";
  
		  $result = mysql_query( $query, $con ) or die ( mysql_error() );
  
		  list( $meta_uid, $meta_name, $meta_score, $muserfile, $meta_article, $meta_initial, $meta_played ) 
			= mysql_fetch_array( $result );
	?>
    <div class="register">
            <div class="form-container">
                <form action="#" method="post" class="container" id="needs-validation" novalidate>
					<h5 class="text-left text-muted"><p><<small><?=$meta_initial?></small>></p></h5>
                    <h1 class="text-center"><p><strong><?=$meta_uid?>번째 문제를 평가하세요</strong></p></h1>
                    <h5 class="text-center text-muted"><p><<small><?=$meta_name?></small>></p></h5>
					<h5 class="text-right text-muted"><p><small><?=$meta_played?>명의 유저가 참여하셨습니다</small></p></h5>
                    <hr>
                    <div class="container" align="center">
                        <figure class="figure">
                            <img src="/assets/img/meta/<?=$muserfile?>" class="figure-img img-fluid rounded" data-toggle="modal" data-target="#modal-imgmeta" alt="">
                            <div class="modal" id="modal-imgmeta" tabindex="-1" role="dialog" style="top:100">
                                <div class="modal-dialog-lg" role="document">
                                    <div class="modal-content" style="background-color:transparent;  border:0px; box-shadow:none">
                                        <div class="modal-header" style="border-bottom-color:transparent;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="/assets/img/meta/<?=$muserfile?>" class="figure-img img-fluid" alt="first-picture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="figure-caption text-center"></figcaption>
                        </figure>
                    </div>
					<?=$meta_article?>
                    <hr>
					<div class="container">
						<div class="form-group">
							<label for="answer"><h3>현 점수는 <?=$meta_score?> 입니다. 당신이 생각하시는 점수를 입력하세요</h3></label>
							<input type="text" name="mymeta_score" class="form-control" id="mymetascore" placeholder="메타 점수를 입력하세요"value="" required>
							<div class="invalid-feedback">
								점수를 입력해주세요.
							</div>
						</div>
						<div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">점수 입력하기</button>
						</div>
					</div>
                </form>
            </div>
        </div>
		<?PHP
		if($mymeta_score!=""){
			if($mymeta_score>100 || $mymeta_score<0){
			echo("
					<script>
					  window.alert('0점부터 100점 사이의 점수를 입력해주세요');
					  history.go(-1);
					</script>
			");
			exit;
			}
			else{
			$metasum = $mymeta_score+$meta_score;
			$meta_playadd = $meta_played + 1;
			$metaresult = $metasum/2;
			$query = "update meta set meta_score='$metaresult', meta_played='$meta_playadd' where meta_uid='$meta_uid'";
			mysql_query( $query, $con );
			echo("
					<script>
					  window.alert('메타 점수가 기입되셨습니다');
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