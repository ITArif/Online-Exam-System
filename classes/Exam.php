<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');
class Exam {
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

    public function addQuestionData($data){
        $questionNo=$this->fm->validation($data['questionNo']);
        $questionName=$this->fm->validation($data['questionName']);

        $questionNo=mysqli_real_escape_string($this->db->link, $data['questionNo']);
        $questionName=mysqli_real_escape_string($this->db->link, $data['questionName']);
        
        $ans=array();
        $ans[1]=$data['ans1'];
        $ans[2]=$data['ans2'];
        $ans[3]=$data['ans3'];
        $ans[4]=$data['ans4'];
        $rightAns=$data['rightAns'];
        $sql_insert="INSERT INTO tbl_question(questionNo,questionName)VALUES('$questionNo','$questionName')";
        $query_insert=$this->db->insert($sql_insert);
        if ($query_insert) {
            foreach ($ans as $key => $value) {
                if ($value !='') {
                    if ($rightAns ==$key) {
                     $sql="INSERT INTO tbl_answer(questionNo,rightAns,ans)VALUES('$questionNo', 1 ,'$value')";
                    }else{
                     $sql="INSERT INTO tbl_answer(questionNo,rightAns,ans)VALUES('$questionNo', 0 ,'$value')";
                    }
                   $query_row=$this->db->insert($sql);
                   if ($query_row) {
                      continue;
                   }else{
                    die('Error...');
                   }
                }
            }
            $msg="<span class='success'>Question Added Successfully.!</span>";
            return $msg;
        }
    }

    public function getQuestionExamData(){
        $sql="SELECT * FROM  tbl_question order by questionNo ASC";
        $query=$this->db->select($sql);
        return $query;
    }

    public function deleteQuestion($questionNo){
        $tables=array("tbl_question","tbl_answer");
        foreach ($tables as $table) {
            $sql_delete="DELETE FROM $table WHERE questionNo='$questionNo'";
            $query_delete=$this->db->delete($sql_delete);
        }
         if ($query_delete) {
            $msg="<span class='success'>The Data Deleted Successfully.!</span>";
            return $msg;
         }else{
            $msg="<span class='error'>Error..The Data Not Deleted .!</span>";
            return $msg;
         }
    }

    public function getTotalRows(){
        $sql="SELECT * FROM tbl_question";
        $query=$this->db->select($sql);
        $total=$query->num_rows;
        return $total;
    }

    //get question method
    public function getAllQuestion(){
       $sql_question="SELECT * FROM tbl_question";
       $query_question=$this->db->select($sql_question);
       $result=$query_question->fetch_assoc();
       return $result;
    }
    //getQuestionNumber come on one by one when user do that exam
    public function getQuestionByNumber($number){
       $sql_question="SELECT * FROM tbl_question WHERE questionNo='$number'";
       $query_question=$this->db->select($sql_question);
       $result=$query_question->fetch_assoc();
       return $result;
    }
    //Get All Ans Method
    public function getAnswer($number){
       $sql_ans="SELECT * FROM tbl_answer WHERE questionNo='$number'";
       $query_ans=$this->db->select($sql_ans);
       return $query_ans;
    }
}
?>