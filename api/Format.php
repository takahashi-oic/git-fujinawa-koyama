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
			$length = $database->columnCount() - 1;

			// Column Name
			for($col = 0; $col < $length + 1; $col++) {
				$result .= $database->getColumnMeta($col)['name'];
				if($col < $length) $result .= ','; else $result .= "\n";
			}

			// Column Value
			$cnt = 0;
			while($col = $database->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $key => $value) {
					$result .= $value;
					if($cnt++ < $length) $result .= ','; else {
						$result .= "\n";
						$cnt = 0;
					}
				}
			}

			$database->closeCursor();
			return $result;
		}

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(JSON)
		 */
		public function toJson(PDOStatement $database): string {
			header('Content-type: application/json');

			$idx = 0;
			while($col = $database->fetch(PDO::FETCH_ASSOC)) {
				$data = array();
				foreach($col as $key => $value) $data += array($key => $value);

				$this->data['result'] += array($idx => $data);

				$idx++;
			}

			// region JSON Setting
			$opt = 0;
			$opt += JSON_NUMERIC_CHECK;
			$opt += JSON_UNESCAPED_UNICODE;
			// endregion JSON Setting
			$database->closeCursor();
			return json_encode($this->data, $opt);
		}

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(XML)
		 */
		public function toXml(PDOStatement $database): string {
			header('Content-type: application/xml');

			$header = '<?xml version="1.0" encoding="UTF-8" ?>';
			$root = new SimpleXMLElement($header . '<api />');

			// region XML Element
			$msg = $root->addChild('msg');
			$results = $root->addChild('results');

			while($col = $database->fetch()) {
				$result = $results->addChild('result');
				foreach($col as $key => $value) $result->addChild(strval($key));
			}
			// endregion XML Element

			// region XML Format
			$dom = new DOMDocument('1.0');
			$dom->loadXML($root->asXML());
			$dom->formatOutput = true;
			// endregion XML Format

			$database->closeCursor();
			return $dom->saveXML();
		}
	}
