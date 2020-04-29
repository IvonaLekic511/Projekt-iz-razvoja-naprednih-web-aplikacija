-<?php include("../config.php");?>
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
?>

<div class="row">
    <?php
    require('../menu.php')
    ?>

    <div class="col-6 col-s-9">
        <label>Prikažite zaposlenike sa željenim ID</label><br>
        <input id="emp_no" name="emp_no" type="text" placeholder="ID zaposlenika">
        <button>PRIKAŽI</button>
       <ul id="result">

       </ul>
    </div>

</div>


<?php
require('../footer.php');
?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            let emp_no = $('#emp_no').val();
            $("#result").empty();
            $.ajax({
                url:"http://localhost/rnwa/v1/employees",
                method:"GET",
                data:{emp_no:emp_no},
                success:function(data)
                {
                    if(data.length === 0) {
                        let greska = `<li>Zaposlenik ne postoji!</li>`;
                        $("#result").append(greska);
                    }
                    else {
                        $.each(data, function(i, employees){
                            let podatak  = `<li>ID zaposlenika: ${employees.emp_no}, Ime: ${employees.first_name}, Prezime : ${employees.last_name}</li>`;
                            $("#result").append(podatak);
                        });

                    }
                }
            });

    });
    });
</script>
</body>
</html>