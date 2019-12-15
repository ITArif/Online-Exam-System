<?php 
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../lib/Session.php');
   Session::checklogin();
   include_once ($filepath.'/../lib/Database.php');
   include_once ($filepath.'/../helpers/Format.php');
class Admin {
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

    public function adminLogin($data){
    	$adminUser=$this->fm->validation($data['adminUser']);
    	$adminPass=$this->fm->validation($data['adminPass']);
		$adminUser=mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass=mysqli_real_escape_string($this->db->link, md5($adminPass));

		if ($adminUser=="" || $adminPass=="") {
			$loginmsg="<span class='error'>Username and Password must not be empty!</span>";
			return $loginmsg;
		}else{
			$sql="SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
			$query=$this->db->select($sql);
			if ($query != false) {
				$result=$query->fetch_assoc();
				Session::init();
				Session::set("adminlogin", true);
				Session::set("adminId", $result['adminId']);
				Session::set("adminUser", $result['adminUser']);
				header("Location:index.php");
			}else{
				$loginmsg="<span class='error'>Username and Password did't match!</span>";
			    return $loginmsg;
			}
		}
    }
}

?>