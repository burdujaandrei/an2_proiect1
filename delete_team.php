<?php 
require_once('initialize.php');
$id= $_GET['id'];
Team::delete($id);
header("Location: admin.php");
?>