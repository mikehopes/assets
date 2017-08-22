<?php
	class LoginAction extends Action {
		
		function index(){
			$this->display();
		}
		function do_login(){
			//获取用户名和密码等。和数据库中比对，有该用户允许登录否则输出错误页面
			$username=$_POST['username'];
			//$password=base64_encode($_POST['password']);
            $password= $_POST['password'];
			$code=$_POST['code'];
			
			if($_SESSION['verify']!==md5($code)){
				$this->error('验证码错误！');
			}

			$m=M('loguser');
			$where['username']=$username;
            $j=$m->where($where)->count(); 
            $psmodifyed=$m->where($where)->getfield('psmodifyed'); 
			$where['password']=$password;
			$i=$m->where($where)->count();
			

            // 如果用户名为admin，密码对了后进入user/index,其他人进入gdzc/index
			if($i>0 && $username=='admin' ){
				$_SESSION['username']=$username;
				//下面为日志记录过程
				 $log=M('log');
				 $log->operuser=$_SESSION['username'];
	 			 $log->logtype='login';
				 $log->logtime=date('Y-m-d H:i:s', time());
				 $log->add();
				 	if ($psmodifyed=='0') { $this->redirect('password/index',array(),3,'首次登陆必须修改密码，页面跳转中...');
				 	}else{
					 $this->redirect('admin/index');
					}
			    }
			  elseif ($i>0 && $username != 'admin'){
                $_SESSION['username']=$username;
                //下面为日志记录过程
				 $log=M('log');
				 $log->operuser=$_SESSION['username'];
	 			 $log->logtype='login';
				 $log->logtime=date('Y-m-d H:i:s', time());
				 $log->add();
					if ($psmodifyed=='0') { $this->redirect('password/index',array(),3,'首次登陆必须修改密码，页面跳转中...');
				 	}else{
					 $this->redirect('gdzc/index');
					}
			    }	
			  elseif($j==0) {
			  	//下面为日志记录过程
				 $log=M('log');
				 $log->operuser=$username;
	 			 $log->logtype='login-NoUser';
				 $log->logtime=date('Y-m-d H:i:s', time());
				 $log->add();
				$this->error('用户不存在 ');
			    }
              elseif ($i==0 && $j>0 ){
              	//下面为日志记录过程
				 $log=M('log');
				 $log->operuser=$username;
	 			 $log->logtype='login-PasswordError';
				 $log->logtime=date('Y-m-d H:i:s', time());
				 $log->add();
			    $this->error(' 密码错误');
			    }
		}
              
		function logout(){

			 $log=M('log');
			 $log->operuser=$_SESSION['username'];
 			 $log->logtype='logout';
			 $log->logtime=date('Y-m-d H:i:s', time());
			 $log->add();

             unset($_SESSION['username']);
		     // echo '注销登录成功！点击此处 <a href="/asset-mssql/index.php/login/index">登录</a>';
		     $this->redirect('login/index');
		}

	  }
?>
