<?php
	declare(strict_types = 1);

	namespace src\api\formatter {
		use PDOStatement;

		/**
		 * ## Class JsonFormat
		 * 表示形式をJSONに変更する
		 * @see \json_encode
		 */
		class JsonFormat {
			use Format;

			function convert(PDOStatement $database): String {
				$idx = 0;
				while($col = $database->fetch()) {
					$this->data['result'] += array($idx => $col);
					$idx++;
				}

				/** ## JSONの形式 */
				$opt = 0;
				$opt += JSON_NUMERIC_CHECK;
				$opt += JSON_UNESCAPED_UNICODE;
				return json_encode($this->data, $opt);
			}
		}
	}
