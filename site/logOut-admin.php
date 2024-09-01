<?php
require 'lib/utils.php';
include 'partials/_top.php';

unset($_SESSION['admin']);

header('location: index.php');

?>