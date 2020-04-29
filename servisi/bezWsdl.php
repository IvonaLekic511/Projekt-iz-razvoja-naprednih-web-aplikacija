<?php include("../config.php");
    require('../db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include_once('../head.php');
  ?>
<link rel="stylesheet" type="text/css" href="../style.css" />
<body>

        <?php
            require('../navbar.php');
            require('../menu.php');
        ?>
        
        <div class="row">
        <div class="col-6 col-s-9">
        <form method="POST" action="">
        <label>Pretražite zaposlenike po imenu i broju</label><br>
              <input id="naziv" type="text" name="first_name" placeholder="unesite ime"><br><br>
              <input id="num" type="text" name="emp_no" placeholder="unesite broj"><br><br>
              <hr>
                <button type="submit" id="filter">Pretraga</button>
                <br><br>
        </form>
        <table id="result">
        <thead>
            <tr>
			<th>ID zaposlenika</th>
			<th>Datum rođenja</th>
	    	<th>Ime</th>
	    	<th>Prezime</th>
	       	<th>Spol</th>
	    	<th>Datum zaposlenja</th>
	  		</tr>
        </thead>
        <tbody> 
        <?php 
    $naziv=$_POST['first_name'];
    $num=$_POST['emp_no'];
   $client = new SoapClient(null, array(
      'location' => "http://localhost/rnwa/servisi/bezWsdlServer.php",
      'uri'      => "http://test-uri/"));
   $return = $client->returnEmployees($naziv,$num);
   	echo $return;
   	
?>
          </tbody>
          </table>
        </div>
        </div>
        <?php
            require('../footer.php');
        ?>
    
</body>
</html>