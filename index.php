<?php
	session_start();
	if(isset($_SESSION['id'])){
		header("Location: top.php");
	}
?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>本当の性別診断サイト（情報工学実験）</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html">本当の性別診断サイト</a></h1>
								<span>無料で性別診断しよう</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
								<!--	<li class="current"><a href="index.php">Top Page</a></li>
									<li><a href="#">診断とは？</a></li>
									<li><a href="left-sidebar.html">このサイトについて</a></li>-->
									<li><a href="#register_form" rel="leanModal">会員登録</a></li>
									<li><a href="#login_form" rel="leanModal">ログイン</a></li>
								</ul>
							</nav>

					</header>
				</div>

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="7u 12u(medium)">
								<h2>性別診断しませんか？</h2>
								<p>このサイトは慶應義塾⼤学理⼯学部の情報⼯学実験のために作成したものです。実際には利用できません。</p>
							</div>
							<div class="5u 12u(medium)">
								<ul>
									<li><a href="#register_form" rel="leanModal" class="button big icon fa-arrow-circle-right">会員登録</a></li>
									<li><a href="#login_form" rel="leanModal" class="button alt big icon fa-question-circle">ログイン</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>診断を受ける</h2>
												<!-- <p>Maybe here as well I think</p> -->
											</header>
											<p>世界中の人が作成した診断を受けることができます。</p>
										</div>
									</section>

							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>診断を作成する</h2>
												<!-- <p>This is also an interesting subtitle</p> -->
											</header>
											<p>診断を受けるだけではなく、自分の力で新しい診断を生み出すことができます。</p>
										</div>
									</section>

							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>自分の性別を確認しよう</h2>
												<!-- <p>Here's another intriguing subtitle</p> -->
											</header>
											<p>毎日診断してがんばりましょう。</p>
										</div>
									</section>

							</div>
						</div>
					</div>
				</div>
<div id="main-wrapper">
<div class="container">
<img src="images/sample.png">
</div>
</div>
			<!-- Main -->
				<!-- <div id="main-wrapper">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u(medium)">

								<!-- Sidebar -->
									<!-- <div id="sidebar">
										<section class="widget thumbnails">
											<h3>Interesting stuff</h3>
											<div class="grid">
												<div class="row 50%">
													<div class="6u"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a></div>
												</div>
											</div>
											<a href="#" class="button icon fa-file-text-o">More</a>
										</section>
									</div>

							</div>
							<div class="8u 12u(medium) important(medium)"> -->

								<!-- Content -->
									<!-- <div id="content">
										<section class="last">
											<h2>So what's this all about?</h2>
											<p>This is <strong>Verti</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
											Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
											<a href="#" class="button icon fa-arrow-circle-right">Continue Reading</a>
										</section>
									</div>

							</div>
						</div>
					</div>
				</div> -->

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<!-- <div class="3u 6u(medium) 12u$(small)"> -->

								<!-- Links -->
									<!-- <section class="widget links">
										<h3>Random Stuff</h3>
										<ul class="style2">
											<li><a href="#">Etiam feugiat condimentum</a></li>
											<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
											<li><a href="#">Sed porttitor cras in erat nec</a></li>
											<li><a href="#">Felis varius pellentesque potenti</a></li>
											<li><a href="#">Nullam scelerisque blandit leo</a></li>
										</ul>
									</section>

							</div> -->
							<!-- <div class="3u 6u$(medium) 12u$(small)"> -->

								<!-- Links -->
									<!-- <section class="widget links">
										<h3>Random Stuff</h3>
										<ul class="style2">
											<li><a href="#">Etiam feugiat condimentum</a></li>
											<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
											<li><a href="#">Sed porttitor cras in erat nec</a></li>
											<li><a href="#">Felis varius pellentesque potenti</a></li>
											<li><a href="#">Nullam scelerisque blandit leo</a></li>
										</ul>
									</section>

							</div> -->
							<!-- <div class="3u 6u(medium) 12u$(small)"> -->

								<!-- Links -->
									<!-- <section class="widget links">
										<h3>Random Stuff</h3>
										<ul class="style2">
											<li><a href="#">Etiam feugiat condimentum</a></li>
											<li><a href="#">Aliquam imperdiet suscipit odio</a></li>
											<li><a href="#">Sed porttitor cras in erat nec</a></li>
											<li><a href="#">Felis varius pellentesque potenti</a></li>
											<li><a href="#">Nullam scelerisque blandit leo</a></li>
										</ul>
									</section>

							</div> -->
							<div class="3u 6u$(medium) 12u$(small)">

								<!-- Contact -->
								<!--	<section class="widget contact last">
										<h3>Contact Us</h3>
										<ul>
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
										</ul>
										<p>1234 Fictional Road<br />
										Nashville, TN 00000<br />
										(800) 555-0000</p>
									</section>
-->
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; 診断サイト. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- login form -->
		<div id="login_form">
			<h2>ログイン</h2>
			<form method="POST" action="./login_check.php">
			ID:<input type="text" name="login_name"><br>
			パスワード：<input type="password" name="pwd"><br>
			<input type="submit" value="ログイン">
			</form>
		</div>
		
		<div id="register_form">
			<h2>新規登録</h2>
			<form method="POST" action="./regist.php">
			ID:<input type="text" name="login_name"><br>
			パスワード：<input type="password" name="pwd"><br>
			性別：<input type="radio" name="sex" value="1">男&nbsp;&nbsp;<input type="radio" name="sex" value="2">女<br><br>
			<input type="submit" value="登録">
			</form>
		</div>
		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/jquery.leanModal.min.js"></script>
			<script src="assets/js/toppage.js"></script>

	</body>
</html>
