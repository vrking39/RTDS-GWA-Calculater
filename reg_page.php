<!DOCTYPE html>

<?php
//gets list of all schools
require "Connection.php";
$schools = $conn->query("SELECT * FROM school");
?>

<html>
    <head>
        <title>GWA Calculator</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form method='POST' id="register">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="pass" placeholder="Password" required><br>
            <input type="password" name="confpass" placeholder="Confirm Password" required><br>
            <input type="number" name="stdnum" placeholder="Student Number" required><br>
            <input type="text" name="name" placeholder="Your Name" required><br>
            <input list="schools" name="school" id="school" placeholder="School" required>
            <datalist id="schools">
                <?php
                    while ($row = $schools->fetch_assoc()){
                        echo '<option value="'.$row['School_Name'].'">'.$row['School_Name'].'</option>';
                    }
                ?>
            </datalist>
            <br><input type="button" id="submit" name="submit" value="Submit">
        </form>
    </body>
</html>

<script>
    //when user has clicked submit, reg.php is called and
    //one of four scenarios will happen
    $(document).ready(function(){	
        $('#submit').click(function(){		
            $.ajax({
                url:"reg.php",
                method:"POST",
                data:$('#register').serialize(),
                success:function(data){
                    if (data == "0"){
                        alert("Registration Complete!");
                        window.location.href="index.php";
                    }
                    else if (data == "1"){
                        alert("Please retype your passwords");
                    }
                    else if (data == "2"){
                        alert("Please choose your school");
                    }
                    else if (data == "3"){
                        alert("Username already taken");
                    }
                    //alert (data);
                }
            });
        });
    });
</script>