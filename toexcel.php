<?php
//引入PHPExcel库文件（路径根据自己情况）
include './PHPExcel/Classes/PHPExcel.php';


//创建对象
$excel = new PHPExcel();
//Excel表格式,这里简略写了8列
$letter = array('A','B','C','D','E');
//表头数组
$tableheader = array('学号','姓名','性别','年龄','班级');
//填充表头信息
for($i = 0;$i < count($tableheader);$i++) {
$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
}
//表格数组
$data = array(
array('1','小王','男','20','100'),
array('2','小李','男','20','101')
);
//填充表格信息
for ($i = 2;$i <= count($data) + 1;$i++) {
$j = 0;
foreach ($data[$i - 2] as $key=>$value) {
$excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
$j++;
}
}

//创建Excel输入对象
$write = new PHPExcel_Writer_Excel5($excel);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");;
header('Content-Disposition:attachment;filename="testdata.xls"');
header("Content-Transfer-Encoding:binary");
$write->save('php://output');
?>