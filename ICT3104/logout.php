<?php
session_start();
session_unset();
$_SESSION['success'] = 'logout';
echo "<script>location='index.php#tologin'</script>";
exit();
?>
