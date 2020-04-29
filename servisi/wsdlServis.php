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
        <label>Pretražite plate po iznosu</label><br>
              <input id="naziv" type="text" name="salary" placeholder="unesite iznos"><br><br>
              <hr>
                <button type="submit" id="filter">Pretraga</button>
                <br><br>
        </form>
        <table id="result">
        <thead>
        <tr>
			  <th>ID zaposlenika</th>
			  <th>Iznos plate</th>
			  <th>Od datuma</th>
		  	<th>Do datuma</th>
	  		</tr>
              </thead>
             <tbody> 
        <?php

try{
	ini_set('soap.wsdl_cache_enabled',0);
	ini_set('soap.wsdl_cache_ttl',0);
  //$sClient = new SoapClient('http://localhost/test/wsdl/hello.xml,);
  $sClient = new SoapClient('http://localhost/rnwa/servisi/salaries.wsdl'
							);
  //$sClient = new SoapClient('hello.wsdl');
  if(isset($_REQUEST['salary']))
  {
    $salary = $_REQUEST['salary'];
  $response = $sClient->findSalaries($salary);
  print($response);
  }
   
  
  
  
} catch(SoapFault $e){
  var_dump($e);
  echo $e;
}
{
    print($sClient->__getLastResponse());
}
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