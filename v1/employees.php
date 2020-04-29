<?php

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Retrieve Employees
        if(!empty($_GET["emp_no"]))
        {
            $emp_no=intval($_GET["emp_no"]);
            get($emp_no);
        }
        else
        {
            get();
        }
        break;
    case 'POST':
    // Insert Employee
        insert();
        break;
    case 'PUT':
    // Update Emoloyee
        $emp_no=intval($_GET["emp_no"]);
        update($emp_no);
        break;
    case 'DELETE':
    // Delete Emoloyee
        $emp_no=intval($_GET["emp_no"]);
        delete($emp_no);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get($emp_no=0)
{
    include ('../db.php');

    $query="SELECT * FROM employees.employees";
    if($emp_no != 0)
    {
        $query.=" WHERE emp_no=".$emp_no." LIMIT 1";
    }
    $response=array();
    $result=mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert()
{
    include ('../db.php');

    $data = json_decode(file_get_contents('php://input'), true);
    $emp_no=$data["emp_no"];
	$first_name=$data["first_name"];
    $last_name=$data["last_name"];
	$hire_date=$data["hire_date"];
	
    $query="INSERT INTO employees.employees(emp_no,first_name,last_name,hire_date) VALUES('".$emp_no."','".$first_name."','".$last_name."','".$hire_date."')";
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Zaposlenik '.$emp_no.' '.$first_name.' '.$last_name.' '.$hire_date.' je uspješno dodan.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Dodavanje zaposlenika nije uspjelo.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function update($emp_no)
{
    include ('../db.php');

    $data = json_decode(file_get_contents("php://input"),true);
    //$emp_no = $data["emp_no"];
    $first_name=$data["first_name"];
    $last_name=$data["last_name"];
    $last_update=$data["last_update"];

    $query="UPDATE semployees.employees SET first_name='".$first_name."', last_name='".$last_name."', last_update=".$last_update." WHERE emp_no=".$emp_no;
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Zaposlenik '.$first_name.' '.$last_name.' with emp_no of '.$emp_no.' je uspješno ažuriran.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Ažuriranje zaposlenika nije uspjelo.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete($emp_no)
{
    include ('../db.php');

    $query="DELETE FROM employees.employees WHERE emp_no=".$emp_no;
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Zaposlenik je uspješno izbrisan'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Brisanje zaposlenika nije uspjelo.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>