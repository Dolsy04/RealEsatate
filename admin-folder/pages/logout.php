<?php
session_start();
session_destroy();
header("Location: /real-estate-website/index.html");
exit();
?>
