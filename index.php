<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
$db = new Database();

$query = "SELECT * FROM tbl_user";
$read  = $db->select( $query );


if( isset( $_GET['msg'])) {
	echo "<span style='color: green'; >".$_GET['msg']."</span>";
}
?>
		
	<table class="tblone">
		<tr>
			<th width="30%">Name</th>
			<th width="30%">Email</th>
			<th width="20%">Skill</th>
			<th width="20%">Action</th>
		</tr>
		<?php 
			if( $read ) {
			while( $row = $read->fetch_assoc() ) {
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td>
				<a href="update.php?id=<?php echo $row['id']; ?>">edit</a> || 
				<a href="delete.php?id=<?php echo $row['id']; ?>">delete</a>
			</td>
		</tr>
		<?php 
			} } else { echo "<p>No data availave</p>"; }
		?>
		
	</table>
	<a href="insert.php">Insert Data</a>
		









		

<?php include 'inc/footer.php'; ?>