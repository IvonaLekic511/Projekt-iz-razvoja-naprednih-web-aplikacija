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
        <label>Unesite nove podatke za zaposlenika</label><br>
        <input id="emp_no" type="text" placeholder="ID zaposlenika"><br><br>
        <input id="first" type="text" placeholder="Ime"><br><br>
        <input id="last" type="text" placeholder="Prezime"><br><br>
        <button>IZMIJENI</button>
        <h1 id="result">

        </h1>
    </div>

</div>


<?php
require('../footer.php');
?>
<script>
    $(document).ready(function(){
        $('#emp_no').change(function() {
            let emp_no = $('#emp_no').val();
            $.ajax({
                url:"http://localhost/rnwa/v1/employees",
                method:"GET",
                data:{emp_no:emp_no},
                dataType: "json",
                success:function(data)
                {
                    $('#first').val(data[0].first_name);
                    $('#last').val(data[0].last_name);
                },
                errot:function()
                {
                    console.log('Nemoguće pronaći zaposlenika');
                }
            });
        });

        $("button").click(function(){
            let first = $('#first').val();
            let last = $('#last').val();
            $("#result").empty();

            $.ajax({
                url:"http://localhost/rnwa/v1/employees?emp_no=" + emp_no,
                data:JSON.stringify({first_name: first, last_name: last, last_update:"null" }),
                method:"PUT",
               // headers: {"X-HTTP-Method-Override": "PUT"},

                //dataType: "json",
                success:function(data)
                {
                    /*let poruka = `${data.status}, ${data.status_message}`;
                    $("#result").html(poruka);*/
                    console.log('u redu')
                },
                error:function()
                {
                    console.log('nije u redu')
                }
            });

        });
    });
</script>
</body>
</html>