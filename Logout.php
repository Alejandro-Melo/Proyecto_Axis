<?php 
    session_start();
    header("Location: Index.php");
    session_unset();
?>