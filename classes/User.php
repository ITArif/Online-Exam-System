<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Session.php');
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');
class User {
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

    public function userRegistration($name,$username,$password,$email){
        $name=$this->fm->validation($name);
        $username=$this->fm->validation($username);
        $password=$this->fm->validation($password);
        $email=$this->fm->validation($email);

        $name=mysqli_real_escape_string($this->db->link, $name);
        $username=mysqli_real_escape_string($this->db->link, $username);
        $password=mysqli_real_escape_string($this->db->link, md5($password));
        $email=mysqli_real_escape_string($this->db->link, $email);
        if ($name=="" || $username=="" || $password=="" || $email=="") {
           echo "<span class='error'>All Fildes Must Not Be Empty.!</span>";
            exit();
        }else if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
           echo "<span class='error'>Invaide Email Address.!</span>";
            exit();
        }else{
            $checkSql="SELECT * FROM tbl_user WHERE email='$email'";
            $checkQuery=$this->db->select($checkSql);
            if ($checkQuery !=false) {
               echo "<span class='error'>The Email Address Is Already Exist.!</span>";
               exit();
            }else{
                $insert_sql="INSERT INTO tbl_user(name,username,password,email)VALUES('$name','$username','$password','$email')";
                $insert_query=$this->db->insert($insert_sql);
                if ($insert_query) {
                     echo "<span class='success'>The Registration Is Successfully.!</span>";
                     exit();
                }else{
                     echo "<span class='error'>Error...The Registration Not Successfully.!</span>";
                     exit();
                }
            }
        }
    }

    public function userLogin($email,$password){
        $email=$this->fm->validation($email);
        $password=$this->fm->validation($password);

        $email=mysqli_real_escape_string($this->db->link, $email);
        $password=mysqli_real_escape_string($this->db->link, $password);
        if ($email=="" || $password=="") {
           echo "empty";
            exit();
        }else{
           $sql_login="SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
           $query_login=$this->db->select($sql_login);
           if ($query_login !=false) {
               $result=$query_login->fetch_assoc();
               if ($result['status']=='1') {
                   echo "disabled";
                   exit();
               }else{
                Session::init();
                Session::set("login", true);
                Session::set("userId", $result['userId']);
                Session::set("name", $result['name']);
                Session::set("username", $result['username']);
                //header("Location:exam.php");
               }
           }else{
              echo "error";
              exit();
           }
        }
    }

	public function getAllUserData(){
		$sql_user="SELECT * FROM tbl_user order by userId desc";
		$query_user=$this->db->select($sql_user);
		return $query_user;
	}

    public function disAbleUser($id){
    	$sql="UPDATE tbl_user SET status='1' WHERE userId='$id'";
    	$query=$this->db->update($sql);
    	if ($query) {
    		$msg="<span class='success'>The User Disable.!</span>";
    		return $msg;
    	}else{
    		$msg="<span class='error'>The User Not Disable.!</span>";
    		return $msg;
    	}
    }

    public function enableUser($eblid){
    	$sql="UPDATE tbl_user SET status='0' WHERE userId='$eblid'";
    	$query=$this->db->update($sql);
    	if ($query) {
    		$msg="<span class='success'>The User Enabled.!</span>";
    		return $msg;
    	}else{
    		$msg="<span class='error'>The User Not Enabled.!</span>";
    		return $msg;
    	}
    }

    public function deleteUser($delid){
    	$sql="DELETE FROM tbl_user WHERE userId='$delid'";
    	$query=$this->db->delete($sql);
    	if ($query) {
    		$msg="<span class='success'>The User Data Is Deleted.!</span>";
    		return $msg;
    	}else{
    		$msg="<span class='error'>The User Data Not Deleted.!</span>";
    		return $msg;
    	}
    }
    //User profile Vashano method
    public function getUserData($userId){
      $sql="SELECT * FROM tbl_user WHERE userId='$userId'";
      $query=$this->db->select($sql);
      return $query;
    }

  //User profile update method
    public function updateUserProfile($userId,$data){
       $name=$this->fm->validation($data['name']);
       $username=$this->fm->validation($data['username']);
       $email=$this->fm->validation($data['email']);

       $name=mysqli_real_escape_string($this->db->link, $name);
       $username=mysqli_real_escape_string($this->db->link, $username);
       $email=mysqli_real_escape_string($this->db->link, $email);

       $sql_update="UPDATE tbl_user SET name='$name',username='$username',email='$email' WHERE userId='$userId'";
       $query_update=$this->db->update($sql_update);
       if ($query_update) {
         $msg="<span class='success'>The User Data Is Updated.!</span>";
         return $msg;
       }else{
        $msg="<span class='error'>The User Data Not Updated.!</span>";
        return $msg;
       }
    }
}
?>