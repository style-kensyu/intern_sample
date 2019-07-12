<?php

class calender{

	public function create_calender($schedule_array,$datetime){
		$selectDateTime = new ExpansionDateTime($datetime);
		$year = $selectDateTime->format('Y');
		$month= $selectDateTime->format('m');
		$day  = $selectDateTime->format('d');

		//月初め
    $firstDate = new ExpansionDateTime('first day of '.$datetime);
		$firstWeek = $firstDate->format('w');
		//月終わり
    $lastDate  = new ExpansionDateTime('last day of '.$datetime);
		$lastWeek  = $lastDate->format('w');
		$lastDay 	 = $lastDate->format('d');
		// 次月、前月の始め
		$return_date = new ExpansionDateTime('last day of '.$datetime.' last month');
		$advance_date= new ExpansionDateTime('first day of '.$datetime.' next month');
		$rd = $return_date->format('Y-m-d');
		$ad = $advance_date->format('Y-m-d');

		// テーブルヘッダー部分
		$calender_header = $this->calender_header($year, $month, $day, $rd, $ad);
		$weekday_header  = $this->weekday_header();

		// 初めの空白部分
		$firsttable = "";
		for($i=0;$i<$firstWeek;$i++){
			$td = <<<HTML
			<td class='day--disabled'>
			</td>\n
HTML;
			$firsttable .= $td;
		}

		// カレンダー部分
		$calender = "";
		$today = date("Y-m-d");
		for($j=1;$j<=$lastDay;$j++){
			$date = $year .'-'. $month .'-'. sprintf("%02d",$j);
			$ExpansionDateTime = new ExpansionDateTime($date);
      $holiday = $ExpansionDateTime->holiday();
			$weekday = $ExpansionDateTime->format('D');
			// print($j .' : '. $weekday .' : '. $weeknumber . '<br>');

			if($j == $day){
				//選択した日付
				$color = " class='selectday'";
			}else{
				// 休日であるかどうか
				if($holiday){
					$color = " bgcolor='#ffffc0' title=".$holiday;
				}else{
					$color = $this->week_color($weekday);
				}
			}

			if($today == $date){
				$color = " bgcolor='#6C9BD2'";
			}

			// 予定がある場合追加
			$daytext = "";
			if(in_array($date,$schedule_array)) $daytext .= '<i class="material-icons md-18">schedule</i>';
			$daytext .= $j;

			$td = $this->nomal_table($color,$date,$daytext);

			if(($j+$i)%7 == 0){
				$td .= "\n</tr>\n<tr>\n";
			}

			$calender .= $td;
		}

		// 最後の空白部分
		$lasttable = "";
		for($k=0;$k<(6-$lastWeek);$k++){
			$td = <<<HTML
			<td class='day--disabled'>
			</td>\n
HTML;
			$lasttable .= $td;
		}

		$html = <<<HTML
		<table>
			{$calender_header}
			{$weekday_header}
			<tr>
				{$firsttable}
				{$calender}
				{$lasttable}
			</tr>
		</table>\n
HTML;
		return $html;
	}

//====== private ========

	private function calender_header($year, $month, $day, $rd, $ad){
		$calender_header = <<<HTML
			<tr>
				<th><a href="?date={$rd}" ><i class="material-icons">chevron_left</i></a></th>
				<th colspan="5">{$year}/{$month}/{$day}</th>
				<th><a href="?date={$ad}" ><i class="material-icons">chevron_right</i></a></th>
			</tr>
HTML;
		return $calender_header;
	}

	private function weekday_header(){
		// 曜日
		$weekday = "";
		$wd = array("日","月","火","水","木","金","土");
		foreach($wd as $value){
			$color = $this->week_color($value);
			$weekday .= "<th{$color}>{$value}</th>\n";
		}

		return "\n<tr>\n{$weekday}</tr>\n";
	}

	private function week_color($weekday){
		$result = "";
		switch ($weekday) {
			case 'Sun':
			case '日':
				$result = ' bgcolor = "#FFE4E1" ';
				break;
			case 'Sat':
			case '土':
				$result = ' bgcolor = "#E0FFFF" ';
				break;
		}
		return $result;
	}



	private function nomal_table($color,$date,$i){
		$td = <<<HTML
		<td{$color}>
			<a href="?date={$date}">
				{$i}
			</a>
		</td>\n
HTML;
		return $td;
	}

}

?>
