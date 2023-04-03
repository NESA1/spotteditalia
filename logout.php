<?php
include "navbar.php";
session_destroy();
header('location: login.php');
include "footer.php";

?>