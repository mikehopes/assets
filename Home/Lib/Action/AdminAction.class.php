<?php
	class AdminAction extends CommonAction{


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
	    public function password(){

			$m=M('loguser');
			$username=$_SESSION['username'];
			$map['username']  = array('EQ', $username);	
			$arr=$m->where($map)->select();
			$this->assign('data',$arr);
			$this->display();
		}
		public function passwordmodify(){
			//$id=$_GET['id'];
			$m=M('loguser');
			$username=$_SESSION['username'];
			$mapp['username'] = array('EQ', $username);
			$arr=$m->where($mapp)->find();
			$this->assign('data',$arr);
			$this->display();
		}
		public function update(){      
			$m=M('loguser');          
			$data['username']=$_SESSION['username'];   
			$data['id']=$_POST['id'];     
			$data['sex']=$_POST['sex'];     
			//$data['password']=base64_encode($_POST['password']);     
			$data['password']= $_POST['password'];  
			$data['psmodifyed']='1';
			if (strlen($_POST['password']) >5 ) {     
				$count=$m->save($data);   
				if($count>0){   
					if ($data['username']=='admin') {
						$this->success('数据修改成功','__APP__/admin/password');
					}else{
						$this->success('数据修改成功','__APP__/gdzc/index'); 	
					} 
				}   else{   
					$this->error('数据没有修改');    
					}   
			}       else {   
					$this->error('密码小于6位');   
				    }   
		}


		public function index(){
			$this->display();
		}
		
		public function information(){   
			import('ORG.Net.IpLocation');         // 导入IpLocation类
			$Ip = new IpLocation('UTFWry.dat');   // 实例化类 参数表示IP地址库文件
			$area = $Ip->getlocation(get_client_ip()); // 获取客户端IP地址所在的位置
			
			$this->assign('iparea',$area);
			$this->display();
		}

         public function  logout(){ 
              $this->redirect('login/logout');
        }

	}
?>
