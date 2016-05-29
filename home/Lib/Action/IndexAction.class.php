<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction{
	//登录
    public function index(){
    	if($_POST){
			  $admin = M('admin');
			  $res = $admin->where(array('name'=>$_POST['name']))->select();
     		  if($res){
     		  	   $result = $admin->where(array('pwd'=>$_POST['pwd']))->select();
				   if($result){
				   	   session('name',$_POST['name']);
				   	   echo "<script type='text/javascript'>location.href='".__ROOT__."/index.php/Index/main';</script>";
				   }else{
				   	   echo "<script type='text/javascript'>alert('密码错误！');location.href='".__ROOT__."/index.php/Index/index';</script>";
				   }
     		  }else{
     		  	       echo "<script type='text/javascript'>alert('用户名错误！');location.href='".__ROOT__."/index.php/Index/index';</script>";
     		  }
    	}else{
    		$this->display();
    	}
		
    }
	
	//主页
	public function main(){
		$product =M('product');
		$admin   =M('admin');
		if($_POST['name']){
			$data['name'] =$_POST['name'];
			$data['time'] =$_POST['time'] ;
			$data['start'] =$_POST['start'] ;
			$data['end'] =$_POST['end'] ;
			$data['type'] =$_POST['type'] ;
			$data['admin'] =$_SESSION['name'] ;
			$result = $product->add($data);
			if($result){
				echo "<script type='text/javascript'>alert('添加成功！');location.href='".__ROOT__."/index.php/Index/main';</script>";
			}		
		}
//      正在出售商品		
        if($_GET['p']){
        	$onSale = $product->where(array('issale'=>0,'type'=>$_GET['p']))->select();
        }else{
        	$onSale = $product->where(array('issale'=>0))->select();
        }


//		$onSale = $product->where(array('issale'=>0))->select();
//		个人购买的
        $mine   = $admin->field('produce')->where(array('name'=>$_SESSION['name']))->find();     
		$mine_res = $product->where(array('id'=>array('in',$mine['produce'])))->select(); 
		
//		已出售的
        $doneSale = $product->where(array('issale'=>1))->select();
        $this->assign('doneSale',$doneSale);
		$this->assign('product',$onSale);
		$this->assign('mine',$mine_res);
		$this->display();
	}
    //用户购买
    public function buy(){
    	$product =M('product'); 
    	$admin = M('admin');
    	$all   =$admin->field('produce')->select();
		foreach($all as $key=>$val){
			$bool = strstr($all[$key]['produce'],$_GET['id']); 
			if($bool){
				echo "<script type='text/javascript'>alert('对不起，已有人购买了！');location.href='".__ROOT__."/index.php/Index/main';</script>";exit;
			}
		}
		
    	$result= $admin->where(array('name'=>$_SESSION['name']))->select();
		$colle =explode(",", $result[0]['produce']);
		array_push($colle,$_GET['id']);
	    $colle2	=array_unique($colle);    	//除去数组重复元素
		$data['produce'] =implode(",",$colle2);
		$bool= $admin->where(array('name'=>$_SESSION['name']))->save($data);
		if($bool){
			$product->where(array('id'=>$_GET['id']))->save(array('issale'=>1,'buyer'=>$_SESSION['name']));
			echo "<script type='text/javascript'>alert('购买成功！');location.href='".__ROOT__."/index.php/Index/main';</script>";
		}
		
    }

	//用户关注collct
	public function collct(){
//		$open_id='ddadfasfasdfaf';	
        $open_id=session('open_id');
		$listObj= M('User');
		$result= $listObj->where(array('open_id'=>$open_id))->select();
		
		$colle	=explode(",",$result[0]['colle']); 	
		array_push($colle,$_GET['Lid']);
		$colle2	=array_unique($colle);    	//除去数组重复元素
		$data['colle'] =implode(",",$colle2);
		
		$result= $listObj->where(array('open_id'=>$open_id))->save($data);
		if($result){
			echo "<script type='text/javascript'>alert('收藏成功');
			location.href='".__ROOT__."/index.php/Index/AllList';</script>";
		}else{
			echo "<script type='text/javascript'>alert('你已收藏');
			location.href='".__ROOT__."/index.php/Index/AllList';</script>";
		}
	}
	
    //扫描二维码详情页面
    public function detail(){
//  	$Lid =$_GET['Lid'];
    	$Lid = isset($_GET['Lid']) ? $_GET['Lid'] : 1;
    	$deObj =M('List');
    	if($_POST['text']){
    		
//    		print_r($_POST);
    		$replyObj =M('Reply');
    		$replyObj->add(array('Lid'=>$_POST['id'],'comtent'=>$_POST['text'],'time'=>date('Y-m-d'),'name'=>session('name')));
    	    echo "<script type='text/javascript'>alert('您的建议我们已经汇报给管理员，请耐心等待！');</script>";  
    	}
    	$list= $deObj->where(array('Lid'=>$Lid))->select();
    	$this->assign("list",$list[0]);
    	$this->display();
    }
    
	//用户取消关注
    public function delete(){
     	$Lid 	=$_GET['Lid'];	//去掉的ID
     	$open_id=session('open_id');
//		$open_id='ddadfasfasdfaf';
		$listObj=M(User);
		$list	=$listObj->where(array('open_id'=>$open_id))->select();
		$num	=$list[0]['colle'];		//现有的ID
		
		$colle	=explode(",",$num); 
		$colle2	=array_unique($colle);    	//除去数组重复元素
		$key	=array_search($Lid , $colle2) ; //  除去接受数据流的ID
 		unset($colle2[$key]);

		$data['colle'] =implode(',', $colle2);	//新数据
		
		$result= $listObj->where(array('open_id'=>$open_id))->save($data);
		if($result){
			echo "<script type='text/javascript'>alert('删除成功');
			location.href='".__ROOT__."/index.php/Index/AllList';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除失败');
			location.href='".__ROOT__."index.php/Index/AllList';</script>";

		}
		
    }
    
	
    public function signin(){
    	$this->display();
    }
    
	// 显示系统常量
	public function systemList() {
		session('open_id','ddadfasfasdfaf');  //设置session
		print_r(session('open_id'));
		header ( "content-type:text/html;charset=utf-8" );
	
		$str1 = "网站根目录地址：__ROOT__ :******************" . __ROOT__ . "<br>";
		$str2 = "当前项目（入口文件）地址：__APP__ :******************" . __APP__ . "<br>";
		$str3 = "当前模块的URL地址 ：__URL__ :******************" . __URL__ . "<br>";
		$str4 = "当前操作的URL地址  ：__ACTION__ :******************" . __ACTION__ . "<br>";
		$str5 = "当前URL地址   ：__SELF__ :******************" . __SELF__ . "<br>";
		$str6 = "当前项目名     ：APP_NAME :******************" . APP_NAME . "<br>";
		$str7 = "当前项目路径     ：APP_PATH :******************" . APP_PATH . "<br>";
		$str8 = "系统框架路径    ：THINK_PATH :******************" . THINK_PATH . "<br>";
	
		echo $str1 . $str2 . $str3 . $str4 . $str5 . $str6 . $str7 . $str8 . $str9;
	
	}
}