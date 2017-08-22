<?php
	class PasswordAction extends CommonAction{


/*         public function _initialize(){
         	if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$this->redirect('login/index');
		    }
		    // 做判断，如果不是admin，跳转到固定资产管理页面,这个不能写入CommonAction，否则报循环跳转错误
		    // 如果不做判断，非admin用户知道url方法和参数后可以进入用户管理界面
		    if ($_SESSION['username'] !='admin' ) {
		    $this->redirect('gdzc/index');
		    }else {
		    }
	    }*/

		public function index(){

			$m=M('loguser');
			$username=$_SESSION['username'];
			$map['username']  = array('EQ', $username);	
			$arr=$m->where($map)->select();
			$this->assign('data',$arr);
			$this->display();
		}

         public function  logout(){ 
              $this->redirect('login/logout');
        }

/*		public function del(){
			$m=M('User');
			$id=$_GET['id'];
			$count=$m->delete($id);
			if($count>0){
				$this->success('数据删除成功');
			}else{
				$this->error('数据删除失败');
			}
		}*/

		/*
		 *	显示修改页面
		 * */
		public function modify(){
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
					$this->success('数据修改成功','__APP__/gdzc/index');   
				}   else{   
					$this->error('数据没有修改');    
					}   
			}       else {   
					$this->error('密码小于6位');   
				    }   
		}
		/*
		 * 添加页面
		 * */
		public function add(){
			$this->display();
		}
		public function create(){
			$m=M('loguser');
			$m->username=$_POST['username'];
			$m->sex=$_POST['sex'];
			//$m->password=base64_encode($_POST['password']);
			$m->password= $_POST['password'];
			if (strlen($_POST['password']) >5 ){
				$idNum=$m->add();
				if($idNum>0){
					$this->success('数据添加成功','index');
				}else{
					$this->error('数据添加失败');
				}
			}else {
				$this->error('密码小于6位');
			}
		}
	}
?>
