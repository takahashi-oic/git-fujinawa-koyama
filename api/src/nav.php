<?php
	declare(strict_types = 1);
	$root = '/git-fujinawa-koyama/src/';

	/**
	 * ## Class APIDispatcher
	 * APIリストの値を管理するクラス
	 */
	class APIDispatcher {
		// region field
		/** ## リンク先 */
		private $href;

		/** ## 表示名 */
		private $value;
		// endregion field

		// region function
		/**
		 * ## Li constructor.
		 * @param string $href リンク先
		 * @param string $value 表示名
		 */
		public function __construct(string $href, string $value) {
			$this->href = $href;
			$this->value = $value;
		}

		/**
		 * ## 文字列表現
		 * @return string 文字列表現
		 */
		public function __toString() {
			return "<li><a href=\"{$this->href}\" class=\"blue-text text-darken-2\">{$this->value}</a></li>";
		}
		// endregion function
	}

	session_start();
	function homebtn($root) {
		if(isset($_SESSION['userid'])) $home = 'admin'; else $home = 'index';
		return $root . $home . '.php';
	}

?>

<?php print_r($_SESSION) ?>
<ul id="slide-out" class="sidenav sidenav-fixed">
	<div class="row">
		<a href="<?= homebtn($root) ?>">
			<i class="medium material-icons left black-text" id="homebtn">home</i>
		</a>
	</div>

	<div>
		<p>　はじめに</p>
		<?php
			$list = array(
				new APIDispatcher('apiMain.php', 'API概要'),
				new APIDispatcher('Moredetail.php', 'API詳細仕様')
			);
			foreach($list as $elem) print $elem;
		?>
		<!--
		<li><a href="apiMain.php#" class="blue-text text-darken-2">API概要</a></li>
		<li><a href="Moredetail.php#" class="blue-text text-darken-2">API詳細仕様</a></li>
		-->

		<p>　API一覧</p>
		<?php
			$list = array(
				new APIDispatcher('#!', '全集計結果'),
				new APIDispatcher('#!', 'アンケートごとの結果'),
				new APIDispatcher('#!', '性別一覧'),
				new APIDispatcher('#!', '国一覧'),
				new APIDispatcher('#!', '空港一覧'),
				new APIDispatcher('#!', '観光地一覧'),
				new APIDispatcher('#!', '購入したもの一覧'),
			);
			foreach($list as $elem) print $elem;
		?>

		<!--
		<li><a href="#!" class="blue-text text-darken-2">性別一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">国一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">観光地一覧</a></li>
		<li><a href="#!" class="blue-text text-darken-2">購入したもの一覧</a></li>
		-->
	</div>
</ul>
