<?php
session_start();
unset($_SESSION['nick']);
header('Location:../../index.php');
exit();
?>