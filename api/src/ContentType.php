<?php
	include_once "Enumeration.php";

	class ContentType
		extends Enumeration {
		const JSON = "application/json";
		const XML = "application/xml";
		const CSV = "text/csv";
	}
