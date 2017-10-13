<?php
	require dirname(__FILE__)."/dbconfig.php";// 引入配置文件

	class db{
		public $conn = null;

		public function __construct($config){ // 构造方法  实例化类时自动调用
			$this->conn = mysql_connect($config['host'],$config['username'],$config['password']) or die(mysql_error());// 连接数据库
			mysql_select_db($config['database'],$this->conn) or die(mysql_error());// 选择数据库
			mysql_query("set names ".$config['charset']) or die(mysql_error());//设定mysql编码
		}

		public function getResult($sql){
			$resource = mysql_query($sql,$this->conn) or die(mysql_error());// 查询sql语句
			$res = array();
			while(($row = mysql_fetch_assoc($resource))!=false){
				$res[] = $row;
			}
			return $res;
		}
		/**
		 * 根据传入年级数 查询每个年纪的学生数据
		 */
		public function getDataByGrade($grade){
			$sql = "select username,score,class from user where grade=".$grade." order by score desc";
			$res = self::getResult($sql);
			return $res;
		}

	}
?>