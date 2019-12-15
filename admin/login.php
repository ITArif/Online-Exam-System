<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/Admin.php');
	$admin = new Admin();
?>
<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$adminUser=$_POST['adminUser'];
	$adminPass=$_POST['adminPass'];

	$loginChk=$admin->adminLogin($_POST);
}
?>
<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td colspan="2">
				<?php 
                 if (isset($loginChk)) {
                 	echo $loginChk;
                 }
				 ?>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" placeholder="Please Enter Name" name="adminUser"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" placeholder="Please Enter Password" name="adminPass"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"/></td>
			</tr>
		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>