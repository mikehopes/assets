<?php
	class CommonAction extends Action{


		//会话判断，除登陆LoginAction,注册RegAction外，其他模块建议extends 此类

        public function _initialize(){
		if(!isset($_SESSION['username']) || $_SESSION['username']==''){
			$this->redirect('login/index');
		    }
	    }
	}

?>
