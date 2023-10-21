 <?php
include 'include/connection.php';

unset($_SESSION['UID']);
unset($_SESSION['UNAME']);
header('Location: index.php')
?> 