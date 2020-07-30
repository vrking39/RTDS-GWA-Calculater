<?php
    require 'Connection.php';
    $error = '';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //redirects to index if username or password is not filled
        if(empty($_POST['username']) || empty($_POST['password'])){
            session_unset();
            session_destroy();
            $error = "Please enter Username<br>and/or Password";?>
            <div><label id="logError"><?php echo $error;?></label></div>
        <?php }
        //when both fields are filled
        else{
            //gets values
            $user = $_POST['username'];
            $pass = $_POST['password'];

            //gets associated account
            $stmt = $conn->prepare("SELECT * FROM student WHERE Username=? LIMIT 1");
            $stmt->bind_param('s', $user);
            $stmt->execute();
            $result = $stmt->get_result();

            //if username appears in DB
            if ($result->num_rows == 1){
                $row = $result->fetch_array();
                $hash = $row[1]; //gets hash of password
                
                //if password is correct, establishes session redirects to menu.php
                if(password_verify($pass, $hash)){
                    $_SESSION["info"] = $row;
                    header('location: menu.php');
                }
                //if password is incorrect, destroys session and redirects to index
                else{
                    session_unset();
                    session_destroy();
                    $error = "Invalid Username<br>or Password!";?>
                    <div><label id="logError"><?php echo $error;?></label></div>
                <?php
                }
            }
            //if username does not appear, destroys session and redirects to index
            else {
                session_unset();
                session_destroy();
                $error = "Invalid Username<br>or Password!";?>
                <div><label id="logError"><?php echo $error;?></label></div>
            <?php
            }
        }
    }
?>