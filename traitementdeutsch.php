<?php


setcookie('langue', NULL,-1);
unset($_COOKIE['langue']);
setcookie('langue', 'deutsch',time()+36000);
if ($_SERVER['HTTP_REFERER'] == "") {
  header('Location: index.php');
} else {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>
