<?php
		class CompanyModel extends Model{
			protected $_validate=array( 
						array('comid','require','comid 不能为空！',1),
 						array('comname','require','comname 不能为空！',1),
 						array('enname','require','enname 不能为空！',1),
 						);

			protected $_auto = array(  
						array('company','',2,'ignore'),      //表示更新时空值的部分不更新
					);

		}
	
?>
