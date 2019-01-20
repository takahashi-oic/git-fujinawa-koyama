<?php
	declare(strict_types = 1);
	require_once('.result.php');
	echo result('questionnaire_view', 'answer_num, ans_day, in_airport, out_airport');
