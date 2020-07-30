<?php

//destorys session and session variables and redirects to index

session_start();

session_unset();
session_destroy();

header('location: index.php');

?>