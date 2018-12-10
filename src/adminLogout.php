<?php
session_start();
if(isset($_SESSION["userid"])){
    session_destroy();
    header('Location: admin.php');
    exit();
}else{
    header('Location: admin.php');
    exit();
}
?>
