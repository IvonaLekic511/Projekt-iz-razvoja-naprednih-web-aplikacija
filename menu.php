
        <?php
          require('config.php');
          ?>
        <div class="col-3 col-s-3 menu">
          <ul>
            <li><a <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?> href="http://localhost/rnwa/index.php">Index</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Employees filter") {?>active<?php }?> href="http://localhost/rnwa/employeesSearch.php">1.zadatak - Employees</a></li>
			<li><a <?php if ($CURRENT_PAGE == "Title filter") {?>active<?php }?> href='http://localhost/rnwa/titleSearch.php'>1. zadatak - Title filter</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Title filter") {?>active<?php }?> href="http://localhost/rnwa/servisi/wsdlServis.php">2. zadatak - WSDL</a></li>
            <li><a <?php if ($CURRENT_PAGE == "WSDL") {?>active<?php }?> href="http://localhost/rnwa/servisi/bezWsdl.php">2. zadatak - Bez WSDL</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Rest 1") {?>active<?php }?> href="http://localhost/rnwa/rest/create.php">3. zadatak - Rest Create</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Rest 2") {?>active<?php }?> href="http://localhost/rnwa/rest/read.php">3. zadatak - Rest Read</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Rest 3") {?>active<?php }?> href="http://localhost/rnwa/rest/update.php">3. zadatak - Rest Update</a></li>
            <li><a <?php if ($CURRENT_PAGE == "Rest 4") {?>active<?php }?> href="http://localhost/rnwa/rest/delete.php">3. zadatak - Rest Delete</a></li>
          </ul>
        </div>
