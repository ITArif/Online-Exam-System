<?php include 'inc/header.php'; ?>
<?php 
//$exam ta exam class er object kore header a load ase
Session::checkSession();
?>
<?php
// 
$total=$xam->getTotalRows();
?>
<style type="text/css">
    .viewans{border:1px solid #f3f3f3;margin:0 auto;max-width:650px;padding:20px;}
	.viewans input[type="radio"] {margin-bottom:10px;margin-right:10px;cursor:pointer;}
	.viewans h3 {border-bottom:1px solid #f3f3f3;font-size:16px;margin-bottom:10px;padding-bottom:10px;}
	.viewans a{background:#f4f4f4 none repeat scroll 0 0;border:1px solid #ddd;color:#444;display:block;margin-top:10px;padding:6px 10px;text-align:center;text-decoration:none;}
</style>
<div class="main">
<h1>Lets Going To See Total Questions And Ans: <?php echo $total; ?> Question</h1>
	<div class="viewans">
		<table> 
	     <?php 
	     //Exam Class theke
         $getQues=$xam->getQuestionExamData();
         if ($getQues) {
         	while ($question= $getQues->fetch_assoc()) {
	      ?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['questionNo']; ?>: <?php echo $question['questionName']; ?></h3>
				</td>
			</tr>
		<?php
		$number=$question['questionNo']; 
         $answer=$xam->getAnswer($number);
         if ($answer) {
         	 while ($result=$answer->fetch_assoc()) {
		 ?>
			<tr>
				<td>
				 <input type="radio"/><?php
				   if ($result['rightAns']=='1') {
				   	 echo "<span style='color:red'>".$result['ans']."</span>"; 
				   }else{
                     echo $result['ans']; 
				   }
				  ?>
				</td>
			</tr>
		<?php } } ?>
		<?php } } ?>
		</table>
		<a href="starttest.php">Start Again</a>
</div>
 </div>
<?php include 'inc/footer.php'; ?>