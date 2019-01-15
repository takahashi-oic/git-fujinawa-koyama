<?php
	declare(strict_types = 1);

	/**
	 * ## Class Format
	 * データベースの表示形式を変更する
	 */
	class Format {
		/** @var array データベース内容 */
		protected $data = array('msg' => null, 'result' => array());

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toCsv(PDOStatement $database): string {
			header('Content-type: text/csv');

			$result = '';
			$length = $database->columnCount();

			while($col = $database->fetch(PDO::FETCH_ASSOC)) {
				$cnt = 0;
				foreach($col as $value) {
					$result .= strval($value);
					if($cnt++ < $length - 1) $result .= ','; else $result .= "\n";
				}
			}

			return $result;
		}

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toJson(PDOStatement $database): string {
			header('Content-type: application/json');

			$idx = 0;
			while($col = $database->fetch()) {
				$this->data['result'] .= array($col);
				$idx++;
			}

			/** ## JSONの形式 */
			$opt = 0;
			$opt += JSON_NUMERIC_CHECK;
			$opt += JSON_UNESCAPED_UNICODE;
			return json_encode($this->data, $opt);
		}

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toXml(PDOStatement $database): string {
			header('Content-type: application/xml');

			$header = '<?xml version="1.0" encoding="UTF-8" ?>';
			$root = new SimpleXMLElement($header . '<api></api>');

			$msg = $root->addChild('msg', null);
			$result = $root->addChild('result');
			while($col = $database->fetch()) foreach($col as $key => $value) $result->addChild($key, $value);

			$dom = new DOMDocument('1.0');
			$dom->loadXML($root->asXML());
			$dom->formatOutput = true;
			return $dom->saveXML();
		}
	}
