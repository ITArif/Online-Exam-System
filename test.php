<?php include 'inc/header.php'; ?>
<?php 
//$exam ta exam class er object kore header a load ase
Session::checkSession();
if (isset($_GET['quest'])) {
	$number=(int) $_GET['quest'];
}else{
	header("Location:exam.php");
}
?>
<?php
// 
$total=$xam->getTotalRows();
$question=$xam->getQuestionByNumber($number);
?>
<?php 
//Process file er object kore header a load ase
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pro=$process->procesData($_POST);
}
?>
<div class="main">
<h1>Must attamped <?php echo $question['questionNo']; ?> To <?php echo $total; ?> Question</h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['questionNo']; ?>: <?php echo $question['questionName']; ?></h3>
				</td>
			</tr>
		<?php 
         $answer=$xam->getAnswer($number);
         if ($answer) {
         	 while ($result=$answer->fetch_assoc()) {
		 ?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
				</td>
			</tr>
		<?php } } ?>
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number; ?>"/>
			  </td>
			</tr>
		</table>
	</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>