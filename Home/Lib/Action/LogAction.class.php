<?php
	class LogAction extends CommonAction{


         public function _initialize(){
         	if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$this->redirect('login/index');
		    }
		    // 做判断，如果不是admin，跳转到固定资产管理页面,这个不能写入CommonAction，否则报循环跳转错误
		    // 如果不做判断，非admin用户知道url方法和参数后可以进入用户管理界面
		    if ($_SESSION['username'] !='admin' ) {
		    $this->redirect('gdzc/index');
		    }else {
		    }
	    }

		public function index(){

			$m=M('log');
			$cxuser    = $_POST['cxuser'];
			$cxfixtag  = $_POST['cxfixtag'];
            $cxoperuser= $_POST['cxoperuser'];
            $cxlogtype = $_POST['cxlogtype'];	

	           if ( $cxuser !='' ) {
					$condition['employee'] = array('like' ,'%'.$cxuser.'%');
	            }   if ($cxfixtag !='' )  {
					         $condition['fixtag'] = array('like' ,'%'.$cxfixtag.'%');       
	            }   if ($cxoperuser !='' )  {
					         $condition['operuser'] = array('like' ,'%'.$cxoperuser.'%');       
	            }  if ($cxlogtype !='' )  {
					         $condition['logtype'] = array('like' ,'%'.$cxlogtype.'%');       
	            } 
	               else  {   
                } 	
			$arr=$m->where($condition)->select();


			$this->assign('data',$arr);

			$this->display();
		}

         public function  logout(){ 
              $this->redirect('login/logout');
        }

		
	}
?>
