<?php
	declare(strict_types = 1);

	// 表示形式決定
	switch(rand(0, 2)) {
		case 0:
			$_GET['format'] = 'csv';
			break;

		case 1:
			$_GET['format'] = 'json';
			break;

		case 2:
			$_GET['format'] = 'xml';
			break;

		// 何かあった時のため
		default:
			$_GET['format'] = 'json';
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

		<?php // 使用例の外部CSS読込みJavaScript ?>
		<script type="text/javascript" src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
		<style type="text/css"></style>

		<title>アンケートAPI-API詳細仕様</title>
	</head>

	<?php /*
	<header>
	<div class="card-panel row s12 light-green lighten-1"><span class="white-text">API仕様書</span></div>
	<div class="col s12">
	<ul class="tabs">
		<li class="tab col s3" id="home"><a href="index.php"><span class="light-green-text text-lighten-1">ホーム</span></a></li>
	</ul>
	</div>
	</header>
	*/ ?>

	<body>
		<?php
			// left_nav
			include_once('../api/src/nav.php');
		?>
		<div class="container">
			<div class="row">
				<div class="col s12 offset-s2">
					<h2>API詳細仕様</h2>
					<br>

					<div class="col s12 m8 offset-s1 x17 offset-x1">
						<div id="purpose" class="section scrollspy">
							<h3 id="header">開発目的</h3>
							<p>
								このAPIは、専門学校岡山情報ビジネス学院・情報スペシャリスト学科3年が卒業開発のために開発したAPIです。
								<br>
								「ITを用いて岡山県を盛り上げる」ことをテーマに開発されています。
							</p>
						</div>

						<div id="response" class="section scrollspy">
							<h3 id="header">Content-Typeについて</h3>
							<p>charsetはすべてUTF-8です。</p>
							<div class="row">
								<div class="col s12 ">
									<table>
										<tbody>
											<tr>
												<td>csv</td>
												<td>text/csv</td>
											</tr>
											<tr>
												<td>json</td>
												<td>application/json</td>
											</tr>
											<tr>
												<td>xml</td>
												<td>application/xml</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div id="sample" class="section scrollspy">
							<h3 id="header">使用例</h3>
							<div>
								<p>HTTPリクエスト</p>
								<pre class="prettyprint">GET http://localhost/git-fujinawa-koyama/api/database.php?format=<?= $_GET['format'] ?></pre>
							</div>
						</div>
					</div>
				</div>

				<?php // right_nav ?>
				<div class="col hide-on-small-only m3 x13 offset-x11">
					<ul class="section table-of-contents pinned">
						<li><a href="#purpose">開発目的</a></li>
						<li><a href="#response">Content-Typeについて</a></li>
						<li><a href="#sample">使用例</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
