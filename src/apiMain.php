<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<!-- Material icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<!-- CSS -->
		<style type="text/css">

		</style>
		<title>アンケートAPI-API概要</title>
	</head>
	<!--<header>
			<div class="card-panel row s12 light-green lighten-1"><span class="white-text">API仕様書</span></div>
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
				</ul>
			</div>
	</header>-->
	<body>
		<!--ul id="slide-out" class="sidenav sidenav-fixed">
				<div class="row">
						<a href="index.php"><i class="medium material-icons left black-text" id="homebtn">home</i></a>
				</div>
				<div>
						<p>　はじめに</p>
						<li><a href="apiMain.php" class="blue-text text-darken-2">API概要</a></li>
						<li><a href="Moredetail.php" class="blue-text text-darken-2">API詳細仕様</a></li>
						<p>　API一覧</p>
						<li><a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
						<li><a href="#!" class="blue-text text-darken-2">国一覧</a></li>
						<li><a href="#!" class="blue-text text-darken-2">空港一覧</a></li>
						<li><a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
						<li><a href="#!" class="blue-text text-darken-2">購入したもの一覧</a></li>
				</div>
		</ul -->
		<?php include_once('../api/src/nav.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col s12 offset-s2">
					<h2>API概要</h2>
					<br>
					<div class="col s12 m8 offset-s1 x17 offset-x1">
						<div id="overview" class="section scrollspy">
							<h3 class="header">概要</h3>
							<div class="row">
								<div class="col s12">
									<table>
										<tbody>
											<tr>
												<td>API Endpoint</td>
												<td>http://sotuken2018q.herokuapp.com/api/</td>
											</tr>
											<tr>
												<td>利用可能なHTTPメソッド</td>
												<td>GET</td>
											</tr>

											<tr>
												<td>レスポンスデータフォーマット</td>
												<td>csv</td>
												<td>json</td>
												<td>xml</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<p>※APIキーの使い方については <a href="#">API詳細仕様</a>からご覧になれます。</p>
							<br>
							<br>
							<br>
							<br>
							<br>
						</div>
						<div id="api-list" class="section scrollspy">
							<h3 class="header">API一覧</h3>
							<ul>
								<li>・<a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
								<li>・<a href="#!" class="blue-text text-darken-2">国一覧</a></li>
								<li>・<a href="#!" class="blue-text text-darken-2">空港一覧</a></li>
								<li>・<a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
								<li>・<a href="#!" class="blue-text text-darken-2">購入したもの一覧</a></li>
							</ul>
							<br>
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
					<div class="col hide-on-small-only m3 x13 offset-x11">
						<ul class="section table-of-contents pinned">
							<li>
								<a href="#overview">概要</a>
							</li>
							<li>
								<a href="#api-list">API一覧</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


