<?php 
require_once('initialize.php');
$id= $_GET['id'];
About::delete($id);
header("Location: admin.php");
?>