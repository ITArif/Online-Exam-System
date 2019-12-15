<?php include 'inc/header.php'; ?>
<?php 
Session::checkSession();
$question=$xam->getAllQuestion();
$total=$xam->getTotalRows();
?>
 <style type="text/css">
 	.starttest{width:590px;padding:20px;margin:0 auto;border:1px solid #f4f4f4;}
 	.starttest h2{border-bottom:1px solid #ddd;font-size:20px;margin-bottom:10px;padding-bottom:10px;text-align:center;}
 	.starttest ul{margin:0;padding:0;list-style:none;}
 	.starttest ul li{margin-top:5px;}
 	.starttest a{background:#f4f4f4 none repeat scroll 0 0;border:1px solid #ddd;color:#444;display:block;margin-top:10px;padding:6px 10px;text-align:center;text-decoration:none;}
 </style>
<div class="main">
 <h1>Welcome to Online Exam</h1>
   <div class="starttest">
   	 <h2>Test To Prepare Your knowledge</h2>
   	 <p>This Is Multiple Choise question To Test Your Basic Knowledge</p>
   	 <ul>
   	 	<li><strong>Total Number Of Question: </strong><?php echo $total; ?></li>
   	 	<li><strong>Question Type:</strong>Multiple Choice/Preliminary Test</li>
   	 </ul>
   	 <a href="test.php?quest=<?php echo $question['questionNo']; ?>">Start Test</a>
   </div>
</div>
<?php include 'inc/footer.php'; ?>