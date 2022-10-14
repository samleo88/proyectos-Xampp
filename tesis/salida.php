<?php

session_start();
session_destroy(); 
session_unset();

//error_reporting(0);

echo "<script>
alert('Usted ha cerrado su seccion');
location.href='login.php';
</script>";
exit;
?>