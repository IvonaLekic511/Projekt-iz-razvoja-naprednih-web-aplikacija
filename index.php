<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once('head.php');

  ?>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
        <?php
            require('navbar.php');
        ?>

        <div class="row">
        <?php
          require('menu.php')
        ?>

        <div class="col-6 col-s-9">
         <!-- <form method="GET" action="server.php">
              <label>Pretražite djelatnike po imenu</label><br>
              <input type="text" placeholder="unesite ime..."><br><br>
              <label>Prezimenu</label><br>
              <input type="text" placeholder="unesite prezime"><br><br>
          </form><br>-->
        <h2>Lista zaposlenika</h2>
        <?php
            require('employeess.php');
        ?>
        </div>
		
      
      </div>
     
      
      <?php
            require('footer.php');
        ?>
</body>
</html>