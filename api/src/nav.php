<?php
	$root = "http://127.0.0.1/git-fujinawa-koyama/";

	function api_list(string $href, string $value): string {
		return "
		<li>
		<a href=\"{$href}\" class=\"blue-text text-darken-2\">{$value}</a>
		</li>";
	}

?>

<ul id="slide-out" class="sidenav sidenav-fixed">
	<div class="row">
		<a href="<?= $root ?>index.php">
			<i class="medium material-icons left black-text" id="homebtn">home</i>
		</a>
	</div>

	<div>
		<p>　はじめに</p>
		<li><a href="<?= $root ?>apiMain.php#" class="blue-text text-darken-2">API概要</a></li>
		<li><a href="<?= $root ?>Moredetail.php#" class="blue-text text-darken-2">API詳細仕様</a></li>
		<p>　API一覧</p>

		<?= api_list("#!", "全集計結果") ?>
		<?= api_list("#!", "アンケートごとの集計結果") ?>
		<?= api_list("#!", "性別一覧") ?>
		<?= api_list("#!", "国一覧") ?>
		<?= api_list("#!", "観光地一覧") ?>
		<?= api_list("#!", "購入したもの一覧") ?>

		<!--
		<li><a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">国一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">購入したもの一覧</a></li>
		-->
	</div>
</ul>
