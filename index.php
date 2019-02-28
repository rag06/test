<?php

$fileContent = file_get_contents("http://localhost:8080/data.txt");
$players = array();

$individualRecords = explode(',',$fileContent);


foreach($individualRecords as $key => $value) {
	$str = $value;
	$arr = explode(' ', $str);
	$score = array_pop( $arr );
	$name = implode (' ' , $arr);
	$players[$name] = $score;
}

getHighestFromGroup($players);



function getHighestFromGroup( $players) {
	$player1 = '';
	$player2 = '';
	$temp1 = 0;
	$temp2 = 0;
	foreach($players as $key => $value) {
		if (strpos( $value, '*') === false) {
			if($temp1 < $value ) {
				$temp1 = $value;
				$player1 = $key;
			}
		} else {
			$score = rtrim($value,"*");
			if($temp2 < $score ) {
				$temp2 = $score;
				$player2 = $key;
			}
		}
	}
	print_r('Highest out '. $player1 . ' '.$players[$player1]);
	print_r('<br/> ');
	print_r('Highest Not out '. $player2. ' '.$players[$player2]);
}

?>
