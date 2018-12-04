<?php
	switch(rand(0, 2)) {
		case 0:
			$_GET['format'] = 'json';
			break;
		case 1:
			$_GET['format'] = 'xml';
			break;
		case 2:
			$_GET['format'] = 'csv';
			break;
	}
?>

<!DOCTYPE html>

<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<!-- Material icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

		<!-- 使用例の外部CSS読込みJavaScript -->
		<script type="text/javascript" src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
		<style type="text/css"></style>

		<title>アンケートAPI-API詳細仕様</title>
	</head>

	<!--
	<header>
			<div class="card-panel row s12 light-green lighten-1"><span class="white-text">API仕様書</span></div>
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
				</ul>
			</div>
	</header>
	-->

	<body>
		<ul id="slide-out" class="sidenav sidenav-fixed">
			<div class="row">
				<a href="index.php">
					<i class="medium material-icons left black-text" id="homebtn">home</i>
				</a>
			</div>
			<div>
				<p>　はじめに</p>
				<li><a href="apiMain.php" class="blue-text text-darken-2">API概要</a></li>
				<li><a href="Moredetail.php" class="blue-text text-darken-2">API詳細仕様</a></li>
				<p>　API一覧</p>
				<li><a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
				<li><a href="#!" class="blue-text text-darken-2">国一覧</a></li>
                                <li><a href="#!" class="blue-text text-darken-2">空港一覧</a></li>
				<li><a href="#!" class="blue-text text-darken-2">購入したもの一覧</a></li>
			</div>
		</ul>
		<?php include_once('api/src/nav.php'); ?>
		<div class="container">
			<div class="row">
				<div class="col s10 offset-s2">
					<h2>API詳細仕様</h2>
					<br>

					<h4 class="truncate">利用方法</h4>
					<div class="row">
						<p>
							このAPIは、専門学校岡山情報ビジネス学院・情報スペシャリスト学科3年が卒業開発のために開発したAPIです。
							<br>
							「ITを用いて岡山県を盛り上げる」をテーマに開発されています。
						</p>
					</div>

					<h4 class="truncate">レスポンスのContent-Typeについて</h4>
					<p>charsetはすべてUTF-8です。</p>
					<div class="row">
						<div class="col s7 ">
							<table>
								<tbody>
									<tr>
										<td>Json</td>
										<td>application/json</td>
									</tr>
									<tr>
										<td>csv</td>
										<td>text/csv</td>
									</tr>
									<tr>
										<td>xml</td>
										<td>application/xml</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<h4 class="truncate">使用例</h4>
					<div>
						<div>
							<p>HTTPリクエスト</p>
							<pre class="prettyprint">GET http://localhost/git-fujinawa-koyama/api/database.php?format=<?= $_GET['format'] ?></pre>
						</div>

						<div>
							<p>HTTPレスポンス</p>
							<pre class="prettyprint"><?php include_once('./api/database.php') ?></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
