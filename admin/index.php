<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style type="text/css">
	.adminpanel{width:500px; color:#999;margin:30px auto 0;padding:50px;border:1px solid #ddd;}
	.adminpanel{}
</style>
<div class="main">
<h1>Admin Panel</h1>
  <div class="adminpanel">
  	<h2>Welcome to control of admin panel.</h2>
  	<p>You can manage your users and online exam system from here...</p>
  </div>
</div>
<?php include 'inc/footer.php'; ?>