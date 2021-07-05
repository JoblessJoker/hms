<?php require 'mysql_helper.php' ?>

<?php
$id = $_GET['id'];
delete_table_content($id);
header("Location: http://localhost/hms/details.php");
?>