<?php
require('db.php');
$output = '';
$searchEmpno = '';
$searchTitle = '';
if(isset($_POST['emp_no']) && !(isset($_POST['title'])))
{
    $searchEmpno = mysqli_real_escape_string($conn, $_POST['emp_no']);
 
    $query = "SELECT * FROM employees.titles
    WHERE emp_no LIKE '%".$searchEmpno."%'";
}
else if(!(isset($_POST['title'])) && isset($_POST['title']))
 {
    $searchTitle = mysqli_real_escape_string($conn, $_POST['title']);
 
    $query = "SELECT * FROM employees.titles
    WHERE title LIKE '%".$searchTitle."%'";
 }
else if(isset($_POST['emp_no']) && isset($_POST['title']))
{
    $searchEmpno = mysqli_real_escape_string($conn, $_POST['emp_no']);
    $searchTitle = mysqli_real_escape_string($conn, $_POST['title']);
 
    $query = "SELECT * FROM employees.titles
    WHERE emp_no LIKE '%".$searchEmpno."%'
    AND title LIKE '%".$searchTitle."%'";
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
     <th>Titula</th>
     <th>Od datuma</th>
     <th>Do datuma</th>
    </tr>
    </thead>';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td data-label='.'ID zaposlenika'.'>'.$row1["emp_no"].'</td>
    <td data-label='.'Titula'.'>'.$row1["title"].'</td>
    <td data-label='.'Od datuma'.'>'.$row1["to_date"].'</td>
    <td data-label='.'Do datuma'.'>'.$row1["to_date"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Tražena titula ne postoji';
}
?>