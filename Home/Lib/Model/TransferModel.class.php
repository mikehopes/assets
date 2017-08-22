<?php
		class TransferModel extends Model{
			protected $_validate=array( 
						//array('fixtag','require','fixtag 不能为空！',1),
						//array('transfrom','require','transfrom 不能为空！',1),
						array('transto','require','转移至 不能为空！',1),
 						array('transdate','require','转移日期不能为空！',1),
					);

			protected $_auto = array( 
						array('transfer','',2,'ignore'),      //表示更新时空值的部分不更新
					);

		}
	
?>
