<?php 

include './core/patient.php';

// Extended Patient Model
class my_patient extends patient
{

	function findByNameMypatient($name){
		
		
		echo '<pre>';
		print_r(parse_str($_SERVER["QUERY_STRING"]));
		echo '</pre>';
		die(__FILE__.' '.__LINE__);
		
		patient::findByName();
	}
}