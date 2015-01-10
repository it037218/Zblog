<?php
	class ArticleAction extends Action {


		public function index(){
			$m=M('article');
			//查询满足要求的总记录数
			$count=$m->where('status=1')->count();

			import('ORG.Util.Page');// 导入分页类
			
			//实例化分页类，传入总记录数 和每页显示的记录数
			$page=new Page($count,25);

			//分页显示输出
			$show= $page->show();

			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $m->where('status=1')->order('publish')->limit($page->firstRow.','.$page->listRows)->select();

			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			

			$this->display();
	    }

	    public function add(){
	    	if(!empty($_POST)){
	    		$m=new ArticleModel();
	    		
	    		$data['title']=$_POST['title'];
	    		$data['category']=$_POST['category'];
	    		$data['summary']=$_POST['summary'];
	    		$data['content']=$_POST['content'];
	    		$data['addtime']=time();
	    		$data['modtime']=time();		
	    		//添加文章到文章表
	    		$result=$m->ArticleAdd($data);
	    		if(!empty($result) && $result!==0){
	    			//如果文章添加成功，则添加文章标签到文章标签表
	    			$tags=array();
	    			$tags=$_POST['tags'];
	    			foreach ($tags as $key => $value) {
	    				$tags['articleid']=$result;
	    				$tags['id']=$value;
	    				$tags['addtime']=time();

	    				$tags['modtime']=time();
	    				$res=$m->TagsAdd($tags);
	    				var_dump($res);
	    			}

	    		}

	    	}
	    	
			
			$this->display();
	    }

	    public function tags(){
			$m=M('user');
			//$m=new Model('User');
			$list=$m->select();
			
	    	echo 1111;
	    	$this->display();
	    }

	}

?>	