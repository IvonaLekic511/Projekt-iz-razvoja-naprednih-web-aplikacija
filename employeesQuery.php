<?php
require('db.php');
$output = '';
$searchFname = '';
$searchLname = '';
if(isset($_POST['first_name']) && !(isset($_POST['last_name'])))
{
    $searchFname = mysqli_real_escape_string($conn, $_POST['first_name']);
 
    $query = "SELECT * FROM employees.employees
    WHERE first_name LIKE '%".$searchFname."%'";
}
else if(!(isset($_POST['last_name'])) && isset($_POST['last_name']))
 {
    $searchLname = mysqli_real_escape_string($conn, $_POST['last_name']);
 
    $query = "SELECT * FROM employees.employees
    WHERE last_name LIKE '%".$searchLname."%'";
 }
else if(isset($_POST['first_name']) && isset($_POST['last_name']))
{
    $searchFname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $searchLname = mysqli_real_escape_string($conn, $_POST['last_name']);
 
    $query = "SELECT * FROM employees.employees
    WHERE first_name LIKE '%".$searchFname."%'
    AND last_name LIKE '%".$searchLname."%'";
}
else
{
    echo 'Unesite parametre';
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
    <thead>
   <tr>
     <th>ID zaposlenika</th>
     <th>Ime</th>
     <th>Prezime</th>
     <th>Datum zaposlenja</th>
    </tr>
    </thead>';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td data-label='.'ID zaposlenika'.'>'.$row1["emp_no"].'</td>
    <td data-label='.'Ime'.'>'.$row1["first_name"].'</td>
    <td data-label='.'Prezime'.'>'.$row1["last_name"].'</td>
    <td data-label='.'Datum zaposlenja'.'>'.$row1["hire_date"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Traženi zaposlenik ne postoji';
}
?>