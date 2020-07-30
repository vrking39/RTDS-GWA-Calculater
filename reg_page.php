<!DOCTYPE html>

<?php
//gets list of all schools
require "Connection.php";
$schools = $conn->query("SELECT * FROM school");
?>

<html>
    <head>
        <title>Grade Calculator PH | Registration</title>
        <link rel="stylesheet" href="css/shared.css">
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </head>
    <body>
        <main>
            <form method='POST' id="register">
                <div class="form-content">
                    <h2>Register</h2>

                    <div class="column-split">
                        <!-- Left Column -->
                        <div class="column-1">
                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <div class="form-input">
                                    <input type="text" name="username" placeholder="Username" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="username">Password:</label>
                                <div class="form-input">
                                    <input type="password" name="pass" placeholder="Password" required>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="username">Confirm Password:</label>
                                <div class="form-input">
                                    <input type="password" name="confpass" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>

                        <!-- Right column -->
                        <div class="column-2">
                            <!-- Student Number -->
                            <div class="form-group">
                                <label for="username">Student Number:</label>
                                <div class="form-input">
                                    <input type="number" name="stdnum" placeholder="Student Number" required>
                                </div>
                            </div>

                            <!-- Your Name -->
                            <div class="form-group">
                                <label for="username">Your Name:</label>
                                <div class="form-input">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            
                            <!-- School -->
                            <div class="form-group">
                                <label for="username">School:</label>
                                <div class="form-input">
                                    <input list="schools" name="school" id="school" placeholder="School" required>
                                    <datalist id="schools">
                                        <?php
                                            while ($row = $schools->fetch_assoc()){
                                                echo '<option value="'.$row['School_Name'].'">'.$row['School_Name'].'</option>';
                                            }
                                        ?>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="submit-button">
                        <button type="button" id="submit" name="submit">Submit</button>
                    </div>

                    <!-- Go back to Sign In -->
                    <div class="form-footer">
                        <p>Already have an account? <a href="index.php">Sign In </a></p>
                    </div>
                </div>
            </form>

            <section id="register-text">
                <i class="fas fa-users fa-7x"></i>
                <h1>Thank you for choosing us!</h1>
                <h3>Having your own personal account is just one click away.</h3>
            </section>
        </main>
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
