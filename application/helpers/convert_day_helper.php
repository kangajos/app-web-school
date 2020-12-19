<?php
function getDay($day)
{
	$hari = null;
	switch ($day) {
		case "Monday":
			$hari = "Senin";
			break;
		case "Tuesday":
			$hari = "Selasa";
			break;
		case "Wednesday":
			$hari = "Rabu";
			break;
		case "Thursday":
			$hari = "Kamis";
			break;
		case "Friday":
			$hari = "Jumat";
			break;
		case "Saturday":
			$hari = "Sabtu";
			break;
		default:
			$hari = "Minggu";
			break;
	}
	return $hari;
}
