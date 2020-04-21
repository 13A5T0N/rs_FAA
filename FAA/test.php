<?php
$pas = 'fin';
$hash = password_hash($pas,PASSWORD_DEFAULT);
echo $hash;

?>