﻿<?php
	class UsestateAction extends CommonAction{


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
			$m=M('usestate');		
			$arr=$m->select();
			$this->assign('data',$arr);
			$this->display();
		}

        public function  logout(){ 
              $this->redirect('login/logout');
        }
		/*
		 *	显示修改页面
		 * */
		public function modify(){
			$id=$_GET['id'];
			$m=M('usestate');
			$arr=$m->find($id);
			$this->assign('data',$arr);
			$this->display();
		}
		public function update(){
			$m=M('usestate');
			$data['id']=$_POST['id'];
			$data['usestate']=$_POST['usestate'];
			$data['remark']=$_POST['remark'];
			$count=$m->save($data);
				if($count>0){
					$this->success('数据修改成功','index');
				}   
				else  { $this->error('数据没有修改');
				}
			    
		}

		public function del(){
			$m=M('usestate');
			$id=$_GET['id'];
			$mm=M('gdzc');
			$a=$m->find($id);
			$map['usestate']=$a['usestate'];   
			$uu=$mm->where($map)->getField('usestate');
			if (isset($uu)) {
				$this->error('值存在于固定资产业务数据中，不可删除！' );
			}else{
				$count=$m->delete($id);
				if($count>0){
					$this->success('数据删除成功');
				}else{
					$this->error('数据删除失败');
				}	
			}
		}
		/*
		 * 添加页面
		 * */
		public function add(){
			$this->display();
		}
		public function create(){
			$m=M('usestate');
			$m->create();
			$idNum=$m->add();
				if($idNum>0){
					$this->success('数据添加成功','index');
				}else{
					$this->error('数据添加失败');
				}
			
		}
	}
?>
