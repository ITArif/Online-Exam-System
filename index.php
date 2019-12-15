<?php include 'inc/header.php'; ?>
<?php 
Session::checkLogin();

 ?>
<?php 
// $filepath = realpath(dirname(__FILE__));
//  include_once ($filepath.'/classes/User.php');
//  $user=new User();
//Login
// if ($_SERVER["REQUEST_METHOD"]=="POST") {
//   $email=$_POST['email'];
//   $password=md5($_POST['password']);
//   $userLogi=$user->userLogin($email,$password);  
// }
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
<?php 
// if (isset($userLogi)) {
// 	echo $userLogi;
// }
?>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id="email" placeholder="Enter Email Address"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password" placeholder="Enter Password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" value="Login" id="loginsubmit">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display:none;">All Filds Must Not Be Empty.!</span>
	   <span class="error" style="display:none;">Email And Password Not Matched.!</span>
	   <span class="disabled" style="display:none;">User Id Disabled.!</span>
	</div>
</div>
<?php include 'inc/footer.php'; ?>