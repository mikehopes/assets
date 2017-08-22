function sub(){
				var ou=document.myForm.username;
				var op=document.myForm.password;
				var oc=document.myForm.code;
				if(ou.value=='' || op.value=='' ||oc.value==''){
					alert('用户名或者密码或者验证码不能为空');
				}else{
					document.myForm.submit();
				}
			}
