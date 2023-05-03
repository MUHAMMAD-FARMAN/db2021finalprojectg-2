<?php
session_start();
session_destroy();
echo "<script>location='index1.php?status=9'</script>";
?>