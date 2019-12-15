<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Session.php');
   //Session::init();
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');
class Process {
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	//Exam process method
	public function procesData($data){
      $selectedans=$this->fm->validation($data['ans']);
      $number=$this->fm->validation($data['number']);

      $selectedans=mysqli_real_escape_string($this->db->link, $selectedans);
      $number=mysqli_real_escape_string($this->db->link, $number);
      $next=$number+1;

      if (!isset($_SESSION['score'])) {
      	 $_SESSION['score']='0';
      }
      $total=$this->getTotal();
      $right=$this->rightAnswer($number);
      if ($right == $selectedans) {
      	 $_SESSION['score']++;
      }
      if ($number == $total) {
      	header("Location:finalexam.php");
      	exit();
      }else{
      	header("Location:test.php?quest=".$next);
      }
	}

	//total
	private function getTotal(){
		$sql="SELECT * FROM tbl_question";
        $query=$this->db->select($sql);
        $total=$query->num_rows;
        return $total;
	}
	//right anser method
	private function rightAnswer($number){
       $sql_question="SELECT * FROM tbl_answer WHERE questionNo='$number' AND rightAns='1'";
       $query_question=$this->db->select($sql_question)->fetch_assoc();
       //$value=$query_question->fetch_assoc();
       $result=$query_question['id'];
       return $result;
	}
}
?>