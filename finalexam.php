<?php include 'inc/header.php'; ?>
<?php 
Session::checkSession();
 ?>
 <style type="text/css">
 	.starttest{width:590px;padding:20px;margin:0 auto;border:1px solid #f4f4f4;}
 	.starttest h2{border-bottom:1px solid #ddd;font-size:20px;margin-bottom:10px;padding-bottom:10px;text-align:center;}
 	.starttest ul{margin:0;padding:0;list-style:none;}
 	.starttest ul li{margin-top:5px;}
 	.starttest a{background:#f4f4f4 none repeat scroll 0 0;border:1px solid #ddd;color:#444;display:block;margin-top:10px;padding:6px 10px;text-align:center;text-decoration:none;}
 </style>
<div class="main">
<h1>Welcome to Online Exam - You Are Done</h1>
	<div class="starttest">
   	 <p>Hey Congratiulations..You Have Completed Your Desiare Test.</p>
   	 <p>Your Obtained Score:
   	 <?php 
     if (isset($_SESSION['score'])) {
     	 echo $_SESSION['score'];
     	 unset($_SESSION['score']);
     }
   	 ?>
   	 </p>
   	 <a href="viewans.php">View Answer</a>
   	 <a href="starttest.php">Start Again</a>
   </div>
</div>
<?php include 'inc/footer.php'; ?>