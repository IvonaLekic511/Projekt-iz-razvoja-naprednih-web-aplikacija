<?php

	$baseUrl = 'http://localhost/rnwa';

	switch ($_SERVER["SCRIPT_NAME"]) {
		 case "/rnwa/employeesSearch.php":
			$CURRENT_PAGE = "Employee filter"; 
			$PAGE_TITLE = "Pretražite zaposlenike";
			break;

         case "/rnwa/rest/read.php":
            $CURRENT_PAGE = "Rest";
            $PAGE_TITLE = "REST API";
            break;
         case "/rnwa/rest/update.php":
            $CURRENT_PAGE = "Rest";
            $PAGE_TITLE = "REST API";
            break;
         case "/rnwa/rest/delete.php":
            $CURRENT_PAGE = "Rest";
            $PAGE_TITLE = "REST API";
            break; 
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Ivona Martina";
	}
?>