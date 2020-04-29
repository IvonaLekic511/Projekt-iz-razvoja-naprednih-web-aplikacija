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
 function load_data(emp_no, title)
 {
  $.ajax({
   url:"titleQuery.php",
   method:"POST",
   data:{emp_no:emp_no, title:title},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $("input[name=emp_no],input[name=title]").click(function(){
  var nameVal = $('#emp_no').val();
  var LnameVal = $('#title').val();
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
 
              <label>Pretražite titule zaposlenika po ID zaposlenika</label><br>
              <input id="emp_no" type="text" name="emp_no" placeholder="Unesite id"><br><br>
              <label>Pretražite titule zaposlenika po nazivu</label><br>
              <input id="title" type="text" name="title" placeholder="Unesite title"><br><hr>
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