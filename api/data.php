<?php
	declare(strict_types = 1);

	require_once('Select.php');
	require_once('Format.php');

	$query = new Select('	answer_info AS ans LEFT JOIN country ON ans.answer_num = country.answer_num LEFT JOIN age ON ans.answer_num = age.answer_num LEFT JOIN sex ON ans.answer_num = sex.answer_num LEFT JOIN inandout_airport airport ON ans.answer_num = airport.answer_num LEFT JOIN tourism1 AS t1 ON ans.answer_num = t1.answer_num LEFT JOIN tourism2 AS t2 ON ans.answer_num = t2.answer_num LEFT JOIN tourism3 AS t3 ON ans.answer_num = t3.answer_num LEFT JOIN tourism4 AS t4 ON ans.answer_num = t4.answer_num LEFT JOIN tourism5 AS t5 ON ans.answer_num = t5.answer_num LEFT JOIN purchases1 AS p1 ON ans.answer_num = p1.answer_num LEFT JOIN purchases2 AS p2 ON ans.answer_num = p2.answer_num LEFT JOIN purchases3 AS p3 ON ans.answer_num = p3.answer_num LEFT JOIN purpose ON ans.answer_num = purpose.answer_num LEFT JOIN sns ON ans.answer_num = sns.answer_num', '	ans.answer_num, age.age, sex.sex,	airport.in_airport, airport.out_airport, t1.tourism1, t2.tourism2,	t3.tourism3, t4.tourism4,	t5.tourism5, p1.purchases1,	p2.purchases2, p3.purchases3,	purpose.purpose, sns.sns');
	$data = $query->query();

	$fmt = new Format();
	if(key_exists('format', $_GET)) {
		switch(strtolower($_GET['format'])) {
			case 'csv':
				$result = $fmt->toCsv($data);
				break;

			case 'json':
				$result = $fmt->toJson($data);
				break;

			case 'xml':
				$result = $fmt->toXml($data);
				break;

			default:
				http_response_code(400);
				exit(400);
		}
		echo $result;
	} else {
		http_response_code(400);
		exit(400);
	}

