<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
$db = new Database();

if( isset($_POST['insert']) ) {
	$name  = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);

	if( $name == "" || $email == "" || $skill == "" ) {
		$insert_err = "Field must not be empty !";
	} else {
		$query = "INSERT INTO tbl_user ( name, email, skill ) VALUES ( '$name', '$email', '$skill' )";
		$insert = $db->insert($query);
	}
}



if( isset( $insert_err )) {
	echo "<span style='color: red'; >".$insert_err."</span>";
}

?>

<br>
<form action="" method="post">
	<table class="tbl_insert">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="Enter Your Email"></td>
		</tr>
		<tr>
			<td>Skill</td>
			<td><input type="text" name="skill" placeholder="Enter Your Skill"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="insert" value="Submit">
			 	<input type="reset" value="Reset">
			 </td>
		</tr>
	</table>
</form>
<a href="index.php">Go Back</a>
		

<?php include 'inc/footer.php'; ?>