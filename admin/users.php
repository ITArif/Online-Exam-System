<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$user=new User();
?>
<?php 
if (isset($_GET['disableId'])) {
	$id=$_GET['disableId'];
  $id=preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['disableId']);
  $disId=$user->disAbleUser($id);	
}

if (isset($_GET['enableId'])) {
	$eblid=$_GET['enableId'];
  $eblid=preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['enableId']);
  $enableId=$user->enableUser($eblid);	
}

if (isset($_GET['deleteId'])) {
	$delid=$_GET['deleteId'];
  $delid=preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['deleteId']);
  $deleteId=$user->deleteUser($delid);	
}
?>
<div class="main">
	<h1 style="text-align:center;color:#104B7B;">Admin Panel</h1>
	<?php 
     if (isset($disId)) {
     	echo $disId;
     }

     if (isset($enableId)) {
     	echo $enableId;
     }

     if (isset($deleteId)) {
     	echo $deleteId;
     }
	?>
  <div class="manageuser">
  	<table class="tblone">
  		<tr>
  			<th>No.</th>
  			<th>Name</th>
  			<th>Username</th>
  			<th>Email</th>
  			<th>Action</th>
  		</tr>
  	<?php 
	 $userData=$user->getAllUserData();
	 if ($userData) {
		$x=0;
		while ($result=$userData->fetch_assoc()) {
		$x++;
    ?>
  		<tr>
  			<td style="text-align:center;">
  				<?php 
  			     if ($result['status']=='1') {
  			     	echo "<span class='error'>".$x."</span>";
  			     }else{
  			     	echo $x;
  			     }
  			     ?>	
  			</td>
  			<td style="text-align:center;">
  				<?php 
  				 if ($result['status']==1) {
  				 	echo "<span class='error'>".$result['name']."</span>";
  				 }else{
  				 	echo $result['name'];
  				 }
  				?>	
  			</td>
  			<td style="text-align:center;"><?php echo $result['username']; ?></td>
  			<td style="text-align:center;"><?php echo $result['email']; ?></td>
  			<td style="text-align:center;">
  				<?php 

  				if ($result['status']=='0') { ?>
  				<a onclick="return confirm('Do You Want To Disable This.!')" href="?disableId=<?php echo $result['userId']; ?>">Disable</a>
  				<?php }else{ ?>
  				<a onclick="return confirm('Do You Want To Enable This.!')" href="?enableId=<?php echo $result['userId']; ?>">Enable</a>
  				<?php } ?>
  				|| <a onclick="return confirm('Do You Want To Remove This.!')" href="?deleteId=<?php echo $result['userId']; ?>">Remove</a>
  			</td>
  		</tr>
  	<?php } }else{echo "<span style='color:red;'>Other Fild doesn't work</span>";} ?>
  	</table>
  </div>
</div>
<?php include 'inc/footer.php'; ?>