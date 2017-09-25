<?php
	class GdzcAction extends CommonAction{

		protected $patchValidate = true;    //开启批量验证

        // 1-下面为主页显示功能
		public function index(){
			$m=M('gdzc');
            $mm=$m->select();  
            $cxcompany = $_POST['cxcompany'];
            $cxdept = $_POST['cxdept'];
            $cxhardtype = $_POST['cxhardtype'];
            $cxfixassettag = $_POST['cxfixassettag'];
            $cxuser=$_POST['cxuser'];
            $cxusestate=$_POST['cxusestate'];
            //下面根据当前user会话名查询userright中的companyright；
            $u=M('usercontrol');            
 			$map['cuser']=$_SESSION['username'];    
 			// 上面一行  userright表中的user字段改名为username前的写法 $map['user']=$_SESSION['username']; 

            $uu=$u->where($map)->getField('company');
            $uuu=explode(",", $uu);
			$condition['company'] = array('in',$uuu);
			$condition['usestate'] = array('not in','已报废');
				if ( $cxcompany !='' ) {
					// $condition['company'] = array('like' ,'%'.$cxcompany.'%');
			$condition = array('company'=>array('in',$uuu),'company'=>array('like' ,'%'.$cxcompany.'%'),'and');
			//$condition['company'] = array(array('in',$uuu),array('like' ,'%'.$cxcompany.'%'),'and');
	            }   if ( $cxdept !='' ) {
					$condition['dept'] = array('EQ' ,$cxdept);
	            }	if ( $cxhardtype !='' ) {
					$condition['hardtype'] = array('EQ' ,$cxhardtype);
	            }  	if ( $cxfixassettag !='' ) {
					$condition['fixassettag'] = array('like' ,'%'.$cxfixassettag.'%');
	            }   if ($cxuser !='' )  {
					         $condition['employee'] = array('like' ,'%'.$cxuser.'%');       
	            }   if ($cxusestate !='' )  {
					         $condition['usestate'] = array('like' ,'%'.$cxusestate.'%');       
	            } 
	               else  {   
                } 
            $arr=$m->order(company,id)->where($condition)->select();
			$this->assign('data',$arr);

		    //***查询用户功能权限userfun开始
            $funright=M('funright');            
 			$mapp['funuser']=$_SESSION['username'];     // 表funright中的funuser字段=会话的用户名时
            $userfun=$funright->where($mapp)->find();   //注意find、select、getField 的区别
			$this->assign('userfun',$userfun); 
			//***查询用户功能权限userfun结束
		 	$this->display();
		}

        public function transfer(){
			$id=$_GET['id'];
			$m=M('gdzc');
			$arr=$m->find($id);
			$this->assign('data',$arr);

			$fixassettag=$arr['fixassettag'];
			$mm=M('transfer');
			$condition['fixtag'] =  array('eq', $fixassettag);
			$arrtrans=$mm->where($condition)->select();  
			$this->assign('datat',$arrtrans);

            $this->display();

	    }

        public function transfersave(){   
        	//update GDZC表的user信息   
			$m=D('gdzc');               //D方法将调用Lib\Model下GdzcModel下的自动完成定义
			$data['id']=$_POST['id'];   
			$data['company']=$_POST['newcompany'];   
			$data['dept']=$_POST['newdept'];   
			$data['employee']=$_POST['transto'];  
			// $data['hardtype']=$_POST['hardtype'];   
			$data['fixassettag']=$_POST['fixassettag'];   
 

			$mm=M('transfer');     	//写入 transfer记录表 
			$mm->fixtag=$_POST['fixassettag'];
			$mm->transfrom=$_POST['employee'];
			$mm->transto=$_POST['transto'];
			$mm->transdate=$_POST['transdate'];
			$mm->olddept=$_POST['olddept'];
			$mm->newdept=$_POST['newdept'];
			$mm->oldcompany=$_POST['oldcompany'];
			$mm->newcompany=$_POST['newcompany'];
			$mm->remark=$_POST['transremark'];
			$mm->operuser=$_SESSION['username'];
			$mm->operdate=date('Y-m-d H:i:s', time());

			   if (empty($_POST['transto'])  ||  empty($_POST['transdate']) || strlen($_POST['transto'])>25){
					exit('转移至 和 转移日期 均不能为空,转移至的用户名 不能大于25位    ');    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    	// $this->ajaxReturn($m->getError());     //批量验证错误提示 
				}
				else{
					$idNum=$mm->add();
					$count=$m->save($data);
					if($count>0){
						//下面为日志记录过程
						$log=M('log');
						$log->employee=$_POST['employee'].' To '.$_POST['transto'];
						$log->fixtag=$_POST['fixassettag'];
						$log->operuser=$_SESSION['username'];
					 	$log->logtype='transfer';
						$log->logtime=date('Y-m-d H:i:s', time());
						$log->add();	
					$this->success('资产表修改成功','transfer/id/'.$_POST['id']);
					}else{
					$this->error('资产表没有修改','transfer/id/'.$_POST['id']);
					}
					if($idNum>0){
					$this->success('转移记录添加成功','transfer/id/'.$_POST['id']);
					}else{
						$this->error('转移记录添加失败','transfer/id/'.$_POST['id']);
					}
				}
		}
		public function excelB() {
  		 // echo GdzcAction::report(); 
    	  // $data= $arr;
  	     $data = array('1','mike'); 
  	     print_r($data);
  	     $this->display(report);
  	     // excelexp($data);
		}	
		  // public function ExcelA(){
		  // 	this->report();
		  // $name='Excelfile';    //生成的Excel文件文件名
		  // $res=service('ExcelToArrary')->push(this.$arr,$name);
		  // }

		 public function  logout(){                                  
              $this->redirect('login/logout');
      //      unset($_SESSION['username']);
      //     echo '注销登录成功！点击此处 <a href="login.html">登录</a>';

        }
        //3-下面为删除功能
/*        public function _before_del(){
		//做判断，如果没有登录，跳转到登陆页面
		if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$this->redirect('login/index');
		    }
	    }*/
		public function del(){
			$m=M('gdzc');   
			$id=$_GET['id'];  
			$arr=$m->find($id);
			$employee=$arr['employee'];
			$fixassettag=$arr['fixassettag'];
			$count=$m->delete($id); 

			if($count>0 ){   

						 $log=M('log');
						 $log->employee=$employee;
						 $log->fixtag=$fixassettag;
						 $log->operuser=$_SESSION['username'];
			 			 $log->logtype='delete';
						 $log->logtime=date('Y-m-d H:i:s', time());
						 $log->add();
				$this->success('数据删除成功');   
			}else{   
				$this->error('数据删除失败');    
			}
		}

		/*
		 *	下面为显示修改页面
		 * */

		public function modify(){
			$id=$_GET['id'];
			$m=M('gdzc');
			$arr=$m->find($id);
			$this->assign('data',$arr);
			$this->display();
		}
		public function query(){
			$id=$_GET['id'];
			$m=M('gdzc');
			$arr=$m->find($id);
			$this->assign('data',$arr);
			$this->display();
		}

		//修改页面的提交修改
		public function update(){
/*			$_validate = array(
                        array('employee','require','user不能为空！'),
 						array('fixassettag','require','fixassettag不能为空！'),
 						array('buymonth',array(1,2,3,4,5,6,7,8,9,10,11,12),'到货日期(月)值的范围不正确！',2,'in'),
 						array('buyyear','/^(?:[2][0][0-9][0-9]|[1][9][0-9][0-9])$/','到货日期(年)的范围不正确(不在1999~2099之间)！'),  
 						//array('buymonth','/^(?:[1-9]|[1][0-2]|[0][1-9])$/','到货日期(月)的范围不正确！(不在1~12之间)'), 
 						// 当值不为空的时候判断是否在一个范围内
 						array('buyday','/^(?:[0][1-9]|[1-9]|[12][0-9]|3[01])$/','到货日期(日)的范围不正确！(	不在1~31之间)'), 
					);*/
            //***结束自动验证部分
			$m=D('gdzc');
			$data['id']=$_POST['id'];
			$data['company']=$_POST['company'];
			$data['dept']=$_POST['dept'];
			$data['employee']=$_POST['employee'];
			$data['hardtype']=$_POST['hardtype'];
			$data['fixassettag']=$_POST['fixassettag'];
			$data['usestate']=$_POST['usestate'];
			$data['brand']=$_POST['brand'];
			$data['SN']=$_POST['SN'];
			$data['buyyear']=$_POST['buyyear'];
			$data['buymonth']=$_POST['buymonth'];				
			if (($_POST['buymonth'] ==2)  && ($_POST['buyday'] >28)  )   {
				$_POST['buyday']='28';
			}   
			elseif (in_array($_POST['buymonth'], [4,6,9,11]) && $_POST['buyday'] >30  )   {
				$_POST['buyday']='30';
			}
			else {	}
			$data['buyday']=$_POST['buyday'];
			$data['useyear']=$_POST['useyear'];
			$data['LCDtype']=$_POST['LCDtype'];
			$data['locate']=$_POST['locate'];
			$data['OS']=$_POST['OS'];
			$data['OSSN']=$_POST['OSSN'];
			$data['office']=$_POST['office'];
			$data['officeSN']=$_POST['officeSN'];
			$data['oldtag']=$_POST['oldtag'];
			$data['buytype']=$_POST['buytype'];
			$data['num']=$_POST['num'];
			$data['remark']=$_POST['remark'];
			$data['usefor']=$_POST['usefor'];
			$data['baoxiuyear']=$_POST['baoxiuyear'];
			$data['xubaoa']=$_POST['xubaoa'];
			$data['xubaoaprice']=$_POST['xubaoaprice'];
			$data['xubaob']=$_POST['xubaob'];
			$data['xubaobprice']=$_POST['xubaobprice'];
			$data['xubaoc']=$_POST['xubaoc'];
			$data['xubaocprice']=$_POST['xubaocprice'];
			$data['xubaod']=$_POST['xubaod'];
			$data['xubaodprice']=$_POST['xubaodprice'];
				
				 if (!$m->save($data)){
			  			exit($m->getError());   // 如果创建失败  输出错误提示信息
	     			   // $this->ajaxReturn($m->getError());     //批量验证错误提示 
                	 }
                   	else{
/*			if (!$m->save($data)) {
				//echo "数据录入不全，请检查必填数据项目";
				$this->error($m->getError());
			}*/
					$count=$m->save($data);
					if($count>0){ 
						//下面为日志记录过程
						 $log=M('log');
						 $log->employee=$_POST['employee'];
						 $log->fixtag=$_POST['fixassettag'];
						 $log->operuser=$_SESSION['username'];
			 			 $log->logtype='modify';
						 $log->logtime=date('Y-m-d H:i:s', time());
						 $log->add();
						//上面为日志记录过程
						$this->success('数据修改成功','modify/id/'.$_POST['id']);
								}else{
										$this->error('数据没有修改','modify/id/'.$_POST['id']);
									 }
						}
		}
		/*
		 * 添加页面
		 * */
		public function add(){
			$this->display();
		}
		public function create(){   //数据库写入数据
			//***开始自动验证部分,验证规则请写在下面
/*            $rules = array(
                        array('employee','require','user不能为空！',1),
 						array('fixassettag','require','fixassettag不能为空！',1),
 						//array('buymonth',array(1,2,3,4,5,6,7,8,9,10,11,12),'到货日期(月)值的范围不正确！',2,'in'),
 						array('buyyear','/^(?:[2][0][0-9][0-9]|[1][9][0-9][0-9])$/','到货日期(年)的范围不正确(不在1999~2099之间)！'),  
 						array('buymonth','/^(?:[1-9]|[1][0-2]|[0][1-9])$/','到货日期(月)的范围不正确！(不在1~12之间)'), 
 						// 当值不为空的时候判断是否在一个范围内
 						array('buyday','/^(?:[0][1-9]|[1-9]|[12][0-9]|3[01])$/','到货日期(日)的范围不正确！(	不在1~31之间)'), 
					);*/
            //$m->setProperty("_validate",$validate);
            //***结束自动验证部分
			$m=D('gdzc');
			$m->company=$_POST['company'];
			$m->dept=$_POST['dept'];
			$m->employee=$_POST['employee'];
			$m->hardtype=$_POST['hardtype'];
			$m->fixassettag=$_POST['fixassettag'];
			$m->usestate=$_POST['usestate'];
			$m->brand=$_POST['brand'];
			$m->SN=$_POST['SN'];
			$m->buyyear=$_POST['buyyear'];
			$m->buymonth=$_POST['buymonth'];
			//重写$_POST['buyday'] 来控制buyday的范围
		    //var_dump(($_POST['buymonth'] ==2)  && ($_POST['buyday'] >28));
			
			if (($_POST['buymonth'] ==2)  && ($_POST['buyday'] >28)  )   {
				$_POST['buyday']='28';
			}   
			elseif (in_array($_POST['buymonth'], [4,6,9,11]) && $_POST['buyday'] >30  )   {
				$_POST['buyday']='30';
			}
			else {	}
			$m->buyday=$_POST['buyday'];
			$m->useyear=$_POST['useyear'];
			$m->LCDtype=$_POST['LCDtype'];
			$m->locate=$_POST['locate'];
			$m->OS=$_POST['OS'];
			$m->OSSN=$_POST['OSSN'];	
			$m->office=$_POST['office'];
			$m->officeSN=$_POST['officeSN'];
			$m->oldtag=$_POST['oldtag'];
			$m->buytype=$_POST['buytype'];
			$m->num=$_POST['num'];
			$m->remark=$_POST['remark'];
			$m->usefor=$_POST['usefor'];
			$m->baoxiuyear=$_POST['baoxiuyear'];
			$m->xubaoa=$_POST['xubaoa'];
			$m->xubaoaprice=$_POST['xubaoaprice'];
			$m->xubaob=$_POST['xubaob'];
			$m->xubaobprice=$_POST['xubaobprice'];
			$m->xubaoc=$_POST['xubaoc'];
			$m->xubaocprice=$_POST['xubaocprice'];
			$m->xubaod=$_POST['xubaod'];
			$m->xubaodprice=$_POST['xubaodprice'];
			//create方法可以自动创建POST提交的数据，所以上面的很多可以不用一个个赋值

            // if (!$m->validate($rules)->create()){
           	if (!$m->create()){
				 exit($m->getError());    // 如果创建失败 表示验证没有通过 输出错误提示信息
			    // $this->ajaxReturn($m->getError());     //批量验证错误提示 

				}else{
					$idNum=$m->add();
				//下面为日志记录过程
				 $log=M('log');
				 $log->employee=$_POST['employee'];
				 $log->fixtag=$_POST['fixassettag'];
				 $log->operuser=$_SESSION['username'];
	 			 $log->logtype='insert';
				 $log->logtime=date('Y-m-d H:i:s', time());
				 $log->add();

					if($idNum>0){
						$this->success('数据添加成功','index');
					}
					else{
						$this->error('数据添加失败','index');
					}
				    // 验证通过 可以进行其他数据操作
		}

/*			$idNum=$m->add();
			if($idNum>0){
				$this->success('数据添加成功','index');
			}else{
				$this->error('数据添加失败','index');
			}*/
		}

      public function query_company(){
	  $m=M('company');
	  $arr=$m->select();
		 	$this->assign('data',$arr);
		 }

        // 2-下面为报表功能
/*  		public function _before_report(){
			//做判断，如果没有登录，跳转到登陆页面
			if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$this->redirect('login/index');
		    }
   	 	}*/
		public function report(){
			$m=M('gdzc');
            $mm=$m->select();  
            $cxfixassettag = $_GET['cxfixassettag'];
            $cxuser=$_GET['cxuser'];
            $cxcompany=$_GET['company'];
            $cxdept=$_GET['dept'];
            $cxhardtype=$_GET['hardtype'];
            $cxusestate=$_GET['usestate'];
            $cxos=$_GET['OS'];
            $cxoffice=$_GET['office'];
            $cxbuytype=$_GET['buytype'];
            //下面根据当前user会话名查询userright中的companyright；
            $u=M('userright');            
 			$map['user']=$_SESSION['username'];
            $uu=$u->where($map)->getField('companyright');
            $uuu=explode(",", $uu);
			$condition['company'] = array('in',$uuu);
			$condition['usestate'] = array('not in','已报废');
			   	if ( $cxcompany !='' ) {
				    $condition['company'] = array('like' ,'%'.$cxcompany.'%');
			  	 }
 				if ( $cxdept !='' ) {
					$condition['dept'] = array('like' ,'%'.$cxdept.'%');
	            }  
				if ( $cxhardtype !='' ) {
					$condition['hardtype'] = array('like' ,'%'.$cxhardtype.'%');
	            }  
 				if ($cxusestate !='' )  {
			         $condition['usestate'] = array('like' ,'%'.$cxusestate.'%');
	            } 
	            if ($cxos !='' )  {
			         $condition['OS'] = array('like' ,'%'.$cxos.'%');
	            } 
                if ($cxoffice !='' )  {
			         $condition['office'] = array('like' ,'%'.$cxoffice.'%');
	            } 
                if ($cxbuytype !='' )  {
			         $condition['buytype'] = array('like' ,'%'.$cxbuytype.'%');
	            } 
	           	if ( $cxfixassettag !='' ) {
					$condition['fixassettag'] = array('like' ,'%'.$cxfixassettag.'%');
	            }   
                if ($cxuser !='' )  {
			         $condition['employee'] = array('like' ,'%'.$cxuser.'%');
	            }   
	            else  {   
                } 
            $arr=$m->order(company,id)->where($condition)->select();
			$this->assign('data',$arr);
			
		 	$this->display();
		 	 //下面报表导出excel
			 // include './toexcel.php';
		 	 // return $arr;
             // excelexp($arr);
		}		
	   public function excelexp($dataA) {     

	         //引入PHPExcel库文件（路径根据自己情况）
	   	 	include_once('./PHPExcel/Classes/PHPExcel.php');		
	   	    $letter = array('A','B','C','D','E');
			//表头数组
			$tableheader = array('学号','姓名','性别','年龄','班级');
			//填充表头信息
			for($i = 0;$i < count($tableheader);$i++) {
			$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
			}
			//表格数组
            $data=$dataA;
			// $data = array(
			// array('1','小王','男','20','100'),
			// array('2','小李','男','20','101'),
			// array('3','小张','女','20','102'),
			// array('4','小赵','女','20','103')
			// );
             
			//根据data遍历表格信息
			for ($i = 2;$i <= count($data) + 1;$i++) {
						$j = 0;
				foreach ($data[$i - 2] as $key=>$value) {
					$excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
					$j++;
				}
			}
			//创建Excel输入对象
			$write = new PHPExcel_Writer_Excel5($excel);
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
			header("Content-Type:application/force-download");
			header("Content-Type:application/vnd.ms-execl");
			header("Content-Type:application/octet-stream");
			header("Content-Type:application/download");;
			header('Content-Disposition:attachment;filename="testdata.xls"');
			header("Content-Transfer-Encoding:binary");
			$write->save('php://output');
		}
	}
?>
