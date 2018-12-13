<?php
session_start();
   session_destroy();
   header('Location: adminTop.php');
   exit();
?>
