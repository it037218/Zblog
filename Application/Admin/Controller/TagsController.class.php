<?php
namespace Admin\Controller;
use Think\Controller;
class TagsController extends Controller {

		public function index(){
			$m=M('tags');
			
			$res=$m->select();
			$this->assign('data',$res);
			$this->display();
	    }

	    public function add(){
	    	
	    	$this->display();
	    }

		public function edit(){

			$this->display();
		}

		public function addTags(){ 

			$data=$_POST;
			$m=M('tags');
			//var_dump($_POST);
			$result=$m->add($data);
			//var_dump($result);exit;
			if($result){ 
				$this->success('添加成功','index');
			}
		}

	}

?>