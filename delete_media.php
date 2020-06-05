<?php 
require_once('initialize.php');
$id= $_GET['id'];
Media::delete($id);
header("Location: admin.php");
?>