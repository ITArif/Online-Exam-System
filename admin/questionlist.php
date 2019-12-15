<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam=new Exam();
?>
<?php 
if (isset($_GET['deletequestion'])) {
  $questionNo=$_GET['deletequestion'];
  $questionNo=preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['deletequestion']);
  $delQuestion=$exam->deleteQuestion($questionNo);
}
?>
<div class="main">
	<h1 style="text-align:center;color:#104B7B;">Admin Panel--Question List</h1>
<?php 
if (isset($delQuestion)) {
  echo $delQuestion;
}
?>
  <div class="quelist">
  	<table class="tblone">
  		<tr>
  			<th width="10%">No.</th>
  			<th width="70%">Question</th>
  			<th width="30%">Action</th>
  		</tr>
  	<?php 
	 $xamData=$exam->getQuestionExamData();
	 if ($xamData) {
		$x=0;
		while ($result=$xamData->fetch_assoc()) {
		$x++;
    ?>
  		<tr>
  			<td style="text-align:center;"><?php echo $x; ?></td>
  			<td style="text-align:center;"><?php echo $result['questionName']; ?></td>
  			<td style="text-align:center;">
  			<a onclick="return confirm('Do You Want To Remove This.!')" href="?deletequestion=<?php echo $result['questionNo']; ?>">Remove</a>
  			</td>
  		</tr>
  	<?php } }else{echo "<span style='color:red;'>Other Fild doesn't work</span>";} ?>
  	</table>
  </div>
</div>
<?php include 'inc/footer.php'; ?>