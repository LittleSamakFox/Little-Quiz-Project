<?PHP
	session_start();
?>
<html lang="ko">
	<head>
		<meta charset = "utf-8">
		<title>상점입니다</title>
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
							<li class="nav-item">
                                <a class="nav-link" href="/ranking.php">랭킹</a>
                            </li>
							<li class="nav-item active">
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
										<a href="/shop.php?logout=ok" class="btn btn-primary btn-pill">로그아웃</a>
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

	<div id="shop" class="container mb-3" align="center">
		<div class="card" style="max-width:1024px; position:relative">
			<div class="card-body" align="center">
				<div class="intro">
					<h1 class="mt-3 mb-3 text-center"><i class="icon ion-ios-cart-outline"></i></h1>
					<h1>상점</h1>
					<p>와! 너무 멋지다!</p>
					 <?PHP
								#--------------로그인 되었는지를 비교--------------------#
								if (session_is_registered('littlesamakfox_logon')){
								?>
								 <p class="text-muted" align="right">안녕하세요 <?PHP print $littlesamakfox_logon[0]; ?>님</p>
								 <p class="text-muted" align="right">가지고 있는 코인의 갯수는 총 <?PHP print $littlesamakfox_logon[2]; ?> 개 입니다.</p>
								 <?PHP
								 }
								 else{
							?>
								<p class="text-muted" align="right">로그인이 필요합니다.</p>
							<?PHP
								}
							?>
				</div>
				<hr>
				<form action="/shop_db.php" method="post">
					<div class="row">
						<div class="col-6 col-sm-6 col-md-4 col-xl-3 item">
							<div class="card border-dark mb-5">
								<img class="card-img-top img-thumbnail littlesamakfox-itemimg" src="/assets/img/shop/1.jpg" alt="아이템1">
								<div class="card-body">
									<p class="card-title littlesamakfox-color"><small><strong>아이콘</strong></small></p>
									<h4 class="card-text"><a class="font-weight-bold">와!</h4></a>
									<?PHP
										if ($littlesamakfox_logon[4]==1){
										?>
										 <p class="text-muted" align="left">이미 구매되었습니다</p>
										 <?PHP
										 }
										 else{
									?>
										<input class="btn btn-primary btn-pill mr-3" type="submit" value="구매하기">
									<?PHP
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-6 col-md-4 col-xl-3 item">
							<div class="card border-dark mb-5">
								<img class="card-img-top img-thumbnail littlesamakfox-itemimg" src="/assets/img/shop/2.jpg" alt="아이템2">
								<div class="card-body">
									<p class="card-title littlesamakfox-color"><small><strong>아이콘</strong></small></p>
									<h4 class="card-text"><a class="font-weight-bold">와우!</h4></a>
									<?PHP
										if ($littlesamakfox_logon[4]==1){
										?>
										 <p class="text-muted" align="left">이미 구매되었습니다</p>
										 <?PHP
										 }
										 else{
									?>
										<input class="btn btn-primary btn-pill mr-3" type="submit" value="구매하기">
									<?PHP
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-6 col-md-4 col-xl-3 item">
							<div class="card border-dark mb-5">
								<img class="card-img-top img-thumbnail littlesamakfox-itemimg" src="/assets/img/shop/3.jpg" alt="모자이크">
								<div class="card-body">
									<p class="card-title littlesamakfox-color"><small><strong>배경 이미지</strong></small></p>
									<h4 class="card-text"><a class="font-weight-bold">와! 너무</h4></a>
									<?PHP
										if ($littlesamakfox_logon[4]==1){
										?>
										 <p class="text-muted" align="left">이미 구매되었습니다</p>
										 <?PHP
										 }
										 else{
									?>
										<input class="btn btn-primary btn-pill mr-3" type="submit" value="구매하기">
									<?PHP
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm-6 col-md-4 col-xl-3 item">
							<div class="card border-dark mb-5">
								<img class="card-img-top img-thumbnail littlesamakfox-itemimg" src="/assets/img/shop/4.jpg" alt="모자이크">
								<div class="card-body">
									<p class="card-title littlesamakfox-color"><small><strong>배경 이미지</strong></small></p>
									<h4 class="card-text"><a class="font-weight-bold">와! 너무 멋지다</h4></a>
									<?PHP
										if ($littlesamakfox_logon[4]==1){
										?>
										 <p class="text-muted" align="left">이미 구매되었습니다</p>
										 <?PHP
										 }
										 else{
									?>
										<input class="btn btn-primary btn-pill mr-3" type="submit" value="구매하기">
									<?PHP
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</form>
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