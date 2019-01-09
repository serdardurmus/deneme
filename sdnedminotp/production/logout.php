<?php 

session_start();
session_destroy(); // hafızadaki tüm session ları siler...

header('Location:login.php?durum=exit');
 ?>