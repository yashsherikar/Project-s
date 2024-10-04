<?php
$password_length = 12;
$random_bytes = random_bytes($password_length / 2);
$password = bin2hex($random_bytes);
echo $password;
?>