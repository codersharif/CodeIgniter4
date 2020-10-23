<?php 

namespace App\Controllers;

use App\Models\User;

class ProjectController extends BaseController
{
   
   public function __construct(){

   	$this->db = \Config\Database::connect();
   }

   public function ajaxMethod(){
   	return view("project/ajax_file");
   }
  
   public function ajaxResponse(){

    $data=$this->request->getVar();

   echo json_encode([
     "status"=>1,
     "msg"=>"Successful request",
     "data"=>$data
   ]);
   
   }
  


   public function fileUpload(){

    if($this->request->getMethod() == "post"){
      
       $file=$this->request->getFile("file");
       $fileType=$file->getClientMimeType();

       $valid_file_type=["image/png","image/jpeg","image/jpg"];

       $session=session();

       if(in_array($fileType, $valid_file_type)){
       	 $name=$file->getName();

         $userModel=new User();

	       $data=[
	       "img"=>$name
	       ];


         $userModel->where('id',1)->set($data)->update();


       	 if($file->move("public/img",$name)){
            $session->setFlashdata('succes','file upload success');
       	 }else{
           $session->setFlashdata('error','file upload faild');
       	 }

       }else{
           $session->setFlashdata('error','invalid file type');
       }


       return redirect()->to(site_url("file-upload"));

    }

   	return view('project/file');
   }

  //session
   public function userSession(){
   $session = \Config\Services::session();

   //set
   // $session->set('userData','sharif');

   //get
   // echo $session->get('userData');

   //session remove

   // $session->remove('userData');


   //set with array
   // $data=[
   //   "name"=>"sharif",
   //   "email"=>"s@mail.com"
   // ];
   // $session->set('userData',$data);

  //get
   $getData=$session->get('userData');
   echo "<pre>";
   print_r($getData);

   //destory
   // $session->destroy();

   }

   // paginate

   public function paginate(){

    $builder=new User();

    $users=$builder->paginate(3);
    $pager=$builder->pager;

    return view('project/paginate',compact('users','pager'));

   }

  //helper function

   public function helper(){

   	 $array = array('Hello','World!','Beautiful','Day!');

   	 echo "<pre>";
   	 print_r(arrayToString($array));
   }


  public function form(){

  	if($this->request->getMethod() == "post"){

  	 $rules=[
  	   "name"=>"required|min_length[5]",
       "email"=>"required",
       "phone"=>"required"
  	 ];	

  	 $msg=[
       "name"=>[
       	"required"=>"name is needed",
       	"min_length"=>"we need atlest 5 char"
       ]
  	 ];

  	 $validation= \Config\Services::validation();

     if(!$this->validate($rules,$msg)){

     return view("project/form-file",[
       "validation"=>$this->validator
     ]);

     }else{

     $data=$this->request->getVar();

     $insert=[
       "name"=>$data['name'],
       "email"=>$data['email'],
       "phone"=>$data['phone'],
     ];

     $user=new User();

     $session=session();

     if($user->insert($insert)){

     	$session->setFlashdata('succes','insert success');

     }else{
      	$session->setFlashdata('error','insert faild');
     }
    }

     return redirect()->to(site_url('form'));

  	}else{

  	return view("project/form-file");
    // return view("project/form");	
  	}

  }



 //uses model

   public function delete3(){
    $userModel=new User();

    // $userModel->delete(12);
    $userModel->where('id',15)->delete();

   }
   
   public function update3(){
      $userModel=new User();

       $data=[
       "name"=>"ggg",
       "email"=>"ggg@mail",
       "phone"=>"76547e5"
     ];


    // $userModel->where('id',12)->set($data)->update();
       $userModel->update(12,$data);


   // system -2
    /*   
      $data2=[
      "id"=>"14",
       "name"=>"kkk",
       "email"=>"kkk@mail",
       "phone"=>"76547e5"
     ];

       $userModel->insert($data2); */


   }

   public function insert3(){

    $userModel=new User();

     $data=[
       "name"=>"eee",
       "email"=>"eee@mail",
       "phone"=>"76547e5"
     ];

     $data2=[
	       [
	           "name"=>"bbc",
	           "email"=>"bbc@mail.com",
	           "phone"=>"3453"
	       ],
	        [
	           "name"=>"ccc",
	           "email"=>"ccc@mail.com",
	           "phone"=>"346546"
	       ],
	        [
	           "name"=>"mmmm",
	           "email"=>"mmmm@mail.com",
	           "phone"=>"345345646"
	       ],
       ];

      // $userModel->insert($data);
      $userModel->insertBatch($data2);


   }

   public function dataList3(){
     $userModel=new User();

    // $user= $userModel->find(1);
    // $user= $userModel->findAll();

     // $user=$userModel->first();

     // $user=$userModel->where('id',1)
     // ->select("name,email")
     // ->first();

     $user=$userModel->select("id,name,email")
     ->whereIn("id",[1,2,3,4])
     ->orderBy("id","desc")->findAll();

     echo "<pre>";
     print_r($user);

   }

  

   public function update2(){
    $builder=$this->db->table('users')
     ->where('id',5);

     $data=[
       "name"=>"kalam",
       "email"=>"kalam@mail",
       "phone"=>"76547e5"
     ];

    // $builder->update($data);
    $builder->set($data)->update();

   }

   public function delete2(){

   	  $id=7;
      $delete=$this->db->table('users')
      ->where('id', $id)
      ->delete();

   }

   public function insert2(){
       
       $builder=$this->db->table('users');

       //first way
     /*  $data=[
           "name"=>"aaa",
           "email"=>"aaa@mail.com",
           "phone"=>"5697685"
       ];

       $builder->insert($data);*/

      $data=[
	       [
	           "name"=>"bbc",
	           "email"=>"bbc@mail.com",
	           "phone"=>"3453"
	       ],
	        [
	           "name"=>"ccc",
	           "email"=>"ccc@mail.com",
	           "phone"=>"346546"
	       ],
	        [
	           "name"=>"mmmm",
	           "email"=>"mmmm@mail.com",
	           "phone"=>"345345646"
	       ],
       ];

         $builder->insertBatch($data);

   }

   public function dataList2(){
    // $data=$this->db->table('users')->get();
    // $data=$this->db->table('users')->get()->getResultArray();

    //where
   /* $data=$this->db->table('users')
                   ->where('id',1)
                   ->where('email','sharif@mail.com')
                   ->get()->getResultArray();*/

    $data=$this->db->table('users')
    ->where(array(
       "id"=>1,
       "email"=>"sharif@mail.com"
    ))
    ->get()->getRow();               


    // echo $this->db->getLastQuery();               


    echo "<pre>";
    print_r($data);

   }

   public function select(){
    
    // $data=$this->db->query("select * from users");
    // $data=$this->db->query("select * from users")->getResult(); //object
    // $data=$this->db->query("select * from users")->getResult('array'); //array
    // $data=$this->db->query("select * from users")->getResultArray();
    // $data=$this->db->query("select * from users where id=1")->getRow();
    $data=$this->db->query("select * from users where id=1")->getRowArray();

    echo "<pre>";
    print_r($data);

   }
  
   public function insertQuery(){
   
    $insert="insert into users(name,email,phone) values('korim','korim@mail.com','544444')";

   
    if($this->db->query($insert)){
    	echo "insert success";

    }else{
       echo "insert faild";
    }

   }


   public function updateQuery(){

    $update="update users set name='korim', email='korim@mai.com', phone='58675867' where id=2";

    if($this->db->query($update)){
    	echo "update success";

    }else{
       echo "update faild";
    }

   }

   public function delete(){

   	$delete="delete from users where id=2";

   	 if($this->db->query($delete)){
    	echo "delete success";

    }else{
       echo "delete faild";
    }

   }

	public function index()
	{
		echo "MD.sharif";
	}

	public function show(){

		return view('project/about');
	}
 
   public function call($value=null,$value2=null){

   echo "call me ".$value."And ".$value2;

   }


   public function queryPrag(){
   	$data=$this->request->getVar();

   	echo "helo </br>";
    echo $data['name'];
   }

}
