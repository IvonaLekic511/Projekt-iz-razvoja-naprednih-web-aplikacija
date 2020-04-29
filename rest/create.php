<?php include("../config.php");?>
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
        <label>Unesite podatke za novog djelatnika</label><br>
		<input id="emp_no" type="text" placeholder="ID zaposlenika"><br><br>
        <input id="first" type="text" placeholder="Ime"><br><br>
        <input id="last" type="text" placeholder="Prezime"><br><br>
		<input id="hire_date" type="text" placeholder="Datum zaposlenja"><br><br>
        <button>STVORI</button>
        <h1 id="result">

        </h1>
    </div>

</div>


<?php
require('../footer.php');
?>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            let emp_no = $('#emp_no').val();
			let first = $('#first').val();
            let last = $('#last').val();
			let hire_date = $('#hire_date').val();
            $("#result").empty();
            $.ajax({
                url:"http://localhost/rnwa/v1/employees",
                method:"POST",
                data:JSON.stringify({
					emp_no:emp_no,
                    first_name: first,
                    last_name: last,
					hire_date:hire_date
                }),
                dataType: "json",
                success:function(data)
                {
                    let poruka = `${data.status}, ${data.status_message}`;
                    $("#result").html(poruka);
                }
            });

        });
    });
</script>
</body>
</html>