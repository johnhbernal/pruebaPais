<?php 

include 'base.php';

// Patient Model
// Clase del Core
class patient extends base
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

    public function list_all()
    {
        $result_array = array();
        $result = $this->db->query('select * from patients');

        return parent::result_array($result);
    }
    
    
    public function findByAge($age){
    	$result_array = array();
    	$result = $this->db->query('select * from patients where patient_age >= '.$age);
    	
    	return parent::result_array($result);
    	
    }
    public function findAndGroupByAge(){
    	$result_array = array();
    	$result = $this->db->query("SELECT *,
										CASE WHEN `patient_age` < 18 THEN 'menor de edad' 
									    WHEN `patient_age` BETWEEN 18 and 40 THEN 'Persona Joven' 
									    WHEN `patient_age` BETWEEN 40 and 65 THEN 'Persona Adulta' 
									    WHEN `patient_age` >= 65  THEN 'Persona mayor' 
									    WHEN `patient_age` IS NULL THEN 'Campos sin edad (NULL)' 
									    END range_age
									    FROM patients GROUP BY `patient_age`");
    	
    	return parent::result_array($result);
    	
    }
    
    public function findByName($name){
    	
//     	$usuario =parse_str($_SERVER['QUERY_STRING']);

    	var_dump(parse_str($_SERVER["QUERY_STRING"]));

    	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    	
    	$parts = parse_url($url);
    	parse_str($parts['query'], $query);
    	echo $query['email'];
    	
    	
    	    	echo '<pre>';
    	    	print_r($actual_link);
    	    	echo '</pre>';
    	    	die(__FILE__.' '.__LINE__);

//     	$usuario = $_GET['findByName'];
    	foreach ($_GET as $key => $value)

//     	var_dump($_GET[]);
//     	$name='aa';
    	$result_array = array();
    	$filterByName='%'.$name.'%';
//     	$sql='select * from patients where patient_name like "'.$name.'"';
    	$sql='select * from patients';
    	
    	$result = $this->db->query($sql);
//      	$followingdata = $result->fetch_assoc();

    	$results = array ();
    	while($resultados = mysqli_fetch_array($result)) {
    		$results[]=[
    		$results['name']= $resultados['patient_name'],
    		$results['age ']= $resultados['patient_age'],
    		$results['phone'] = $resultados['patient_phone'],
    		];
    	}
     	
    	json_encode($results);    
    	$this->__destruct();
    }
}