<?php	
	class validation 
	{
		
	 	function validDate($day,$month,$year)
		{
			if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year) || $day > 31 || $day < 1 || $month > 12 || $month < 1 || $year < 1900 || $year > 2020) {
				return 0;
			} else if ($month == 2) {
				if ($day > 29) {
					return 0;
				}
				if ($day == 29 && $year % 4 != 0) {
					return 0;
				}
			
			} else if ($month == 4 || $month == 6 || $month == 9 || $month == 11 && $day == 31){
				return 0;
			} else {
				return 1;
			} 
		}
		function checkLength($word,$minmum,$maximum){
			if(strlen($word) > $maximum || strlen($word) < $minmum)
				return 0;
			else return 1;
		}

		function strongpassword($password){
			if (strlen($password) >= 10 && filter_var($password, FILTER_VALIDATE_INT) == false) {
				return 1;
			}else{
				return 0;
			}
		}

		function validemail($email){
			if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
				return 1;
			}else{
				return 0;
			}
		}

		function validprice($number){
			if(is_numeric($number) && strlen($number) < 4){return 1;}
			else {return 0;}
		}


}