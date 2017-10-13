<?php 
	$dir=dirname(__FILE__);//查找当前脚本所在路径
	require $dir."/db.php";//引入mysql操作类文件
	require $dir."/PHPExcel/PHPExcel.php";//引入PHPExcel
	$db=new db($phpexcel);//实例化db类 连接数据库
	$objPHPExcel=new PHPExcel();//实例化PHPExcel类， 等同于在桌面上新建一个excel
	$objSheet=$objPHPExcel->getActiveSheet();//获得当前活动单元格
	// 样式代码编写
	$gradeInfo = $db->getAllGrade(); //查询所有的年级
	$index=0; // 两列信息
	foreach ($gradeInfo as $g_k => $g_v) {
		$classInfo = $db->getClassByGrade($g_v['grade']);// 查询每个年级所有的班级
		foreach($classInfo as $c_k=>$c_v){
			$nameIndex = getCells($index*2); // 获得每个班级学生姓名所在列位置
			$scoreIndex = getCells($index*2+1); // 获得每个班级学生姓名所在列位置
			$info = $db->getDataByClassGrade($c_v['class'],$g_v['grade']);// 查询每个班级的学生信息
			$j=5; // 第5行开始
			// print_r($scoreIndex);
			foreach($info as $key=>$val){
				$objSheet->setCellValue($nameIndex.$j,$val['username'])->setCellValue($scoreIndex.$j,$val['score']."21312321321321321321");//填充学生信息
				//$objSheet->setCellValue($nameIndex.$j,$val['username'])->setCellValueExplicit($scoreIndex.$j,$val['score']."12321321321321312",PHPExcel_Cell_DataType::TYPE_STRING);//填充学生信息
				$j++;
			}
			$index++;
		}
	}
	// exit;
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');// 生成excel
	// $objWriter->save($dir."/export_1.xls"); // 保存文件
	browser_export('Excel5','brower_export03.xls');// 输出到浏览器


	function browser_export($type,$filename){
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}

/**
**根据下标获得单元格所在列位置
**/
	function getCells($index){
		$arr=range('A','Z');
		//$arr=array(A,B,C,D,E,F,G,H,I,J,K,L,M,N,....Z);
		return $arr[$index];
	}


?>