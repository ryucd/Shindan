<?
	if(!isset($_SESSION['id'])){
		session_start();
	}
	if(!isset($_SESSION['id'])){
		include "setting.php";
		gotoindex();
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
		<link rel="stylesheet" href="assets/css/my.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
				<img src="images/sample.png">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="top.php">本当の性別診断</a></h1>
								<!--<span>無料でいろいろな診断！</span>-->
							</div>

						<!-- Nav -->
						<?php
							$page = 0;
							$ins = array('', '', '', '', '', '', '');
							$current =" class=\"current\"";
							if(isset($_GET['pagename'])){
								switch($_GET['pagename']){
									case "top":
										$page = 0;
										break;
									case "list":
										$page = 1;
										break;
									case "posting":
										$page = 2;
										break;
									case "log":
										$page = 3;
										break;
									case "search":
										$page = 4;
										break;
									case "logout":
										$page = 5;
										break;
									default:
										$page = 6;
										break;
								}
								$ins[$page] = $current;
							}
							?>
							<nav id="nav">
								<ul>
									<li<? print $ins[0]; ?>><a href="top.php">Top Page</a></li>
									<li<? print $ins[1]; ?>><a href="lists.php">診断一覧</a></li>
									<li<? print $ins[2]; ?>><a href="posting.php">診断作成</a></li>
									<li<? print $ins[3]; ?>><a href="log.php">診断履歴</a></li>
									<li<? print $ins[4]; ?>><a href="search.php">診断検索</a></li>
									<li<? print $ins[5]; ?>><a href="logout.php" id="logout">ログアウト</a></li>
								</ul>
							</nav>

					</header>
				</div>
				
				<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u$(medium)">
								<div id="sidebar">

									<!-- Sidebar -->
										<section>
											<h3>メニュー</h3>
											<ul class="style2">
												<li><a href="lists.php">診断一覧</a></li>
												<li><a href="log.php">診断履歴</a></li>
												<li><a href="posting.php">診断作成</a></li>
												<li><a href="search.php">診断検索</a></li>
											</ul>
										</section>
										
										
										<section>
											<h3>アカウント設定</h3>
											<ul class="style2">
												<li><a href="password.php">登録情報変更</a></li>
												<li><a href="logout.php" id="logout">ログアウト</a></li>
											</ul>
										</section>

								</div>
							</div>
							<div class="8u 12u$(medium) important(medium)">
								<div id="content">
