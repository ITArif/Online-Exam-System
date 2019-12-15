<?php include 'inc/header.php'; ?>
<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/classes/User.php');
 $user=new User();
 ?>
 <?php 
 //ak page as index page registration
//   if ($_SERVER["REQUEST_METHOD"]=="POST") {
//   $name=$_POST['name'];
//   $username=$_POST['username'];
//   $password=$_POST['password'];
//   $email=$_POST['email'];
//   $userRegi=$user->userRegistration($name,$username,$password,$email);  
// }
?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
<?php 
// if (isset($userRegi)) {
//   echo $userRegi;
// }
?>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
  		<table>
    		<tr>
           <td>Name</td>
           <td><input type="text" name="name" id="name" placeholder="Enter Name.."></td>
        </tr>
    		<tr>
           <td>Username</td>
           <td><input type="text" name="username" id="username" placeholder="Enter Username.."></td>
        </tr>
        <tr>
           <td>Password</td>
           <td><input type="password" name="password" id="password" placeholder="Enter Password"></td>
        </tr>
        <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" id="email" placeholder="Enter Email.."></td>
        </tr>
        <tr>
           <td></td>
           <td><input type="submit" id="regsubmit" value="Signup"></td>
        </tr>
      </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span id="result"></span>
	</div>
</div>
<?php include 'inc/footer.php'; ?>