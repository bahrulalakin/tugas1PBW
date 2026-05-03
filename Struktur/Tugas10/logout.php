<?php
session_start();
session_destroy();
header("Location: login.php?message=Anda telah berhasil keluar");
exit();
?>