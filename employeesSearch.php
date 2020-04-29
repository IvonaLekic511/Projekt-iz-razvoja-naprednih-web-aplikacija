<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once('head.php');
// include_once('google_oauth_config.php');

?>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
<script>
$(document).ready(function(){
 //load_data();
 function load_data(first_name, last_name)
 {
  $.ajax({
   url:"employeesQuery.php",
   method:"POST",
   data:{first_name:first_name, last_name:last_name},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $("input[name=first_name],input[name=last_name]").click(function(){
  var nameVal = $('#first_name').val();
  var LnameVal = $('#last_name').val();
  if(nameVal != '' && LnameVal == '')
  {
   load_data(nameVal,'');
  }
  else if(nameVal == '' && LnameVal != '')
  {
    load_data('',LnameVal);
  }
  else if(nameVal != '' && LnameVal != '')
  {
    load_data(nameVal, LnameVal);
  }
  else
  {
   load_data();
  }
 });


});
</script>
        <?php
            require('navbar.php');
            require('menu.php');
        ?>

        <div class="row">
        <div class="col-6 col-s-9">
 
              <label>Pretražite zaposlenike po imenu</label><br>
              <input id="first_name" type="text" name="first_name" placeholder="Unesite ime"><br><br>
              <label>Pretražite zaposlenike po prezimenu</label><br>
              <input id="last_name" type="text" name="last_name" placeholder="Unesite prezime"><br><hr>
                <button id="filter">Pretraga</button>
                <br><br>
          </form><br>
          <table id="result">

          </table>
        </div>
        </div>
        <?php
            require('footer.php');
        ?>
    
</body>
</html>