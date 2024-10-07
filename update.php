<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
$db = new Database();

if( isset($_GET['id'])) {
	$update_ID = $_GET['id'];
}
$select = "SELECT * FROM tbl_user WHERE id=$update_ID LIMIT 1";
$sel_date_id = $db->selectDataByID($select);
$data = $sel_date_id->fetch_assoc();


if( isset($_POST['update']) ) {
	$name  = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);

	if( $name == "" || $email == "" || $skill == "" ) {
		$update_err = "Field must not be empty !";
	} else {
		$query = "UPDATE tbl_user SET name = '$name', email = '$email', skill = '$skill' WHERE id=$update_ID LIMIT 1";
		$update = $db->update($query);
	}
}


if( isset( $update_err )) {
	echo "<span style='color: red'; >".$update_err."</span>";
}

?>

<br>
<form action="" method="post">
	<table class="tbl_insert">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $data['name']; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $data['email']; ?>"></td>
		</tr>
		<tr>
			<td>Skill</td>
			<td><input type="text" name="skill" placeholder="Enter Your Skill" value="<?php echo $data['skill']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="update" value="Update">
			 	<input type="reset" value="Reset">
			 </td>
		</tr>
	</table>
</form>
<a href="index.php">Go Back</a>
		

<?php include 'inc/footer.php'; ?>