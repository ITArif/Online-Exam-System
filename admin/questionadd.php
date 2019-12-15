<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam=new Exam();
?>
<style type="text/css">
	.adminpanel{width:480px; color:#999;margin:20px auto 0;padding:10px;border:1px solid #ddd;}
	.adminpanel{}
</style>
<?php 
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$addQuestion=$exam->addQuestionData($_POST);
}

//get Total mane jokhon question add korbe mane database table a je koyta question add ase tar por ota neye count korbe jokhon notun kore question add debe.
$total=$exam->getTotalRows();
$nextquestionNo=$total+1;
?>
<div class="main">
<h1 style="text-align:center;color:#104B7B">Admin Panel--Add Question</h1>
<?php 
if (isset($addQuestion)) {
	echo $addQuestion;
}
?>
  <div class="adminpanel">
  	<form action="" method="post">
       <table>
       	<tr>
       		<td>Question No</td>
       		<td>:</td>
       		<td><input type="number" value="<?php 
             if(isset($nextquestionNo)){
               echo $nextquestionNo;
             }
             ?>" name="questionNo"/>
       		</td>
       	</tr>
       	<tr>
       		<td>Question</td>
       		<td>:</td>
       		<td><input type="text" name="questionName" placeholder="Enter The Qusetion..."/></td>
       	</tr>
       	<tr>
       		<td>Choice One</td>
       		<td>:</td>
       		<td><input type="text" name="ans1" placeholder="Enter The Choice One..."/></td>
       	</tr>
       	<tr>
       		<td>Choice Two</td>
       		<td>:</td>
       		<td><input type="text" name="ans2" placeholder="Enter The Choice Two..."/></td>
       	</tr>
       	<tr>
       		<td>Choice Three</td>
       		<td>:</td>
       		<td><input type="text" name="ans3" placeholder="Enter The Choice Three..."/></td>
       	</tr>
       	<tr>
       		<td>Choice four</td>
       		<td>:</td>
       		<td><input type="text" name="ans4" placeholder="Enter The Choice four..."/></td>
       	</tr>
       	<tr>
       		<td>Correct No</td>
       		<td>:</td>
       		<td><input type="number" name="rightAns"/></td>
       	</tr>
       	<tr>
       		<td colspan="3" align="center">
       			<input type="submit" value="Add Question" />
       		</td>
       	</tr>
       </table>
  	</form>
  </div>
</div>
<?php include 'inc/footer.php'; ?>