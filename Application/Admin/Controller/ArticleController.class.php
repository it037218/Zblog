<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {


		public function index(){
			$m=M('article');
			//查询满足要求的总记录数

			//var_dump($m->query('select * from article'));exit;
			$count=$m->where('status=0')->count();

			//import('ORG.Util.Page');// 导入分页类
			
			//实例化分页类，传入总记录数 和每页显示的记录数
			$page=new \Think\Page($count,25);

			//分页显示输出
			$show= $page->show();

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $m->where('status=0')->order('publish desc')->limit($page->firstRow.','.$page->listRows)->select();

			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			

			$this->display();
	    }

	    public function add(){
	    	
	    	if(!empty($_POST) && isset($_POST)){
	    		$m=M('article');
	    		
	    		$data['name']=$_POST['name'];
	    		$data['category']=$_POST['category'];
	    		$data['summary']=$_POST['summary'];
	    		$data['content']=$_POST['content'];
	    		$data['addtime']=time();
	    		$data['modtime']=time();
	    		$data['tags']=implode($_POST['tags'],',');	
	    		//var_dump($data);exit;
	    		$m->create();
	    		$result=$m->add($data);		
	    		//添加文章到文章表
	    		
	    		if(!empty($result) && $result!==0){
	    			//如果文章添加成功,跳转到文章列表页
	    			$this->success("文章发布成功",'index');
	    			
	    		}else{ 
	    			$this->error("文章发布失败",'add');
	    		}
				
	    		//$this->redirect("index");

	    	}else{ 

	    		$tags=$this->tags();
				$this->assign("tags",$tags);
				$this->display();
	    	}
	    	
			
			
	    }

	    public function tags(){
			$m=M('tags');
			//$m=new Model('User');
			$list=$m->select();
			
	    	return $list;
	    }

	}

?>	