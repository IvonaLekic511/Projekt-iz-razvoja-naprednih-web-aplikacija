<?php
    
	if(!extension_loaded("soap")){
	  dl("php_soap.dll");
	}
	ini_set("soap.wsdl_cache_enabled",0);
	$server = new SoapServer("salaries.wsdl");


	function findSalaries($salary){
		include('../db.php');
        
		$salaries = strtoupper($salary);
		$output = '';
		$query = "SELECT * FROM employees.salaries WHERE salary = '".$salaries."'";
		$result = mysqli_query($conn, $query);
		//$result = $conn->query($query);
    if(mysqli_num_rows($result) > 0)
		{
			
    
 		while($row1 = mysqli_fetch_assoc($result))
 		{
			$output .= '
			<tr>
			  <td>'.$row1["emp_no"].'</td>
			  <td>'.$row1["salary"].'</td>
			  <td>'.$row1["from_date"].'</td>
			  <td>'.$row1["to_date"].'</td>
			 </tr>
			';
 		}
		 return $output;
		}
		else {
			return 'tražena plaća '.$salaries.' ne postoji!';
		}

	}
	
	$server->AddFunction("findSalaries");
	$server->handle();
?>