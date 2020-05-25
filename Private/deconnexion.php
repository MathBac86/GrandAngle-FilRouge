<?php
// Suppression du cookie designPrefere
setcookie('User');
// Suppression de la valeur du tableau $_COOKIE
unset($_COOKIE['User']);

header('location: index.php');
exit();
?>
