<?php 
include 'config.php';
include 'Database.php';
$db = new Database();

if( isset($_GET['id'])) {
	$delete_ID = $_GET['id'];
}
$select = "DELETE FROM tbl_user WHERE id=$delete_ID LIMIT 1";
$db->deleteDataByID($select);
?>
