<?php
	declare(strict_types = 1);
	include_once "Enumeration.php";

	/**
	 * ## Class ContentType
	 * フォーマット毎のContent-Typeを列挙したクラス
	 */
	class ContentType
		extends Enumeration {
		const JSON = "application/json";
		const XML = "application/xml";
		const CSV = "text/csv";
	}
