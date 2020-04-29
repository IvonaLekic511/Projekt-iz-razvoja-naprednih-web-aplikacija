<?php
function returnEmployees($naziv, $num) { 
    include('../db.php');
    
    $firstName = ucfirst(strtolower($naziv));
    $output = '';
		$query = "SELECT * FROM employees.employees WHERE first_name = '".$firstName."' LIMIT ".$num."";
		$result = mysqli_query($conn, $query);
		//$result = $conn->query($query);
    if(mysqli_num_rows($result) > 0)
		{
			
    
 		while($row1 = mysqli_fetch_assoc($result))
 		{
			$output .= '
			<tr>
			  <td>'.$row1["emp_no"].'</td>
			  <td>'.$row1["birth_date"].'</td>
			  <td>'.$row1["first_name"].'</td>
			  <td>'.$row1["last_name"].'</td>
			  <td>'.$row1["gender"].'</td>
			  <td>'.$row1["hire_date"].'</td>
			 </tr>
			';
 		}
		 return $output;
		}
		else {
			return 'traženi zaposlenik '.$firstName.' ne postoji!';
		}
} 
   $server = new SoapServer(null, 
   array('uri' => "http://test-uri/"));
   $server->addFunction("returnEmployees"); 
   $server->handle(); 
?>