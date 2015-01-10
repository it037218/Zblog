<?php


namespace Home\Controller;
use Think\Controller;
class WordController extends Controller {

	public function index(){
		$m=M();
    	$result=$m->query('select * from xieyi order by status');
    	//var_dump($result);
        $this->assign("data",$result);
        $this->display();
	}
	public function Detail(){
		$id=$_GET['id'];

		$m=M();
		$sql="select * from xieyi where id=".$id;
		
		$result=$m->query($sql);
		$this->assign("data",$result);
		$this->show();

	}
	public function CreateWord(){
		//echo md5('admin');
		$m=M();

		//生成协议类型
		$type=$_POST['xieyitype'];
		
		$result=array();
		$userid='';
		foreach ($_POST['user'] as $key => $value) {
			$userid .= $value.',';
		}
		$userid=rtrim($userid,',');

		if($type=='zhaiquanzhuanrang'){
			$sql="select * from xieyi where id in (".$userid.")";
			$result=$m->query($sql);
			$sql="update xieyi set status=status+1 where id in (".$userid.")";
			$m->query($sql);

		}elseif($type=='oncedianfu'){
			$sql="select * from xieyi where type=0 and id in (".$userid.")";
			$result=$m->query($sql);
			$sql="update xieyi set status=status+1 where id in (".$userid.") and type =0";
			//echo $sql;exit;
			$m->query($sql);
		}else{
			$sql="select * from xieyi where type=1 and id in (".$userid.")";
			$result=$m->query($sql);
			$sql="update xieyi set status=status+1 where id in (".$userid.") and type = 1";
			$m->query($sql);
		}
		
		$template=$type;
    	
    	$url="D:\xieyi\\";
    	
    	foreach ($result as $key => $value) {
    		$this->WordCreateFunction($value,$url,$template);
    	}
    	//更新协议状态为“已发送”
    	// $sql="update xieyi set status = 1 where id in (".$userid.")";
    	// $m->query($sql);

    	$this->success("协议生成成功");
	}

	/*
		添加名单列表

	*/

	public function addMember(){

		$m=M();

	}
	public function WordCreateFunction($data,$url,$template){
		
		$realname=$data['realname'];
		$zhuanrang=$data['zhuanrang'];
		$zhuanrangdaxie=$data['zhuanrangdaxie'];
		
		//var_dump("__PUBLIC__/Plugin/PHPWord/PHPWord.php");exit;

		//引用phpword.php文件
		require_once "./Public/Plugin/PHPWord/PHPWord.php";

		// New Word Document
		$PHPWord = new PHPWord();

		//导入协议模板
		$document = $PHPWord->loadTemplate('./Public/Plugin/PHPWord/template/'.$template.'.docx');
		
		//var_dump($template);exit;
		//设置realname，zhuanrang，zhuanrangxieyi
		$document->setValue('realname', iconv('utf-8', 'GB2312//IGNORE', $realname));
		$document->setValue('zhuanrang', iconv('utf-8', 'GB2312//IGNORE', $zhuanrang));
		$document->setValue('zhuanrangdaxie', iconv('utf-8', 'GB2312//IGNORE', $zhuanrangdaxie));
		// $document->setValue('Value4', iconv('utf-8', 'GB2312//IGNORE', $value4));
		// $document->setValue('Value5', iconv('utf-8', 'GB2312//IGNORE', $value5));
		// $document->setValue('Value6', iconv('utf-8', 'GB2312//IGNORE', $value6));
		switch ($template) {
			case 'zhaiquanzhuanrang':
				$doc='债权转让';
				break;
			case 'oncedianfu':
				$doc='一次性垫付';
				break;
			case 'fenqidianfu':
				$doc='分期垫付';
				break;
			
		}
		$file=$realname.$doc;
		$filename=$url.iconv('utf-8', 'GB2312//IGNORE', $file).'.docx';

		//echo $filename;
		$document->save($filename);
	}



}