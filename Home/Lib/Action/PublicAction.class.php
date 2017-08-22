<?php
	class PublicAction extends Action{
		function code(){
			import('ORG.Util.Image');
    		Image::buildImageVerify();
		}
	}
?>
