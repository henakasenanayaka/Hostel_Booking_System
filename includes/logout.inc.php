<?php
session_start();
session_unset();
session_destroy();
header("Location:../index.php?error=none_logout");
exit();
