<?php
		class GdzcModel extends Model{
			protected $_validate=array( 
						array('employee','require','user 不能为空！',1,self::MODEL_BOTH),
 						array('fixassettag','require','fixassettag 不能为空！且必须为9位或11位',1),
 						array('fixassettag','9，11','fixassettag必须为9位或11位！',3,'length'), 
						array('brand','require','Brand/Model 不能为空！',1),
						array('SN','require','Serial Number 不能为空！',1),
 						//array('buymonth',array(1,2,3,4,5,6,7,8,9,10,11,12),'到货日期(月)值的范围不正确！',2,'in'),
 						array('buyyear','/^(?:[2][0][0-2][0-9]|[1][9][0-9][0-9])$/','到货日期(年)的范围不正确(不在1999~2029之间)！'),  
 						array('buymonth','/^(?:[1-9]|[1][0-2]|[0][1-9])$/','到货日期(月)的范围不正确！(不在1~12之间)'), 
 						// 当值不为空的时候判断是否在一个范围内
 						array('buyday','/^(?:[0][1-9]|[1-9]|[12][0-9]|3[01])$/','到货日期(日)的范围不正确！(不在1~31之间)'), 
					);

			protected $_auto = array( 
						array('gdzc','',2,'ignore'),      //表示更新时空值的部分不更新
					);

		}




	
?>
