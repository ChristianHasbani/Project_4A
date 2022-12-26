<?php
include_once("DAL\Connection.php");
$conn = new Connection();
$conn->connect();
header("Location: PL\Views\home.html");
?>