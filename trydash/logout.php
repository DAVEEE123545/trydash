<?php
session_start();
session_destroy();
header("Location: logins.php");
exit();
?>