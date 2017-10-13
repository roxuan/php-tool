<?php
	$dir = dirname(__FILE__); // 查找当前脚本所在路径
	require $dir."/db.php"; // 引入mysql操作类文件
	require $dir."/PHPExcel/PHPExcel.php"; // 引入PHPExcel
	$db = new db($phpexcel); //实例化db类 连接数据库
	$objPHPExcel = new PHPExcel(); // 实例化phpexcel类,等同于在桌面上新建一个excel
	for($i=1;$i<=3;$i++){
		if($i>1){
			$objPHPExcel->createSheet();// 创建信的内置表
		}
		$objPHPExcel->setActiveSheetIndex($i-1);
		$objSheet = $objPHPExcel->getActiveSheet();
		$data = $db->getDataByGrade($i);
		$objSheet->setCellValue("A1","姓名")->setCellValue("B1","分数")->setCellValue("C1","班级");
		$j = 2;
		foreach($data as $key=>$val){
			$objSheet->setCellValue("A".$j,$val['username'])->setCellValue('B'.$j,$val['score'])->setCellValue("C".$j,$val['class']."班");
			$j++;
		} 
	}
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');// 生成excel
	$objWriter->save($dir."/export_1.xls");
?>