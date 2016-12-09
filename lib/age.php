<?php 

class Age{
	
	public $age;
	
	public function Age($age) {
		$bday = new DateTime($age);
		$today = new DateTime();
		
		$diff = $today->diff($bday);
		return $diff;
	}
}

?>